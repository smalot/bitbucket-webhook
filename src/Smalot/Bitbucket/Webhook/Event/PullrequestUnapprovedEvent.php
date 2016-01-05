<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestUnapprovedModel;

/**
 * Class PullrequestUnapprovedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user removes an approval from a pull request for a repository.
 */
class PullrequestUnapprovedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestUnapprovedModel';
    }

    /**
     * @return PullrequestUnapprovedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
