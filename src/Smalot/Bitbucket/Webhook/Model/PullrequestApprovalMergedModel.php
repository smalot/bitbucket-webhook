<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestApprovalRemovedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user removes an approval from a pull request for a repository.
 */
class PullrequestApprovalRemovedModel extends ModelBase
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
