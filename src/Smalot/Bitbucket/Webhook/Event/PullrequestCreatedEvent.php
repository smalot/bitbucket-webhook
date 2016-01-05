<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestCreatedModel;

/**
 * Class PullrequestCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user creates a pull request for a repository.
 */
class PullrequestCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestCreatedModel';
    }

    /**
     * @return PullrequestCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
