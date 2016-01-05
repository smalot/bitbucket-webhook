<?php

namespace Smalot\Bitbucket\Webhook;

use Smalot\Bitbucket\Webhook\Event\EventBase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Webhook
 * @package Smalot\Bitbucket\Webhook
 */
class Webhook
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     */
    protected $payload;

    /**
     * @var int
     */
    protected $attemptCount;

    /**
     * @var string
     */
    protected $requestUuid;

    /**
     * @var array
     */
    protected $eventMap;

    /**
     * Webhook constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher = null)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->eventMap = array();
    }

    /**
     * @param string $event
     * @return string
     */
    public function getEventClassName($event)
    {
        $map = $this->getEventMap();

        return $map[$event];
    }

    /**
     * @return array
     */
    public function getDefaultEventNames()
    {
        return array(
            'repo:push',
            'repo:fork',
            'repo:commit_comment_created',
            'repo:commit_status_created',
            'repo:commit_status_updated',
            'issue:created',
            'issue:updated',
            'issue:comment_created',
            'pullrequest:created',
            'pullrequest:updated',
            'pullrequest:approved',
            'pullrequest:unapproved',
            'pullrequest:fulfilled',
            'pullrequest:rejected',
            'pullrequest:comment_created',
            'pullrequest:comment_updated',
            'pullrequest:comment_deleted',
        );
    }

    /**
     * @return array
     */
    public function getEventMap()
    {
        if (empty($this->eventMap)) {
            $this->eventMap = array();
            $namespace = '\\Smalot\\Bitbucket\\Webhook\\Event\\';
            $eventNames = $this->getDefaultEventNames();

            $classNames = array_map(
                function($event) use ($namespace) {
                    $className = str_replace(' ', '', ucwords(str_replace(array('_', ':'), ' ', $event)));

                    return $namespace . $className . 'Event';
                },
                $eventNames
            );

            $this->eventMap = array_combine($eventNames, $classNames);
        }

        return $this->eventMap;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isValidRequest(Request $request)
    {
        try {
            $valid = $this->checkSecurity($request);
        } catch (\Exception $e) {
            return false;
        }

        return $valid;
    }

    /**
     * @param Request $request
     * @param bool $dispatch
     * @return EventBase
     *
     * @throws \InvalidArgumentException
     */
    public function parseRequest(Request $request, $dispatch = true)
    {
        if (!$this->checkSecurity($request)) {
            throw new \InvalidArgumentException('Invalid security, check remote IP.');
        }

        if ($className = $this->getEventClassName($this->eventName)) {
            $event = new $className(
                $this->eventName,
                $this->payload,
                $this->attemptCount,
                $this->requestUuid
            );
        } else {
            throw new \InvalidArgumentException('Unknown event type.');
        }

        if (null !== $this->eventDispatcher && $dispatch) {
            $this->eventDispatcher->dispatch(Events::WEBHOOK_REQUEST, $event);
        }

        return $event;
    }

    /**
     * @param Request $request
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    protected function checkSecurity(Request $request)
    {
        $trustedIpRanges = array(
            '131.103.20.160/27',
            '165.254.145.0/26',
            '104.192.143.0/24',
        );

        // Reset any previously payload set.
        $this->requestUuid = $this->eventName = $this->payload = $this->attemptCount = null;

        // Extract Bitbucket headers from request.
        $requestUuid = (string)$request->headers->get('X-Request-Uuid');
        $event = (string)$request->headers->get('X-Event-Key');
        $count = (int)$request->headers->get('X-Attempt-Number');
        $payload = (string)$request->getContent();

        if (empty($requestUuid) || empty($event) || empty($count)) {
            throw new \InvalidArgumentException('Missing Bitbucket headers.');
        }

        if ($this->ipInRanges($request->getClientIp(), $trustedIpRanges)) {
            $this->requestUuid = $requestUuid;
            $this->eventName = $event;
            $this->attemptCount = $count;
            $this->payload = $payload;

            return true;
        }

        return false;
    }

    /**
     * @param string $ip
     * @param array $ranges
     * @return bool
     */
    protected function ipInRanges($ip, $ranges)
    {
        foreach ($ranges as $range) {
            if ($this->ipInRange($ip, $range)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if a given ip is in a network
     * @link https://gist.github.com/tott/7684443
     *
     * @param  string $ip IP to check in IPV4 format eg. 127.0.0.1
     * @param  string $range IP/CIDR netmask eg. 127.0.0.0/24, also 127.0.0.1 is accepted and /32 assumed
     * @return boolean true if the ip is in this range / false if not.
     */
    protected function ipInRange($ip, $range)
    {
        // $range is in IP/CIDR format eg 127.0.0.1/24
        list($range, $netmask) = explode('/', $range, 2);
        $range_decimal = ip2long($range);
        $ip_decimal = ip2long($ip);
        $wildcard_decimal = pow(2, (32 - $netmask)) - 1;
        $netmask_decimal = ~$wildcard_decimal;

        return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
    }
}
