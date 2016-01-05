<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestDeclinedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user declines a pull request for a repository.
 */
class PullrequestDeclinedModel extends ModelBase
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
