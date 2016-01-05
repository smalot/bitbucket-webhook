<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\PullrequestApprovalRemovedModel;

/**
 * Class PullrequestApprovalRemovedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user removes an approval from a pull request for a repository.
 */
class PullrequestApprovalRemovedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\PullrequestApprovalRemovedModel';
    }

    /**
     * @return PullrequestApprovalRemovedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
