<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestApprovedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user approves a pull request for a repository.
 */
class PullrequestApprovedModel extends ModelBase
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
    public function getApproval()
    {
        return $this->payload['approval'];
    }
}
