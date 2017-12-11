<?php 
//keys and tokens
$consumerKey= 'wMrUwEMjfe4kCQlPHpvUJFReG';
$consumerSecret= '3cBvcG8ZuEbbPFUnVIuhHjwoVJaU1VdQmC8PDKz9UUNx6U4k3e';
$accessToken= '36630957-ND7GjGn55DFBGZFkjkGUXbEoJZvCzcV5tvkbRRTd7';
$accessTokenSecret='uUawifFFSBK6efJk9dkrSjqPZsu6uyQZYN2LG2OM2RvuG';

//include library
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//$argv[1];

//Connect to API
$connection= new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

//Create tweet
//$new_status = $connection->post("statuses/update", ["status" => "This tweet was sent by twitter API"]);

//Get tweets
$statuses = $connection->get("search/tweets", [
    "q" => " \xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83 OR \xF0\x9F\x98\x84 OR \xF0\x9F\x98\x85 OR \xF0\x9F\x98\x86 OR \xF0\x9F\x98\x89", 
    "count" => "100", 
    "result_type" => "recent", 
    "geocode" => "48.856924,2.352684100000033,10km"
    ]);

//$statuses = $connection->get("search/tweets", ["q" => "\xF0\x9F\x98*", "count" => "100", "geocode" => "48.856924,2.352684100000033,10km"]);

//$statuses = $connection->get("search/tweets", ["q" => " \xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83", "count" => "1", "geocode" => "48.856924,2.352684100000033,10km"]);

//"lang"=>"fr", , "count" => "100", "geocode" => "[37.781157,-122.398720,1mi]" , "result_type" => "popular"
//https:api.twitter.com/1.1/search/tweets.json?q=%23freebandnames&since_id=24012619984051000&max_id=250126199840518145&result_type=mixed&count=4
//$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude-replies" => true]);

$f = fopen('12-11-20km.json', 'a');
fwrite($f, json_encode($statuses, JSON_PRETTY_PRINT));

//print_r($statuses);

?>