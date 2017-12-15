<?php

require_once __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;
use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\Geocodes;
use Propel\Propel\GeocodesQuery;
use Propel\Propel\Tweets;
use Propel\Propel\TweetsQuery;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

//file_put_contents('/var/www/html/FirstRanger/cron.log', 'Je suis passée');
// Load the configuration file 
$configManager = new ConfigurationManager(__DIR__ . '/propel.php');

// Set up the connection manager
$manager = new ConnectionManagerSingle();
$manager->setConfiguration($configManager->getConnectionParametersArray()['default']);
$manager->setName('default');

// Add the connection manager to the service container
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('default', 'mysql');
$serviceContainer->setConnectionManager('default', $manager);
$serviceContainer->setDefaultDatasource('default');

//keys and tokens
$consumerKey = 'wMrUwEMjfe4kCQlPHpvUJFReG';
$consumerSecret = '3cBvcG8ZuEbbPFUnVIuhHjwoVJaU1VdQmC8PDKz9UUNx6U4k3e';
$accessToken = '36630957-ND7GjGn55DFBGZFkjkGUXbEoJZvCzcV5tvkbRRTd7';
$accessTokenSecret = 'uUawifFFSBK6efJk9dkrSjqPZsu6uyQZYN2LG2OM2RvuG';

//include library
require "twitteroauth/autoload.php";

//Connect to API
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

//Create tweet
//$new_status = $connection->post("statuses/update", ["status" => "This tweet was sent by twitter API"]);

$nowRef = new DateTime('now');
//var_dump($nowRef);
$tweet = new Tweets();
$queryTweets = TweetsQuery::create();
$geocode = new Geocodes();

$queryGeocodes = GeocodesQuery::create();
$geocodesArray = $queryGeocodes->orderByGeocodeId('asc')->find();

//echo 'vardump de geocode array : \n';
//var_dump($geocodesArray);
//echo 'vardump de geocode array : \n';
//var_dump($geocodesArray);

