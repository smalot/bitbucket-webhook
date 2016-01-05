<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoIssueCreatedModel;

/**
 * Class RepoIssueCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user creates an issue for a repository.
 */
class RepoIssueCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoIssueCreatedModel';
    }

    /**
     * @return RepoIssueCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
