<?php

require_once __DIR__ . '/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;
use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\Departments;
use Propel\Propel\DepartmentsQuery;
use Propel\Propel\DepartmentSummary;
use Propel\Propel\PopularTweets;
use Propel\Propel\PopularTweetsQuery;
use Propel\Propel\Tweets;
use Propel\Propel\TweetsQuery;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

//// Connexion BDD
$pdo = new PDO('mysql:host=31.207.33.82;port=3306;dbname=firstranger', 'firstranger', 'SBuy1s9O3CQsE86a', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH
        ));

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

//Créer un tableau associatif correspondant à notre table tweet sur la tranche horaire (now à now-6h).
//avec objet tweetsQuery et objet Tweets
$nowRef = new DateTime('now');
//$now = clone $nowRef;
$tweets = new Tweets();
$queryTweets = TweetsQuery::create();

//creation de l'objet departement
$departments = new Departments();
$queryDepartments = DepartmentsQuery::create();
$departmentsCodeDepartments = $queryDepartments->filterByDepartmentCode()->find();
//$geocodes = new Geocodes();
//$queryGeocodes = GeocodesQuery()::create();
//
//creation du tableau departement 
$resultat = $pdo->query("SELECT  department_code FROM departments");
$departmentsCodeDepartments = $resultat->fetchAll();
//var_dump($departmentsCodeDepartments);
//
//
$tweetsArray = $queryTweets->filterByTweetPublicationHour(array(
            'min' => strtotime('-6 hours'), //'2017-12-15 05:01:33',//$nowRef->sub(new DateInterval('PT6H')),
            'max' => time(),
        ))
        ->find();
//       ('desc')->limit($now->sub(new DateInterval('PT6H')))->find();
//var_dump($tweetsArray);
//$departmentSummary = new DepartmentSummary();
//$queryDepartmentSummary = DepartmentSummaryQuery()::create();
//'Y-m-d H:i:s')
//
//
//
            $positiveParisCount = 0;
            $neutralParisCount = 0;
            $negativeParisCount = 0;
            $positiveHDSCount = 0;
            $neutralHDSCount = 0;
            $negativeHDSCount = 0;
            $positiveSSDCount = 0;
            $neutralSSDCount = 0;
            $negativeSSDCount = 0;
            $positiveVDMCount = 0;
            $neutralVDMCount = 0;
            $negativeVDMCount = 0;
//
foreach ($tweetsArray as $tweet) {
    //créer un objet departmentSummaryQuery et departmentSummary qu'on va implémenter avec des set.
    //pour chaque tweet, on récupère sa qualité et son department_code qu'on trouve dans la table departments.
    //on récupère le department code de chaque tweet
    $tweetId = $tweet->getTweetId();
    $resultat = $pdo->query("SELECT department_code FROM departments WHERE department_id IN (
            SELECT department_id FROM geocodes WHERE geocode_id IN (
                    SELECT geocode_id FROM tweets WHERE tweet_id = $tweetId))");
    $departmentCodeTweet = $resultat->fetch();
    //var_dump( $departmentCodeTweet);
    $departmentCode = $departmentCodeTweet['department_code'];
    //echo $departmentCode;
    //on recupere la qualité du tweet
    $tweetQuality = $tweet->getQualityTweet();
    //var_dump($tweetQuality);

    if ($departmentCode === '75') {
        if ($tweetQuality === 'positive') {
            $positiveParisCount ++;
            //echo 'positif paris 1 ça marche';
        } elseif ($tweetQuality === 'neutral') {
            $neutralParisCount ++;
        } elseif ($tweetQuality === 'negative') {
            $negativeParisCount ++;
        }
    } elseif ($departmentCode === '92') {
        if ($tweetQuality === 'positive') {
            $positiveHDSCount ++;
        } elseif ($tweetQuality === 'neutral') {
            $neutralHDSCount ++;
        } elseif ($tweetQuality === 'negative') {
            $negativeHDSCount ++;
        }
    } elseif ($departmentCode === '93') {
        if ($tweetQuality === 'positive') {
            $positiveSSDCount ++;
        } elseif ($tweetQuality === 'neutral') {
            $neutralSSDCount ++;
        } elseif ($tweetQuality === 'negative') {
            $negativeSSDCount ++;
        }
    } elseif ($departmentCode === '94') {
        if ($tweetQuality === 'positive') {
            $positiveVDMCount ++;
        } elseif ($tweetQuality === 'neutral') {
            $neutralVDMCount ++;
        } elseif ($tweetQuality === 'negative') {
            $negativeVDMCount ++;
        }
    }
} 
    //récupérer dans le tableau $tweetsArray 
    $nowRef = new DateTime('now');
    $now = clone $nowRef;
    $maxTime = $nowRef;
    var_dump($maxTime);
 
   $maxTimeStr = $maxTime->date;
   echo $maxTimeStr;
   $maxTimeStr = substr($maxTimeStr, 0, 19);
   $maxTimeStr = strval($maxTimeStr);

    
 $minTime = $now->sub(new DateInterval('PT6H'));
