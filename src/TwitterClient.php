<?php
namespace TweetHub;

use Twitter;

class TwitterClient
{
    public static function tweet($tweet)
    {
        static $isAuthenticated = false;
        if (!$isAuthenticated) {
            $twitter = new Twitter(
                getenv('TW_CONSUMER_KEY'),
                getenv('TW_CONSUMER_SECRET'),
                getenv('TW_ACCESS_TOKEN'),
                getenv('TW_ACCESS_SECRET')
            );
        }

        if ($twitter->authenticate()) {
	        $twitter->send($tweet);
        }else{
            throw new \Exception('Unable to authenticate with credentials.');
        }
    }
}