<?php
require_once './vendor/autoload.php';

use TweetHub\TwitterClient;
use Symfony\Component\Dotenv\Dotenv;
use Lpdigital\Github\Parser\WebhookResolver;

const RELEASE_EVENT='ReleaseEvent';
const PUBLISHED='published';

loadConf();

if ('POST' === $_SERVER['REQUEST_METHOD']) {
     $decodedJson = json_decode(file_get_contents('php://input'), true);
     $resolver    = new WebhookResolver();
     $event       = $resolver->resolve($decodedJson);
     $eventName   = $event::name();

     if (isValid($event)) {
         TwitterClient::tweet(getenv('TW_MSG').$event->release->getHtmlUrl());
     }
}

function isValid($event)
{
    if ($event instanceof ActionableEventInterface) {
        return RELEASE_EVENT === $event::name()
            && PUBLISHED == $event->action;
     }
     return false;
}

function loadConf()
{
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__.'/.env');
}
