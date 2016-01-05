<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestCommentCreatedModel;

/**
 * Class PullrequestCommentCreatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user comments on a pull request.
 */
class PullrequestCommentCreatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestCommentCreatedModel';
    }

    /**
     * @return PullrequestCommentCreatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
