<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoIssueCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user created an issue for a repository.
 */
class RepoIssueCreatedModel extends ModelBase
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
}
