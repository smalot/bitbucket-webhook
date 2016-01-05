<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoCommitStatusUpdatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A build system, CI tool, or another vendor recognizes that a commit has
 * a new status and updates the commit with its status.
 */
class RepoCommitStatusUpdatedModel extends ModelBase
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
