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

# Samples

### Push (with tag)

Headers

````
Connection: close
Host: requestb.in
Accept-Encoding: gzip, deflate
Accept: */*
Content-Type: application/json
Content-Length: 2830
User-Agent: Bitbucket-Webhooks/2.0
X-Event-Key: repo:push
X-Attempt-Number: 1
X-Hook-Uuid: 908a6d9e-45fd-46c8-97e6-c4f350f219dd
X-Request-Uuid: 07606ab4-601c-4ca4-8c93-b979d3c7b3a1
````

Payload

````
{"repository": {"is_private": true, "website": "", "links": {"avatar": {"href": "https://bitbucket.org/smalot/repo-test-1/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1"}}, "type": "repository", "name": "repo test 1", "scm": "git", "uuid": "{6c66efe6-ec7b-4bda-a1cd-393d87c63afd}", "owner": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "full_name": "smalot/repo-test-1"}, "actor": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "push": {"changes": [{"truncated": false, "links": {"commits": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commits?include=6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}}, "created": true, "new": {"name": "v0.1", "links": {"commits": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commits/v0.1"}, "self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/refs/tags/v0.1"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/tag/v0.1"}}, "type": "tag", "target": {"message": "README.md edited online with Bitbucket", "links": {"self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commit/6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}}, "type": "commit", "author": {"user": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "raw": "Sebastien MALOT <sebastien@malot.fr>"}, "hash": "6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4", "date": "2016-01-16T14:06:03+00:00", "parents": [{"hash": "c695f28ad7736140c947eb541573ab98f52a874b", "links": {"self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commit/c695f28ad7736140c947eb541573ab98f52a874b"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/c695f28ad7736140c947eb541573ab98f52a874b"}}, "type": "commit"}]}}, "old": null, "closed": false, "forced": false}]}}
````
