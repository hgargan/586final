<html>
   <head>
      <style>
      .tweet-container {
         font-family: Helvetica, sans-serif;
         background-color: #eee;
         max-width: 400px;
         padding: 1.5%;
         font-weight: 300;
         
      }
      .tweets a {
         text-decoration: none;
         
      }
      .tweet-date {
         font-size: .8em;
         color: #aaa;
      }
      tr:nth-child(odd){
         background-color: #000;
      }
   
   </style>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="tweetLink.js"></script>
    <script>

    function pageComplete(){
        $('.tweets').tweetLinkify();
    }
</script>
   </head>
<body>
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
$getfield = '?q=shenandoah%20national%20park&count=100';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/*echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(); */ 

             $string = json_decode($twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest(), $assoc=TRUE);
            

            foreach($string['statuses'] as $items)
             {
               echo "<table><tr><div class='tweet-container'><div class='row'><div class='col-xs-1'><a href = 'http://twitter.com/" . $items['user']['screen_name'] . "' target='_blank'><img src='" . $items['user']['profile_image_url'] . "' ></div>&nbsp;";   
               echo "<div class='col-xs-11'>@" . $items['user']['name'] . "</br></a>";
               echo  "<p class='tweet-date'>" . $items['created_at'] . "</br></p>";
               echo  "<p class='tweets'>" .$items['text'] . "</p></div></div></br>";
               echo "<a href='http://twitter.com/" . $items['user']['screen_name'] ."/status/" . $items['id_str'] . "' target='_blank'>View tweet >> </a>";
               echo "</div></tr></a></table>";
             }
             ?>
</body>
</html>