<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoForkModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user forks a repository.
 */
class RepoForkModel extends ModelBase
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
    public function getFork()
    {
        return $this->payload['fork'];
    }
}
