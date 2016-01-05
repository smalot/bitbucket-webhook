<?php

namespace Smalot\Bitbucket\Webhook\Event;

use Smalot\Bitbucket\Webhook\Model\IssueUpdatedModel;

/**
 * Class IssueUpdatedEvent
 * @package Smalot\Bitbucket\Webhook\Event
 *
 * A user updates an issue for a repository.
 */
class IssueUpdatedEvent extends EventBase
{
    /**
     * @return string
     */
    protected function getClassModel()
    {
        return '\Smalot\Bitbucket\Webhook\Model\IssueUpdatedModel';
    }

    /**
     * @return IssueUpdatedModel
     */
    public function getData()
    {
        return $this->model;
    }
}
