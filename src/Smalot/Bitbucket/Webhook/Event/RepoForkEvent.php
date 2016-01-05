<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoForkModel;

/**
 * Class RepoForkEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user forks a repository.
 */
class RepoForkEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoForkModel';
    }

    /**
     * @return RepoForkModel
     */
    public function getData()
    {
        return $this->model;
    }
}
