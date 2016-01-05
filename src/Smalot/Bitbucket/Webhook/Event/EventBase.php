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
     * EventBase constructor.
     * @param string $eventName
     * @param string $payload
     * @param int $attemptCount
     */
    public function __construct($eventName, $payload, $attemptCount)
    {
        $this->eventName = $eventName;
        $this->payload = $payload;
        $this->attemptCount = $attemptCount;

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
