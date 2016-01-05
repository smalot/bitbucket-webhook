<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class IssueCommentCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user created a comment on an issue for a repository.
 */
class IssueCommentCreatedModel extends ModelBase
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
    public function getRepository()
    {
        return $this->payload['repository'];
    }

    /**
     * @return array
     */
    public function getIssue()
    {
        return $this->payload['issue'];
    }

    /**
     * @return array
     */
    public function getComment()
    {
        return $this->payload['comment'];
    }
}
