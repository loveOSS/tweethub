# TweetHub, the Twitter release notifier

## Why yet another Twitter bot?

I have only one need and didn't want to maintain too much code, and didn't want to
depends on another Twitter bot I can't customize. So I did my own in 1 hour and I was
pretty happy with so I release it for free :)

## Features?

Only 1: configure a weehbook to any GitHub repository. Everytime you'll publish a new release a Tweet
will be sent by the account of your choice: amazing, right?

More you can customize the tweet to be sent thanks to the MicroEngine embed with this app'.


## Show me the code!

In fact you don't have to write code, you only need to create an app on Twitter to get
credentials needed by TweetHub (https://apps.twitter.com/).

Then you create a `.env` file from the distributed one and you complete it.

```
# .env

TW_CONSUMER_KEY=XXXXXX
TW_CONSUMER_SECRET=XXXXXX
TW_ACCESS_TOK=XXXXXX
TW_ACCESS_SECRET=XXXXXX
TW_MSG="A new release of TwitterHub is up => checkout! @htmlUrl @url"
```

> Wait! What the f*** with @ expressions?

Well, you can access every getter from [Release entity](https://github.com/Lp-digital/github-event-parser/blob/master/Entity/Release.php) in your tweet :) This will help you to provide the url of changelog for instance!

## I want to contribute!

No thanks, I don't have too much time to spend on my "baby" projects. If you like and use it, you can "star" the project,
this is free and can make me smile, so what are you waiting for?

@+!
