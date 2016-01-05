<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestCommentDeletedModel;

/**
 * Class PullrequestCommentDeletedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user deleted a comment on a pull request.
 */
class PullrequestCommentDeletedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestCommentDeletedModel';
    }

    /**
     * @return PullrequestCommentDeletedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
