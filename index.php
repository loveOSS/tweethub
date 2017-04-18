<?php
require_once './vendor/autoload.php';

use TweetHub\MicroEngine;
use TweetHub\TwitterClient;
use Symfony\Component\Dotenv\Dotenv;
use Lpdigital\Github\Parser\WebhookResolver;
use Lpdigital\Github\EventType\ActionableEventInterface;

const RELEASE_EVENT='ReleaseEvent';
const PUBLISHED='published';

loadConf();

if ('POST' === $_SERVER['REQUEST_METHOD']) {
     $decodedJson = json_decode(file_get_contents('php://input'), true);
     $resolver    = new WebhookResolver();
     $event       = $resolver->resolve($decodedJson);

     if (isValid($event)) {
         $twitterMessage = MicroEngine::parse($event->release, getenv('TW_MSG'));
         TwitterClient::tweet($twitterMessage);

         echo 'Tweet sent.';
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
