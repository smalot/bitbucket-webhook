<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoPushModel;

/**
 * Class RepoPushEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user pushes 1 or more commits to a repository.
 */
class RepoPushEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoPushModel';
    }

    /**
     * @return RepoPushModel
     */
    public function getData()
    {
        return $this->model;
    }
}
