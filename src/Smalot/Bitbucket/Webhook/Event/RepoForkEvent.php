<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\RepoFortModel;

/**
 * Class RepoFortEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user forks a repository.
 */
class RepoFortEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\RepoFortModel';
    }

    /**
     * @return RepoFortModel
     */
    public function getData()
    {
        return $this->model;
    }
}
