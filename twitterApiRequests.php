<?php 

require_once './vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;
use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\Tweets;
use Propel\Propel\TweetsQuery;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

// Load the configuration file 
$configManager = new ConfigurationManager( 'propel.php' );

// Set up the connection manager
$manager = new ConnectionManagerSingle();
$manager->setConfiguration( $configManager->getConnectionParametersArray()[ 'default' ] );
$manager->setName('default');

// Add the connection manager to the service container
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('default', 'mysql');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');

//keys and tokens
$consumerKey= 'wMrUwEMjfe4kCQlPHpvUJFReG';
$consumerSecret= '3cBvcG8ZuEbbPFUnVIuhHjwoVJaU1VdQmC8PDKz9UUNx6U4k3e';
$accessToken= '36630957-ND7GjGn55DFBGZFkjkGUXbEoJZvCzcV5tvkbRRTd7';
$accessTokenSecret='uUawifFFSBK6efJk9dkrSjqPZsu6uyQZYN2LG2OM2RvuG';

//include library
require "twitteroauth/autoload.php";



//$argv[1];

//Connect to API
$connection= new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

//Create tweet
//$new_status = $connection->post("statuses/update", ["status" => "This tweet was sent by twitter API"]);

//Get tweets
$responseTwitter = $connection->get("search/tweets", [
    "q" => "\xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83", 
    "count" => "100", 
    "result_type" => "recent", 
    "geocode" => "48.857204,2.334131,6km"
    ]);

//$tweets = new \Propel\Runtime\Collection\ObjectCollection();

foreach ($responseTwitter->statuses as $status) {
    
//    $queryTweets = TweetsQuery::create();
//    $tweet = $queryTweets->filterByApiTweetId($status->id);
//    if(! $tweet) {
//        $tweet = new Tweets();
    var_dump($status);
    $tweet = new Tweets();
    $tweet->setApiTweetId($status->id);
    $tweet->setTweetText($status->text);
    $tweet->setTweetPublicationHour($status->created_at);
    //$tweet->getGeocodeId()
    if(isset($status->retweet_count)){
        $tweet->setRetweetsQuantity($status->retweet_count);
    }
    if(isset($status->retweeted_status->favorite_count)) {
        $tweet->setFavoritesQuantity($status->retweeted_status->favorite_count);
    }
    
    $tweet->setTwitterAccount($status->user->screen_name);
    if(isset($status->user->coordinates)){
        $tweet->setCoordinates($status->coordinates);
    }
    if(isset($status->user->location)){
        $tweet->setLocation($status->user->location);
    }
    
       $tweet->save();
//    }
    

    
   //$tweets->append($tweet);
}


//$statuses = $connection->get("search/tweets", ["q" => "\xF0\x9F\x98*", "count" => "100", "geocode" => "48.856924,2.352684100000033,10km"]);

//$statuses = $connection->get("search/tweets", ["q" => " \xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83", "count" => "1", "geocode" => "48.856924,2.352684100000033,10km"]);

//"lang"=>"fr", , "count" => "100", "geocode" => "[37.781157,-122.398720,1mi]" , "result_type" => "popular"
//https:api.twitter.com/1.1/search/tweets.json?q=%23freebandnames&since_id=24012619984051000&max_id=250126199840518145&result_type=mixed&count=4
//$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude-replies" => true]);

//$f = fopen('12-11-20km.json', 'a');
//fwrite($f, json_encode($statuses, JSON_PRETTY_PRINT));

//print_r($statuses);

?>