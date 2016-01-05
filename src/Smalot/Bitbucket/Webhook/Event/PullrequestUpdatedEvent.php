<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestUpdatedModel;

/**
 * Class PullrequestUpdatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user updates a pull request for a repository.
 */
class PullrequestUpdatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestUpdatedModel';
    }

    /**
     * @return PullrequestUpdatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
