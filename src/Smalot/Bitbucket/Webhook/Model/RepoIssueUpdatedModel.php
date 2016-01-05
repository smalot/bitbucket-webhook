<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoIssueUpdatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user updated an issue for a repository.
 */
class RepoIssueUpdatedModel extends ModelBase
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
    public function getIssue()
    {
        return $this->payload['issue'];
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

    /**
     * @return array
     */
    public function getChanges()
    {
        return $this->payload['changes'];
    }
}
