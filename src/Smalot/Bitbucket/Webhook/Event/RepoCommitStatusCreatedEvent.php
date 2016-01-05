<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoCommitStatusCreatedModel;

/**
 * Class RepoCommitStatusCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A build system, CI tool, or another vendor recognizes that a user recently
 * pushed a commit and updates the commit with its status.
 */
class RepoCommitStatusCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoCommitStatusCreatedModel';
    }

    /**
     * @return RepoCommitStatusCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
