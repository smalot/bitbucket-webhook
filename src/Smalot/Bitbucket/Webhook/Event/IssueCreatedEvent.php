<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\IssueCreatedModel;

/**
 * IssueCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user creates an issue for a repository.
 */
class IssueCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\IssueCreatedModel';
    }

    /**
     * @return IssueCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
