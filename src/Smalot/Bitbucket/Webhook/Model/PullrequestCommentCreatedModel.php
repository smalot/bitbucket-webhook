<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestCommentCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user comments on a pull request.
 */
class PullrequestCommentCreatedModel extends ModelBase
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
