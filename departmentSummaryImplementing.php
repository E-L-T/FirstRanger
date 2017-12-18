<?php

require_once __DIR__ . '/vendor/autoload.php';

use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\Departments;
use Propel\Propel\DepartmentsQuery;
use Propel\Propel\DepartmentSummary;
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
//$departments = new Departments();
//$queryDepartments = DepartmentsQuery::create();
//$departmentsCodeDepartments = $queryDepartments->filterByDepartmentCode()->find();
//$geocodes = new Geocodes();
//$queryGeocodes = GeocodesQuery()::create();
//
//creation du tableau departement 
$resultat = $pdo->query("SELECT  department_code FROM departments");
$departmentsCodeDepartments = $resultat->fetchAll();
//var_dump($departmentsCodeDepartments);


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
//echo 'nb de tw + a paris : ';
//echo $positiveParisCount;
//echo 'nb de tw neutre a paris : ';
//echo $neutralParisCount;
//echo 'nb de tw - a paris : ';
//echo $negativeParisCount;




//$queryDepartmentSummary = DepartmentSummaryQuery()::create();


        //creation de l'objet résumédepartt
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('75');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveParisCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralParisCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeParisCount);
        $departmentSummary->save();
        
        //creation de l'objet résumédepartt
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('92');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveHDSCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralHDSCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeHDSCount);
        $departmentSummary->save();

        //creation de l'objet résumédepartt
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('93');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveSSDCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralSSDCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeSSDCount);
        $departmentSummary->save();
        
        //creation de l'objet résumédepartt
        $departmentSummary = new DepartmentSummary();
        $departmentSummary->setMapPublicationHour(time());
        $departmentSummary->setDepartmentCode('94');
        $departmentSummary->setDepartmentPositiveTweetsQuantity($positiveVDMCount);
        $departmentSummary->setDepartmentNeutralTweetsQuantity($neutralVDMCount);
        $departmentSummary->setDepartmentNegativeTweetsQuantity($negativeVDMCount);
        $departmentSummary->save();




echo 'l insertion a marché';