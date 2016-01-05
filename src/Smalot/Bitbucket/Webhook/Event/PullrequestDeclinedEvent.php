<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestDeclinedModel;

/**
 * Class PullrequestDeclinedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user declines a pull request for a repository.
 */
class PullrequestDeclinedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestDeclinedModel';
    }

    /**
     * @return PullrequestDeclinedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
