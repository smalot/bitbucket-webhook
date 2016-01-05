<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestApprovedModel;

/**
 * Class PullrequestApprovedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user approves a pull request for a repository.
 */
class PullrequestApprovedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestApprovedModel';
    }

    /**
     * @return PullrequestApprovedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
