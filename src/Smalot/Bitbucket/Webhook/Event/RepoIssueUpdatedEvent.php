<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoIssueUpdatedModel;

/**
 * Class RepoIssueUpdatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user updates an issue for a repository.
 */
class RepoIssueUpdatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoIssueUpdatedModel';
    }

    /**
     * @return RepoIssueUpdatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
