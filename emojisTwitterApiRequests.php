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

$sentimentType = $argv[1];
$sector = $argv[2];
$sentimentQuery = '';

switch ($sentimentType) {
    case 'positive':
        $sentimentQuery = "\xF0\x9F\x98\x81 OR \xF0\x9F\x98\x82 OR \xF0\x9F\x98\x83 OR \xF0\x9F\x98\x84 OR \xF0\x9F\x98\x85 OR \xF0\x9F\x98\x86 OR \xF0\x9F\x98\x89 OR \xF0\x9F\x98\x8A OR \xF0\x9F\x98\x8B OR \xF0\x9F\x98\x8D OR \xF0\x9F\x98\x98 OR \xF0\x9F\x98\x9A OR \xF0\x9F\x98\x9C OR \xF0\x9F\x98\x9D OR \xF0\x9F\x98\xB8 OR \xF0\x9F\x98\xB9 OR \xF0\x9F\x98\xBA OR \xF0\x9F\x98\xBB OR \xF0\x9F\x98\x80 OR \xF0\x9F\x98\x87 OR \xF0\x9F\x98\x88 OR \xF0\x9F\x98\x8E OR \xF0\x9F\x98\x9B OR \xF0\x9F\x98\xAE OR \xF0\x9F\x98\x97 OR \xF0\x9F\x98\x99 OR \xF0\x9F\x91\x8D OR \xF0\x9F\x91\xA6 OR \xF0\x9F\x91\xA7 OR \xF0\x9F\x91\xA8 OR \xF0\x9F\x91\xA9 OR \xF0\x9F\x92\x8B OR \xF0\x9F\x92\x8C OR \xF0\x9F\x92\x8F OR \xF0\x9F\x92\x90 OR \xF0\x9F\x92\x91 OR \xF0\x9F\x91\xBC OR \xF0\x9F\x91\x8C OR \xF0\x9F\x91\x84 OR \xF0\x9F\x92\x93 OR \xF0\x9F\x92\x95 OR \xF0\x9F\x92\x96 OR \xF0\x9F\x92\x97 OR \xF0\x9F\x92\x98 OR \xF0\x9F\x92\x99 OR \xF0\x9F\x92\x9A -RT";
        break;
    case 'negative':
        $sentimentQuery = "\xF0\x9F\x98\x92 OR \xF0\x9F\x98\x93 OR \xF0\x9F\x98\x94 OR \xF0\x9F\x98\x96 OR \xF0\x9F\x98\x9E OR \xF0\x9F\x98\xA0 OR \xF0\x9F\x98\xA1 OR \xF0\x9F\x98\xA2 OR \xF0\x9F\x98\xA3 OR \xF0\x9F\x98\xA4 OR \xF0\x9F\x98\xA5 OR \xF0\x9F\x98\xA8 OR \xF0\x9F\x98\xA9 OR \xF0\x9F\x98\xAA OR \xF0\x9F\x98\xAB OR \xF0\x9F\x98\xAD OR \xF0\x9F\x98\xB0 OR \xF0\x9F\x98\xB1 OR \xF0\x9F\x98\xB2 OR \xF0\x9F\x98\xB3 OR \xF0\x9F\x98\xBC OR \xF0\x9F\x98\x9F OR \xF0\x9F\x98\xA6 OR \xF0\x9F\x98\xA7 OR \xF0\x9F\x98\xAC OR \xF0\x9F\x98\x95 OR \xF0\x9F\x98\xAF OR \xF0\x9F\x91\x8E OR \xF0\x9F\x91\xB9 OR \xF0\x9F\x91\xBA OR \xF0\x9F\x91\xBF OR \xF0\x9F\x92\x80 OR \xF0\x9F\x92\xA9 OR \xF0\x9F\x92\x94 -RT";
        break;
    case 'neutral':
        $sentimentQuery = "\xF0\x9F\x98\x8C OR \xF0\x9F\x98\x8F OR \xF0\x9F\x98\xB5 OR \xF0\x9F\x98\xB7 OR \xF0\x9F\x98\x90 OR \xF0\x9F\x98\xB6 OR \xF0\x9F\x98\x91 OR \xF0\x9F\x98\xB4 OR \xF0\x9F\x92\x82 OR \xF0\x9F\x91\xBB OR \xF0\x9F\x91\xAA OR \xF0\x9F\x91\xAB OR \xF0\x9F\x91\xAE OR \xF0\x9F\x91\xB1 OR \xF0\x9F\x91\xB2 OR \xF0\x9F\x91\xB3 OR \xF0\x9F\x91\xB4 OR \xF0\x9F\x91\xB5 OR \xF0\x9F\x91\xB6 OR \xF0\x9F\x91\xB7 OR \xF0\x9F\x91\xB8 OR \xF0\x9F\x91\xBD OR \xF0\x9F\x91\xBE OR \xF0\x9F\x92\x81 OR \xF0\x9F\x92\x83 OR \xF0\x9F\x92\x86 OR \xF0\x9F\x92\x87 OR \xF0\x9F\x91\xB0 OR \xF0\x9F\x91\xAF OR \xF0\x9F\x9A\x81 OR \xF0\x9F\x9A\x82 OR \xF0\x9F\x9A\x86 OR \xF0\x9F\x9A\x88 OR \xF0\x9F\x9A\x8A OR \xF0\x9F\x9A\x8D OR \xF0\x9F\x9A\x8E OR \xF0\x9F\x9A\x90 OR \xF0\x9F\x9A\x94 OR \xF0\x9F\x9A\x96 OR \xF0\x9F\x9A\x98 OR \xF0\x9F\x9A\x9B -RT";
        break;
    default:
        echo 'Choose an argument : positive, negative or neutral';
        exit(1);
}

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
//    echo 'le geocode unique est : ';
//    echo $geocode;
    $geocodeId = $geocodeRow->getGeocodeId();

    if ($sector == 'Paris') {
        //pour obtenir les résultats à Paris
        if ($geocodeId < 10) {
            //    echo 'le echo de geocodeId est : ';
//    echo $geocodeId;
            echo 'nouveau cronJob';
            echo "\n";
            do {
                echo 'requete';
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
                echo 'exécution requete twitter' . "\n";
                if ($minId === 99999999999999999999999) {
                    $responseTwitter = $connection->get("search/tweets", [
                        "q" => $sentimentQuery, //on précise qu'on veut pas les RT.
                        "count" => "100",
                        "lang" => "fr",
                        "result_type" => "recent",
                        "geocode" => $geocode,
                            //"max_id" => "$minId"
                    ]);
                } else {
                    $responseTwitter = $connection->get("search/tweets", [
                        "q" => $sentimentQuery, //on précise qu'on veut pas les RT.
                        "geocode" => $geocode,
                        "count" => "100",
                        "lang" => "fr",
                        "result_type" => "recent",
                        "max_id" => $minId,
                    ]);
                }
                echo 'requete terminée. Insertion ' . "\n";
//        echo '2e requete.  MinID : ';
//        echo strval($minId);
//        echo "\n";
//
//        echo '2e requete.  geocode : ';
//        echo strval($geocode);
//        echo "\n";
//
//        var_dump($responseTwitter);

                $tweetIds = [];

                foreach ($responseTwitter->statuses as $status) {
                    $tweetIds[] = $status->id;
                }

                $tweetsInDb = TweetsQuery::create()->filterByApiTweetId($tweetIds)->find();

                $tweetsDbIds = [];

                foreach ($tweetsInDb as $tweetInDb) {
                    $tweetsDbIds[$tweetInDb->getApiTweetId()] = $tweetInDb;
                }

                $collection = new \Propel\Runtime\Collection\ObjectCollection();

                $collection->setModel(Tweets::class);

                foreach ($responseTwitter->statuses as $status) {

                    if ($status->id < $minId) {
                        $minId = $status->id;
                    }

                    $queryTweets = TweetsQuery::create();

                    $tweet = NULL;

                    if (isset($tweetsDbIds[$status->id])) {
                        $tweet = $tweetsDbIds[$status->id];
                    }

//            echo "status dat twitter";
//            echo $status->created_at;
//            echo "\n";
                    $statusDateTime = DateTime::createFromFormat('D M j H:i:s P Y', $status->created_at);

//            echo 'status date : ';
//            echo $statusDateTime->format('Y-m-d H:i:s');
//            echo "\n";


                    if (!$tweet) {
                        $tweet = new Tweets();
                        $tweet->setQualityTweet($sentimentType);
                        $tweet->setGeocodeId($geocodeId);
                        $tweet->setApiTweetId($status->id);
                        $tweet->setTweetText($status->text);
                        $tweet->setTweetPublicationHour($status->created_at);
                        //            if (isset($status->favorite_count)) {
                        //                $tweet->setFavoritesQuantity($status->favorite_count);
                        //            }
                        $tweet->setTwitterAccount($status->user->screen_name);
                        //            if (isset($status->coordinates->coordinates)) {
                        //                $tweet->setCoordinates(json_encode($status->coordinates->coordinates));
                        //            }
                        if (isset($status->user->location)) {
                            $tweet->setLocation($status->user->location);
                        }
                    }


                    if (isset($status->retweet_count)) {
                        $tweet->setRetweetsQuantity($status->retweet_count);
                    }

                    $collection->append($tweet);
                }
                echo "saving ...\n";
                $collection->save();
                $now = clone $nowRef;
//        var_dump($now);
//        var_dump($now->sub(new DateInterval('PT6H')));
//        var_dump($now->sub(new DateInterval('PT3M')));
//        var_dump($statusDateTime);
//        var_dump($now->sub(new DateInterval('PT1M')) > $statusDateTime);
            } while ($now->sub(new DateInterval('PT6H')) < $statusDateTime);
        } else {
            echo $geocodeId;
        }
    } else if ($sector == 'couronne') {
        if ($geocodeId >= 10) {
            echo 'nouveau cronJob';
            echo "\n";
            do {
                echo 'requete';
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
                echo 'exécution requete twitter' . "\n";
                if ($minId === 99999999999999999999999) {
                    $responseTwitter = $connection->get("search/tweets", [
                        "q" => $sentimentQuery, //on précise qu'on veut pas les RT.
                        "count" => "100",
                        "lang" => "fr",
                        "result_type" => "recent",
                        "geocode" => $geocode,
                            //"max_id" => "$minId"
                    ]);
                } else {
                    $responseTwitter = $connection->get("search/tweets", [
                        "q" => $sentimentQuery, //on précise qu'on veut pas les RT.
                        "geocode" => $geocode,
                        "count" => "100",
                        "lang" => "fr",
                        "result_type" => "recent",
                        "max_id" => $minId,
                    ]);
                }
                echo 'requete terminée. Insertion ' . "\n";
//        echo '2e requete.  MinID : ';
//        echo strval($minId);
//        echo "\n";
//
//        echo '2e requete.  geocode : ';
//        echo strval($geocode);
//        echo "\n";
//
//        var_dump($responseTwitter);

                $tweetIds = [];

                foreach ($responseTwitter->statuses as $status) {
                    $tweetIds[] = $status->id;
                }

                $tweetsInDb = TweetsQuery::create()->filterByApiTweetId($tweetIds)->find();

                $tweetsDbIds = [];

                foreach ($tweetsInDb as $tweetInDb) {
                    $tweetsDbIds[$tweetInDb->getApiTweetId()] = $tweetInDb;
                }

                $collection = new \Propel\Runtime\Collection\ObjectCollection();

                $collection->setModel(Tweets::class);

                foreach ($responseTwitter->statuses as $status) {

                    if ($status->id < $minId) {
                        $minId = $status->id;
                    }

                    $queryTweets = TweetsQuery::create();

                    $tweet = NULL;

                    if (isset($tweetsDbIds[$status->id])) {
                        $tweet = $tweetsDbIds[$status->id];
                    }

//            echo "status dat twitter";
//            echo $status->created_at;
//            echo "\n";
                    $statusDateTime = DateTime::createFromFormat('D M j H:i:s P Y', $status->created_at);

//            echo 'status date : ';
//            echo $statusDateTime->format('Y-m-d H:i:s');
//            echo "\n";


                    if (!$tweet) {
                        $tweet = new Tweets();
                        $tweet->setQualityTweet($sentimentType);
                        $tweet->setGeocodeId($geocodeId);
                        $tweet->setApiTweetId($status->id);
                        $tweet->setTweetText($status->text);
                        $tweet->setTweetPublicationHour($status->created_at);
                        //            if (isset($status->favorite_count)) {
                        //                $tweet->setFavoritesQuantity($status->favorite_count);
                        //            }
                        $tweet->setTwitterAccount($status->user->screen_name);
                        //            if (isset($status->coordinates->coordinates)) {
                        //                $tweet->setCoordinates(json_encode($status->coordinates->coordinates));
                        //            }
                        if (isset($status->user->location)) {
                            $tweet->setLocation($status->user->location);
                        }
                    }


                    if (isset($status->retweet_count)) {
                        $tweet->setRetweetsQuantity($status->retweet_count);
                    }

                    $collection->append($tweet);
                }
                echo "saving ...\n";
                $collection->save();
                $now = clone $nowRef;
//        var_dump($now);
//        var_dump($now->sub(new DateInterval('PT6H')));
//        var_dump($now->sub(new DateInterval('PT3M')));
//        var_dump($statusDateTime);
//        var_dump($now->sub(new DateInterval('PT1M')) > $statusDateTime);
            } while ($now->sub(new DateInterval('PT6H')) < $statusDateTime);
        } else {
            echo $geocodeId;
        }
    }
}
// new Datetime() create from format.
//récupérer le dernier id inséré dans la bdd
?>