<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class PullrequestCreatedModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user creates a pull request for a repository.
 */
class PullrequestCreatedModel extends ModelBase
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
