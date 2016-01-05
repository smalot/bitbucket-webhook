<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoCommitCommentCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user comments on a commit in a repository.
 */
class RepoCommitCommentCreatedModel extends ModelBase
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
    public function getComment()
    {
        return $this->payload['comment'];
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
    public function getCommit()
    {
        return $this->payload['commit'];
    }
}