var_dump($minTime);
 $minTimeStr = $minTime->date;
 echo $minTimeStr;
 $minTimeStr = substr($minTimeStr, 0, 19);
 $minTimeStr = strval($minTimeStr);
// 
// TweetsQuery::create()
//         ->useGeocodesQuery()
//            ->useDepartmentsQuery()
//            ->filterByDepartmentCode(75)
//            ->endUse()
//         ->endUse()
//         ->filterByQualityTweet('positive')
//         ->filterByTweetPublicationHour($minTimeStr, \Propel\Runtime\ActiveQuery\Criteria::GREATER_EQUAL)
//         ->filterByTweetPublicationHour($maxTimeStr, \Propel\Runtime\ActiveQuery\Criteria::LOWER_EQUAL)
//         ->orderByRetweetsQuantity('DESC')
//         ->limit(1)
//         ->findOne();

//Paris
$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '75')) AND quality_tweet = 'positive' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularPositiveTweetParis = $resultat->fetch();
$popularPositiveTweetIdParis = $popularPositiveTweetParis['api_tweet_id'];
echo $popularPositiveTweetIdParis;
$popularPositiveTweetAccountParis = $popularPositiveTweetParis['twitter_account'];
echo $popularPositiveTweetAccountParis;


$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '75')) AND quality_tweet = 'negative' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularNegativeTweetParis = $resultat->fetch();
$popularNegativeTweetIdParis = $popularNegativeTweetParis['api_tweet_id'];
echo $popularNegativeTweetIdParis;
$popularNegativeTweetAccountParis = $popularNegativeTweetParis['twitter_account'];
echo $popularNegativeTweetAccountParis;

//Hauts-de-Seine
$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '92')) AND quality_tweet = 'positive' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularPositiveTweetHDS = $resultat->fetch();
$popularPositiveTweetIdHDS = $popularPositiveTweetHDS['api_tweet_id'];
$popularPositiveTweetAccountHDS = $popularPositiveTweetHDS['twitter_account'];

$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '92')) AND quality_tweet = 'negative' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularNegativeTweetHDS = $resultat->fetch();
$popularNegativeTweetIdHDS = $popularNegativeTweetHDS['api_tweet_id'];
$popularNegativeTweetAccountHDS = $popularNegativeTweetHDS['twitter_account'];

//Seine-Saint-Denis
$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '93')) AND quality_tweet = 'positive' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularPositiveTweetSSD = $resultat->fetch();
$popularPositiveTweetIdSSD = $popularPositiveTweetSSD['api_tweet_id'];
$popularPositiveTweetAccountSSD = $popularPositiveTweetSSD['twitter_account'];

