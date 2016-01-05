<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoCommitStatusUpdatedModel;

/**
 * Class RepoCommitStatusUpdatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A build system, CI tool, or another vendor recognizes that a commit has a
 * new status and updates the commit with its status.
 */
class RepoCommitStatusUpdatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoCommitStatusUpdatedModel';
    }

    /**
     * @return RepoCommitStatusUpdatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
