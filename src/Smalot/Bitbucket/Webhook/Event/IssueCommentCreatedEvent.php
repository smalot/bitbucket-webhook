<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\IssueCommentCreatedModel;

/**
 * Class IssueCommentCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user creates an issue for a repository.
 */
class IssueCommentCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\IssueCommentCreatedModel';
    }

    /**
     * @return IssueCommentCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
