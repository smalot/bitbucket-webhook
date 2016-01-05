<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestRejectedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user rejectes a pull request for a repository.
 */
class PullrequestRejectedModel extends ModelBase
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
