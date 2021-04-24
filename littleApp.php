<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "1385287970211602432-j2bPznHlO8K5WoEgeSV4viDdnggjMo",
'oauth_access_token_secret' => "QzDeBltPfvSwxQ1jMgjQXFKXrA5dyWR8PFdnX9aHOQ3FM",
'consumer_key' => "bZi17894RpUBiIhTXCAhIyShC",
'consumer_secret' => "Gf9k5uEOGKVOIbVv7JS4m0cZdWhtYEp81SP3m5TtVBfLlzGJGw"
);
$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
//if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "iagdotme";}
//if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
$getfield = "?q=".str_replace(" ","%20",$_POST['resource'])."%20available%20at%20".str_replace(" ","%20",$_POST['state'])."%20AND%20-filter:retweets";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
$string=$string['statuses'];
if(array_key_exists("errors",$string )) {}




?>