$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '93')) AND quality_tweet = 'negative' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularNegativeTweetSSD = $resultat->fetch();
$popularNegativeTweetIdSSD = $popularNegativeTweetSSD['api_tweet_id'];
$popularNegativeTweetAccountSSD = $popularNegativeTweetSSD['twitter_account'];

//Val-de-Marne
$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '94')) AND quality_tweet = 'positive' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularPositiveTweetVDM = $resultat->fetch();
$popularPositiveTweetIdVDM = $popularPositiveTweetVDM['api_tweet_id'];
$popularPositiveTweetAccountVDM = $popularPositiveTweetVDM['twitter_account'];

$resultat = $pdo->query("SELECT api_tweet_id, twitter_account FROM tweets WHERE tweet_publication_hour BETWEEN '$minTimeStr' AND '$maxTimeStr' AND geocode_id IN( SELECT geocode_id FROM geocodes WHERE department_id IN( SELECT department_id FROM departments WHERE department_code = '94')) AND quality_tweet = 'negative' ORDER BY retweets_quantity DESC LIMIT 1 ");
$popularNegativeTweetVDM = $resultat->fetch();
$popularNegativeTweetIdVDM = $popularNegativeTweetVDM['api_tweet_id'];
$popularNegativeTweetAccountVDM = $popularNegativeTweetVDM['twitter_account'];
    
            
  //BETWEEN $minTime AND $maxTime 
    
//}
//echo 'nb de tw + a paris : ';
//echo $positiveParisCount;
//echo 'nb de tw neutre a paris : ';
//echo $neutralParisCount;
//echo 'nb de tw - a paris : ';
//echo $negativeParisCount;




//$queryDepartmentSummary = DepartmentSummaryQuery()::create();


        //creation de l'objet résumédepartt Paris
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('75');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveParisCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralParisCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeParisCount);
        $departmentSummary->setPositivePopularTweetId($popularPositiveTweetIdParis);
        $departmentSummary->setPositiveTwitterAccount($popularPositiveTweetAccountParis);
        $departmentSummary->setNegativePopularTweetId($popularNegativeTweetIdParis);
        $departmentSummary->setNegativeTwitterAccount($popularNegativeTweetAccountParis);
        $departmentSummary->save();
        
        
//        //creation de l'objet résumédepartt 92
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('92');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveHDSCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralHDSCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeHDSCount);
        $departmentSummary->setPositivePopularTweetId($popularPositiveTweetIdHDS);
        $departmentSummary->setPositiveTwitterAccount($popularPositiveTweetAccountHDS);
        $departmentSummary->setNegativePopularTweetId($popularNegativeTweetIdHDS);
        $departmentSummary->setNegativeTwitterAccount($popularNegativeTweetAccountHDS);
        $departmentSummary->save();

        //creation de l'objet résumédepartt 93
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('93');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveSSDCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralSSDCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeSSDCount);
        $departmentSummary->setPositivePopularTweetId($popularPositiveTweetIdSSD);
        $departmentSummary->setPositiveTwitterAccount($popularPositiveTweetAccountSSD);
        $departmentSummary->setNegativePopularTweetId($popularNegativeTweetIdSSD);
        $departmentSummary->setNegativeTwitterAccount($popularNegativeTweetAccountSSD);
        $departmentSummary->save();
        
        //creation de l'objet résumédepartt VDM
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('94');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveVDMCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralVDMCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeVDMCount);
        $departmentSummary->setPositivePopularTweetId($popularPositiveTweetIdVDM);
        $departmentSummary->setPositiveTwitterAccount($popularPositiveTweetAccountVDM);
        $departmentSummary->setNegativePopularTweetId($popularNegativeTweetIdVDM);
        $departmentSummary->setNegativeTwitterAccount($popularNegativeTweetAccountVDM);
        $departmentSummary->save();


echo 'l insertion a marché';

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

$tweet = new Tweets();
$queryTweets = TweetsQuery::create();

