<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoCommitStatusCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A build system, CI tool, or another vendor recognizes that a user recently
 * pushed a commit and updates the commit with its status.
 */
class RepoCommitStatusCreatedModel extends ModelBase
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
    public function getCommitStatus()
    {
        return $this->payload['commit_status'];
    }
}
