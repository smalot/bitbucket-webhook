<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestRejectedModel;

/**
 * Class PullrequestRejectedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user rejectes a pull request for a repository.
 */
class PullrequestRejectedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestRejectedModel';
    }

    /**
     * @return PullrequestRejectedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