//faire une boucle pour récupérer 8 tweets iframe
// TweetsQuery::create()
//         ->useGeocodesQuery()
//            ->useDepartmentsQuery()
//            ->filterByDepartmentCode(75)
//            ->endUse()
//         ->endUse()
//         ->filterByQualityTweet('positive')
//         ->filterByTweetPublicationHour($minTimeStr, \Propel\Runtime\ActiveQuery\Criteria::GREATER_EQUAL)
//         ->filterByTweetPublicationHour($maxTimeStr, \Propel\Runtime\ActiveQuery\Criteria::LOWER_EQUAL)
//         ->orderByRetweetsQuantity('DESC')
//         ->limit(1)
//         ->findOne();
//Paris
//on veut récupérer l'id et l'account du tweet populaire + de Paris pour reconstituer une url a envoyer a l'api twitter        
//$queryDepartmentSummary = DepartmentSummaryQuery()::create();
//$DepartmentSummary = new DepartmentSummary();
//
//$accountParis = $DepartmentSummary->getPositiveTwitterAccount()->getDe;
//
//
//$idParis = $DepartmentSummary->getPositivePopularTweetId();

//en requete SQL

//if (is_null($hour)) {
//            $hour = date('Y-m-d h:i:s');
//            echo $hour;
//        }
//AND map_publication_hour < '$hour'

$date = date('Y-m-d H:i:s');

//requeteUrlParisPositif
$resultat = $pdo->query("SELECT positive_popular_tweet_id, positive_twitter_account FROM department_summary WHERE department_code = '75' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatPositifParis = $resultat->fetchAll();
var_dump($resultatPositifParis);
$idPositifParis = $resultatPositifParis[0]['positive_popular_tweet_id'];
echo $idPositifParis;
$accountPositifParis = $resultatPositifParis[0]['positive_twitter_account'];
echo $accountPositifParis;



$url = "https://twitter.com/".$accountPositifParis ."/status/".$idPositifParis;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeParisPositif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeParisPositif );
$popularTweets->setDepartmentCode(75);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('positive');
$popularTweets->save();

//requeteUrlParisNegatif
$resultat = $pdo->query("SELECT negative_popular_tweet_id, negative_twitter_account FROM department_summary WHERE department_code = '75' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatNegatifParis = $resultat->fetchAll();
var_dump($resultatNegatifParis);
$idNegatifParis = $resultatNegatifParis[0]['negative_popular_tweet_id'];
echo $idNegatifParis;
$accountNegatifParis = $resultatNegatifParis[0]['negative_twitter_account'];
echo $accountNegatifParis;



$url = "https://twitter.com/".$accountNegatifParis ."/status/".$idNegatifParis;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeParisNegatif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeParisNegatif );
$popularTweets->setDepartmentCode(75);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('negative');
$popularTweets->save();

//requeteUrlHDSPositif
$resultat = $pdo->query("SELECT positive_popular_tweet_id, positive_twitter_account FROM department_summary WHERE department_code = '92' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatPositifHDS = $resultat->fetchAll();
var_dump($resultatPositifHDS);
$idPositifHDS = $resultatPositifHDS[0]['positive_popular_tweet_id'];
echo $idPositifHDS;
$accountPositifHDS = $resultatPositifHDS[0]['positive_twitter_account'];
echo $accountPositifHDS;



$url = "https://twitter.com/".$accountPositifHDS ."/status/".$idPositifHDS;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeHDSPositif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeHDSPositif );
$popularTweets->setDepartmentCode(92);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('positive');
$popularTweets->save();

//requeteUrlHDSNegatif
$resultat = $pdo->query("SELECT negative_popular_tweet_id, negative_twitter_account FROM department_summary WHERE department_code = '92' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatNegatifHDS = $resultat->fetchAll();
var_dump($resultatNegatifHDS);
$idNegatifHDS = $resultatNegatifHDS[0]['negative_popular_tweet_id'];
echo $idNegatifHDS;
$accountNegatifHDS = $resultatNegatifHDS[0]['negative_twitter_account'];
echo $accountNegatifHDS;



$url = "https://twitter.com/".$accountNegatifHDS ."/status/".$idNegatifHDS;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeHDSNegatif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeHDSNegatif );
$popularTweets->setDepartmentCode(92);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('negative');
$popularTweets->save();

