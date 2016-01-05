<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestFulfilledModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user fulfilles a pull request for a repository.
 */
class PullrequestFulfilledModel extends ModelBase
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
}
