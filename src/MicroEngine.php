<?php
namespace TweetHub;

use Lpdigital\Github\Entity\Release;

class MicroEngine
{
    public static function parse(Release $release, $templateContent)
    {
        preg_match_all('#\@(\w+)#', $templateContent, $expressions);

        if (!empty($expressions)) {
            foreach($expressions[0] as $key => $expression) {
                $method = 'get'.ucfirst($expressions[1][$key]);
                $templateContent = str_replace($expression, call_user_func([$release, $method]), $templateContent);
            }
        }

        return $templateContent;
    }
}
