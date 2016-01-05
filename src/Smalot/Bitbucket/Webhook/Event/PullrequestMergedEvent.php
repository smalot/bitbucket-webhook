<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestMergedModel;

/**
 * Class PullrequestMergedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user merges a pull request for a repository.
 */
class PullrequestMergedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestMergedModel';
    }

    /**
     * @return PullrequestMergedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