//requeteUrlSSDPositif
$resultat = $pdo->query("SELECT positive_popular_tweet_id, positive_twitter_account FROM department_summary WHERE department_code = '93' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatPositifSSD = $resultat->fetchAll();
var_dump($resultatPositifSSD);
$idPositifSSD = $resultatPositifSSD[0]['positive_popular_tweet_id'];
echo $idPositifSSD;
$accountPositifSSD = $resultatPositifSSD[0]['positive_twitter_account'];
echo $accountPositifSSD;



$url = "https://twitter.com/".$accountPositifSSD ."/status/".$idPositifSSD;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeSSDPositif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeSSDPositif );
$popularTweets->setDepartmentCode(93);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('positive');
$popularTweets->save();

//requeteUrlSSDNegatif
$resultat = $pdo->query("SELECT negative_popular_tweet_id, negative_twitter_account FROM department_summary WHERE department_code = '93' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatNegatifSSD = $resultat->fetchAll();
var_dump($resultatNegatifSSD);
$idNegatifSSD = $resultatNegatifSSD[0]['negative_popular_tweet_id'];
echo $idNegatifSSD;
$accountNegatifSSD = $resultatNegatifSSD[0]['negative_twitter_account'];
echo $accountNegatifSSD;



$url = "https://twitter.com/".$accountNegatifSSD ."/status/".$idNegatifSSD;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeSSDNegatif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeSSDNegatif );
$popularTweets->setDepartmentCode(93);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('negative');
$popularTweets->save();


//requeteUrlVDMPositif
$resultat = $pdo->query("SELECT positive_popular_tweet_id, positive_twitter_account FROM department_summary WHERE department_code = '94' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatPositifVDM = $resultat->fetchAll();
var_dump($resultatPositifVDM);
$idPositifVDM = $resultatPositifVDM[0]['positive_popular_tweet_id'];
echo $idPositifVDM;
$accountPositifVDM = $resultatPositifVDM[0]['positive_twitter_account'];
echo $accountPositifVDM;



$url = "https://twitter.com/".$accountPositifVDM ."/status/".$idPositifVDM;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeVDMPositif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeVDMPositif );
$popularTweets->setDepartmentCode(94);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('positive');
$popularTweets->save();

//requeteUrlVDMNegatif
$resultat = $pdo->query("SELECT negative_popular_tweet_id, negative_twitter_account FROM department_summary WHERE department_code = '94' ORDER BY map_publication_hour DESC LIMIT 1");
$resultatNegatifVDM = $resultat->fetchAll();
var_dump($resultatNegatifVDM);
$idNegatifVDM = $resultatNegatifVDM[0]['negative_popular_tweet_id'];
echo $idNegatifVDM;
$accountNegatifVDM = $resultatNegatifVDM[0]['negative_twitter_account'];
echo $accountNegatifVDM;



$url = "https://twitter.com/".$accountNegatifVDM ."/status/".$idNegatifVDM;
    $responseTwitter = $connection->get("statuses/oembed", [
                "url" => $url,
                "maxwidth" => 325,
                "hide_media" => true,
                "hide_thread" => true
]);
var_dump($responseTwitter->html);
$iframeVDMNegatif = $responseTwitter->html;

$popularTweets = new PopularTweets();
$popularTweetsQuery = PopularTweetsQuery::create();
$popularTweets->setIframe($iframeVDMNegatif );
$popularTweets->setDepartmentCode(94);
$popularTweets->setTweetPublicationHour($date);
$popularTweets->setIframeQuality('negative');
$popularTweets->save();