<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestFulfilledModel;

/**
 * Class PullrequestFulfilledEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user fulfilles a pull request for a repository.
 */
class PullrequestFulfilledEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestFulfilledModel';
    }

    /**
     * @return PullrequestFulfilledModel
     */
    public function getData()
    {
        return $this->model;
    }
}
