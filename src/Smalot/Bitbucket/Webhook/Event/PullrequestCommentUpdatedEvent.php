<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestCommentUpdatedModel;

/**
 * Class PullrequestCommentUpdatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user updated a comment on a pull request.
 */
class PullrequestCommentUpdatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestCommentUpdatedModel';
    }

    /**
     * @return PullrequestCommentUpdatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
