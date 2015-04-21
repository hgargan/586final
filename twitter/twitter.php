<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "237389357-ZidnkNYIyFYn4lqzzNqtGjU9NfYFC3fuxX2hpGqh",
    'oauth_access_token_secret' => "K6p1CO0VSdrzPfSmvPMcSVourXFLkbQN4OqeGHVe8Go5y",
    'consumer_key' => "camhyaGlRPEtZmJspJwysirHH",
    'consumer_secret' => "4D0booJFDMbRKiF8FMKQLAaIPXmS6BpCTtIG05SXBgIGWGLJo9"
);


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
/* %23 is a hashtag!!! */
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23shenandoah%20national%20park&count=20';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/* echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();  */

             $string = json_decode($twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest(), $assoc=TRUE);
             
             foreach($string['statuses'] as $items)
             {
                echo "Tweet: " . $items['text'] . "</br>";
                echo "When: " . $items['created_at'] . "</br>";
                echo "Who: " . $items['location'] . "</br>";
               /* echo '<img src="' . $items['media_url'] . '">'; */
                echo "<hr/>";
             }
