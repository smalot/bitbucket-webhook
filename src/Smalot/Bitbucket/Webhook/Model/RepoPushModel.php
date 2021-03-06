<?php

namespace Smalot\Bitbucket\Webhook\Model;

/**
 * Class RepoPushModel
 * @package Smalot\Bitbucket\Webhook\Model
 *
 * A user pushes 1 or more commits to a repository.
 */
class RepoPushModel extends ModelBase
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
    public function getPush()
    {
        return $this->payload['push'];
    }
}
