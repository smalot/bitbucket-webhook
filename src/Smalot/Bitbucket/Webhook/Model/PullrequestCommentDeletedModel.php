<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestCommentDeletedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user deleted a comment on a pull request.
 */
class PullrequestCommentDeletedModel extends ModelBase
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
