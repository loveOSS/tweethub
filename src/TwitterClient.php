<?php

use Twitter;

class TwitterClient
{
    public static function tweet($tweet)
    {
        $twitter = new Twitter(
            getenv('TW_CONSUMER_KEY'),
            getenv('TW_CONSUMER_SECRET'),
            getenv('TW_ACCESS_TOKEN'),
            getenv('TW_ACCESS_SECRET')
        );
        $twitter->send($tweet);
    }
}