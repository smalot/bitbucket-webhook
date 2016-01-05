<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoCommitCommentCreatedModel;

/**
 * Class RepoCommitCommentCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user comments on a commit in a repository.
 */
class RepoCommitCommentCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoCommitCommentCreatedModel';
    }

    /**
     * @return RepoCommitCommentCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
