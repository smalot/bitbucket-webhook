<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestCommentUpdatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user updated a comment on a pull request.
 */
class PullrequestCommentUpdatedModel extends ModelBase
{
    /**
     * @return array
     */
    public function getActor()
    {
        return $this->payload['actor'];
    }

    /**
     * @return array
     */
    public function getPullRequest()
    {
        return $this->payload['pullrequest'];
    }

    /**
     * @return array
     */
    public function getRepository()
    {
        return $this->payload['repository'];
    }

    /**
     * @return array
     */
    public function getComment()
    {
        return $this->payload['comment'];
    }
}
