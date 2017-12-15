<?php

require_once __DIR__ . '/vendor/autoload.php';

use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\Departments;
use Propel\Propel\DepartmentsQuery;
use Propel\Propel\DepartmentSummary;
use Propel\Propel\DepartmentSummaryQuery;
use Propel\Propel\Geocodes;
use Propel\Propel\GeocodesQuery;
use Propel\Propel\Tweets;
use Propel\Propel\TweetsQuery;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\Propel;

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

$geocodes = new Geocodes();
$queryGeocodes = GeocodesQuery()::create();

$departments = new Departments();
$queryDepartments = DepartmentsQuery()::create();

$tweetsArray = $queryTweets ->filterByTweetPublicationHour(array(
    'min' => strtotime('-6 hours'),//'2017-12-15 05:01:33',//$nowRef->sub(new DateInterval('PT6H')),
    'max' => time(),
))
     ->find();
 //       ('desc')->limit($now->sub(new DateInterval('PT6H')))->find();

var_dump($tweetsArray);

$departmentSummary = new DepartmentSummary();
$queryDepartmentSummary = DepartmentSummaryQuery()::create();
//'Y-m-d H:i:s')



foreach ($tweetsArray as $tweet){
    //créer un objet departmentSummaryQuery et departmentSummary qu'on va implémenter avec des set.
    //pour chaque tweet, on récupère sa qualité et son department_code qu'on trouve dans la table departments
    
    $tweetQuality = $tweet->getQualityTweet();
    $tweet= TweetsQuery::create()->findPK();
    $department = $tweet->join
    
    $geocodeIdTweets = $tweet->getGeocodeId();
    
    $geocodeIdGeocodes = $tweet->getGeocodeId();
    
    $departmentIdGeocodes = $geocodes->getDepartmentId();
    
    $departmentIdDepartments = $departments->getDepartmentId();
    
    $departmentCodeDepartments = $departments->getDepartmentCode();
    
    $departmentCodeDepartmentSummary = $departmentSummary->getDepartmentCode();
    
    
    
            
            //= $geocodeId->getDepartmentId();
            
    if($tweet->getGeocodeId()) //si le tweet vient de tel deprtt
    // on veut calculer le nb de tweets positifs, neutres et negatifs, par departements
        //en incrémentant une variable totalTweets + - ou neutre
    

}

$departmentSummary->setMapPublicationHour(time());
$departmentSummary->getDepartmentCode()

$departmentSummary->save();
  


