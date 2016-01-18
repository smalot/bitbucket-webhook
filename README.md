# Bitbucket - Webhook

[![Latest Stable Version](https://poser.pugx.org/smalot/bitbucket-webhook/v/stable)](https://packagist.org/packages/smalot/bitbucket-webhook)
[![Total Downloads](https://poser.pugx.org/smalot/bitbucket-webhook/downloads)](https://packagist.org/packages/smalot/bitbucket-webhook)
[![Latest Unstable Version](https://poser.pugx.org/smalot/bitbucket-webhook/v/unstable)](https://packagist.org/packages/smalot/bitbucket-webhook)
[![License](https://poser.pugx.org/smalot/bitbucket-webhook/license)](https://packagist.org/packages/smalot/bitbucket-webhook)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/smalot/bitbucket-webhook/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/smalot/bitbucket-webhook/?branch=master)

# Requirements

* PHP 5.3+
* symfony/http-foundation >= 2.3
* symfony/event-dispatcher >= 2.3

# Installation

## Composer

You need first to download this library using `composer`.

````sh
composer require smalot/bitbucket-webhook
````

Go to [GetComposer.org](https://getcomposer.org/download/) to install Composer on your environment.

# Example

## From scratch

````php
<?php

require_once 'vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();

// Todo: add listener to event dispatcher.
$listener = ...

$dispatcher->addListener(\Smalot\Bitbucket\Webhook\Events::WEBHOOK_REQUEST, $listener);
$webhook = new \Smalot\Bitbucket\Webhook\Webhook($dispatcher);
$event = $webhook->parseRequest($request);

````

## Using Symfony in controller

````php
<?php

namespace AppBundle\Controller;

use Smalot\Bitbucket\Webhook\Webhook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BitbucketController extends Controller
{
    public function webhookAction(Request $request)
    {
        $dispatcher = $this->get('event_dispatcher');
        $webhook = new Webhook($dispatcher);
        $event = $webhook->parseRequest($request);
        
        return Response('ok');
    }
}
````

Don't forget to previously to register any event listener.

# Documentation

## Remote API

https://confluence.atlassian.com/bitbucket/manage-webhooks-735643732.html

## Security

Bitbucket whitelist IP ranges:

https://confluence.atlassian.com/bitbucket/manage-webhooks-735643732.html#Managewebhooks-trigger_webhook

`````
131.103.20.160/27
165.254.145.0/26
104.192.143.0/24
````

## Events

https://confluence.atlassian.com/bitbucket/event-payloads-740262817.html
