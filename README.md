# Bitbucket - Webhook

## Documentation API

https://confluence.atlassian.com/bitbucket/manage-webhooks-735643732.html

## Security

https://confluence.atlassian.com/bitbucket/manage-webhooks-735643732.html#Managewebhooks-trigger_webhook

If you want your server to check that the payloads it receives are from Bitbucket, whitelist these IP ranges:

`````
131.103.20.160/27
165.254.145.0/26
104.192.143.0/24
````

## Events

https://confluence.atlassian.com/bitbucket/event-payloads-740262817.html

## Samples

### Push (with tag)

Headers

````
Total-Route-Time: null
Connect-Time: 5000
X-Request-Id: 2a6660d5-c3f0-4a70-a6dc-ddb546e4e5eb
Connection: close
Host: requestb.in
Accept-Encoding: gzip, deflate
Content-Type: application/json
Cache-Control: max-age=259200
Via: 1.1 util-102.ash1.bb-inf.net (squid/3.3.8), 1.1 vegur
X-Event-Key: repo:push
Content-Length: 2830
Accept: */*
X-Attempt-Number: 1
X-Hook-Uuid: 908a6d9e-45fd-46c8-97e6-c4f350f219dd
X-Request-Uuid: 07606ab4-601c-4ca4-8c93-b979d3c7b3a1
User-Agent: Bitbucket-Webhooks/2.0
````

Payload

````
{"repository": {"is_private": true, "website": "", "links": {"avatar": {"href": "https://bitbucket.org/smalot/repo-test-1/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1"}}, "type": "repository", "name": "repo test 1", "scm": "git", "uuid": "{6c66efe6-ec7b-4bda-a1cd-393d87c63afd}", "owner": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "full_name": "smalot/repo-test-1"}, "actor": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "push": {"changes": [{"truncated": false, "links": {"commits": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commits?include=6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}}, "created": true, "new": {"name": "v0.1", "links": {"commits": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commits/v0.1"}, "self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/refs/tags/v0.1"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/tag/v0.1"}}, "type": "tag", "target": {"message": "README.md edited online with Bitbucket", "links": {"self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commit/6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4"}}, "type": "commit", "author": {"user": {"uuid": "{318ecf6b-0bc5-4e1b-8666-886523a447e1}", "display_name": "Sebastien MALOT", "links": {"avatar": {"href": "https://bitbucket.org/account/smalot/avatar/32/"}, "self": {"href": "https://api.bitbucket.org/2.0/users/smalot"}, "html": {"href": "https://bitbucket.org/smalot/"}}, "username": "smalot", "type": "user"}, "raw": "Sebastien MALOT <sebastien@malot.fr>"}, "hash": "6a3e33dc6f89c43ec5e0cd9d98901dabfd1352d4", "date": "2016-01-16T14:06:03+00:00", "parents": [{"hash": "c695f28ad7736140c947eb541573ab98f52a874b", "links": {"self": {"href": "https://api.bitbucket.org/2.0/repositories/smalot/repo-test-1/commit/c695f28ad7736140c947eb541573ab98f52a874b"}, "html": {"href": "https://bitbucket.org/smalot/repo-test-1/commits/c695f28ad7736140c947eb541573ab98f52a874b"}}, "type": "commit"}]}}, "old": null, "closed": false, "forced": false}]}}
````