foreach ($geocodesArray as $geocodeRow) {
    //
    $minId = 99999999999999999999999;

//    echo 'la ligne de geocode est : ';
//    var_dump($geocodeRow);

    $geocode = $geocodeRow->getGeocode();
    echo 'le geocode unique est : ';
    echo $geocode;
    $geocodeId = $geocodeRow->getGeocodeId();
    echo 'le echo de geocodeId est : ';
    echo $geocodeId;

    do {
        echo 'debut';
        echo "\n";
//        $tweet = new Tweets();
//        $queryTweets = TweetsQuery::create();
//        $lastTweet = $queryTweets->orderByTweetId('desc')->limit(1)->findOne();
//        if ($lastTweet) {
//            $lastId = $lastTweet->getApiTweetId();
//        }
//    echo 'post vardump lastweet';
//    echo $lastId;
        //Get tweets
        //
    //création d'une boucle foreach pour récupérer tous les géocodes
        //
    
    //
    //première requête
        if ($minId === 99999999999999999999999) {
            $responseTwitter = $connection->get("search/tweets", [
                "q" => "\xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83 OR \xF0\x9F\x98\x84 OR \xF0\x9F\x98\x85 OR \xF0\x9F\x98\x86 OR \xF0\x9F\x98\x89 OR \xF0\x9F\x98\x8A OR \xF0\x9F\x98\x8B OR \xF0\x9F\x98\x8D OR \xF0\x9F\x98\x98 OR \xF0\x9F\x98\x9A OR \xF0\x9F\x98\x9C OR \xF0\x9F\x98\x9D OR \xF0\x9F\x98\xB8 OR \xF0\x9F\x98\xB9 OR \xF0\x9F\x98\xBA OR \xF0\x9F\x98\xBB OR \xF0\x9F\x98\x80 OR \xF0\x9F\x98\x87 OR \xF0\x9F\x98\x88 OR \xF0\x9F\x98\x8E OR \xF0\x9F\x98\x9B OR \xF0\x9F\x98\xAE OR \xF0\x9F\x98\x97 OR \xF0\x9F\x98\x99 OR \xF0\x9F\x91\x8D OR \xF0\x9F\x91\xA6 OR \xF0\x9F\x91\xA7 OR \xF0\x9F\x91\xA8 OR \xF0\x9F\x91\xA9 OR \xF0\x9F\x92\x8B OR \xF0\x9F\x92\x8C OR \xF0\x9F\x92\x8F OR \xF0\x9F\x92\x90 OR \xF0\x9F\x92\x91 OR \xF0\x9F\x91\xBC OR \xF0\x9F\x91\x8C OR \xF0\x9F\x91\x84 OR \xF0\x9F\x92\x93 OR \xF0\x9F\x92\x95 OR \xF0\x9F\x92\x96 OR \xF0\x9F\x92\x97 OR \xF0\x9F\x92\x98 OR \xF0\x9F\x92\x99 OR \xF0\x9F\x92\x9A OR \xF0\x9F\x92\x9B -RT", //on précise qu'on veut pas les RT.
                "count" => "100",
                "result_type" => "recent",
                "geocode" => $geocode,
                    //"max_id" => "$minId"
            ]);
        } else {
            $responseTwitter = $connection->get("search/tweets", [
                "q" => "\xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83 OR \xF0\x9F\x98\x84 OR \xF0\x9F\x98\x85 OR \xF0\x9F\x98\x86 OR \xF0\x9F\x98\x89 OR \xF0\x9F\x98\x8A OR \xF0\x9F\x98\x8B OR \xF0\x9F\x98\x8D OR \xF0\x9F\x98\x98 OR \xF0\x9F\x98\x9A OR \xF0\x9F\x98\x9C OR \xF0\x9F\x98\x9D OR \xF0\x9F\x98\xB8 OR \xF0\x9F\x98\xB9 OR \xF0\x9F\x98\xBA OR \xF0\x9F\x98\xBB OR \xF0\x9F\x98\x80 OR \xF0\x9F\x98\x87 OR \xF0\x9F\x98\x88 OR \xF0\x9F\x98\x8E OR \xF0\x9F\x98\x9B OR \xF0\x9F\x98\xAE OR \xF0\x9F\x98\x97 OR \xF0\x9F\x98\x99 OR \xF0\x9F\x91\x8D OR \xF0\x9F\x91\xA6 OR \xF0\x9F\x91\xA7 OR \xF0\x9F\x91\xA8 OR \xF0\x9F\x91\xA9 OR \xF0\x9F\x92\x8B OR \xF0\x9F\x92\x8C OR \xF0\x9F\x92\x8F OR \xF0\x9F\x92\x90 OR \xF0\x9F\x92\x91 OR \xF0\x9F\x91\xBC OR \xF0\x9F\x91\x8C OR \xF0\x9F\x91\x84 OR \xF0\x9F\x92\x93 OR \xF0\x9F\x92\x95 OR \xF0\x9F\x92\x96 OR \xF0\x9F\x92\x97 OR \xF0\x9F\x92\x98 OR \xF0\x9F\x92\x99 OR \xF0\x9F\x92\x9A OR \xF0\x9F\x92\x9B -RT", //on précise qu'on veut pas les RT.
                "geocode" => $geocode,
                "count" => "100",
                "result_type" => "recent",
                "max_id" => $minId,
            ]);
        }
        echo '2e requete.  MinID : ';
        echo strval($minId);
        echo "\n";

        echo '2e requete.  geocode : ';
        echo strval($geocode);
        echo "\n";

        var_dump($responseTwitter);

        foreach ($responseTwitter->statuses as $status) {

            if ($status->id < $minId) {
                $minId = $status->id;
            }

            $queryTweets = TweetsQuery::create();
            $tweet = $queryTweets->filterByApiTweetId($status->id)->findOne(); //vérifie que le tweet récupéré auprès de l'api n'est pas déjà dans la bdd

            echo "status dat twitter";
            echo $status->created_at;
            echo "\n";
            $statusDateTime = DateTime::createFromFormat('D M j H:i:s P Y', $status->created_at);

            echo 'status date : ';
            echo $statusDateTime->format('Y-m-d H:i:s');
            echo "\n";


            if (!$tweet) {
//        
                $tweet = new Tweets();
                $tweet->setApiTweetId($status->id);
                $tweet->setTweetText($status->text);
                $tweet->setTweetPublicationHour($status->created_at);
                $tweet->setGeocodeId($geocodeId);
                if (isset($status->retweet_count)) {
                    $tweet->setRetweetsQuantity($status->retweet_count);
                }
                if (isset($status->retweeted_status->favorite_count)) {
                    $tweet->setFavoritesQuantity($status->retweeted_status->favorite_count);
                }
                $tweet->setTwitterAccount($status->user->screen_name);
                if (isset($status->coordinates->coordinates)) {
                    $tweet->setCoordinates($status->coordinates->coordinates);
                }
                if (isset($status->user->location)) {
                    $tweet->setLocation($status->user->location);
                }
                $tweet->setQualityTweet("positive");

                $tweet->save();
            }
        }
        $now = clone $nowRef;
//        var_dump($now);
//        var_dump($now->sub(new DateInterval('PT6H')));
//        var_dump($now->sub(new DateInterval('PT3M')));
//        var_dump($statusDateTime);
//        var_dump($now->sub(new DateInterval('PT1M')) > $statusDateTime);
    } while ($now->sub(new DateInterval('PT6H')) < $statusDateTime);
}
// new Datetime() create from format.
//récupérer le dernier id inséré dans la bdd
?>