<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\ModelBase;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class EventBase
 * @package Smalot\Bitbucket\Webhook\Event
 */
abstract class EventBase extends Event
{
    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var string
     */
    protected $payload;

    /**
     * @var ModelBase
     */
    protected $model;

    /**
     * @var int
     */
    protected $attemptCount;

    /**
     * @var string
     */
    protected $requestUuid;

    /**
     * EventBase constructor.
     * @param string $eventName
     * @param string $payload
     * @param int $attemptCount
     * @param string $requestUuid
     */
    public function __construct($eventName, $payload, $attemptCount, $requestUuid)
    {
        $this->eventName = $eventName;
        $this->payload = $payload;
        $this->attemptCount = $attemptCount;
        $this->requestUuid = $requestUuid;

        $payload = json_decode($this->payload, true);
        $className = $this->getClassModel();
        $this->model = new $className($payload);
    }

    /**
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return int
     */
    public function getAttemptCount()
    {
        return $this->attemptCount;
    }

    /**
     * @return string
     */
    public function getRequestUuid()
    {
        return $this->requestUuid;
    }

    /**
     * @return ModelBase
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    abstract protected function getClassModel();
}
