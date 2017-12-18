<?php

require_once __DIR__ . '/vendor/autoload.php';

use Propel\Common\Config\ConfigurationManager;
use Propel\Propel\DepartmentSummary;

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

//
//$resultat = $pdo->query("SELECT  department_code FROM departments");
//$departmentsCodeDepartments = $resultat->fetchAll();
//récupération des données pour chaque département
$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '75' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatParis = $resultat->fetchAll();

var_dump($resultatParis);

$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '92' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatHDS= $resultat->fetchAll();

var_dump($resultatHDS);


$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '93' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatSSD = $resultat->fetchAll();

var_dump($resultatSSD);

$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '94' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatVDM = $resultat->fetchAll();

var_dump($resultatVDM);

//calcul de l'humeur de chq deprtt : ( (nbtwPos + 1/2nbTwNeut) / (nbtwTotal Tw) ) = note sur 20

var_dump($resultatParis[0]['department_positive_tweets_quantity']);

$parisMood = (($resultatParis[0]['department_positive_tweets_quantity'] + $resultatParis[0]['department_neutral_tweets_quantity']) / ($resultatParis[0]['department_positive_tweets_quantity'] + $resultatParis[0]['department_neutral_tweets_quantity'] + $resultatParis[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de Paris est ' . '\n';
//echo $parisMood;
//echo ' /n ';

$parisPositiveQuantity = $resultatParis[0]['department_positive_tweets_quantity'];

//echo $parisPositiveQuantity = $resultatParis[0]['department_positive_tweets_quantity'];
//echo ' /n ';
$parisNegativeQuantity = $resultatParis[0]['department_negative_tweets_quantity'];
//echo $parisNegativeQuantity = $resultatParis[0]['department_negative_tweets_quantity'];
//echo ' /n ';
$parisNeutralQuantity = $resultatParis[0]['department_neutral_tweets_quantity'];
//echo $parisNeutralQuantity = $resultatParis[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
$parisTotalQuantity = $parisPositiveQuantity + $parisNegativeQuantity + $parisNeutralQuantity;


$HDSMood = (($resultatHDS[0]['department_positive_tweets_quantity'] + $resultatHDS[0]['department_neutral_tweets_quantity']) / ($resultatHDS[0]['department_positive_tweets_quantity'] + $resultatHDS[0]['department_neutral_tweets_quantity'] + $resultatHDS[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur des Hauts de Seine est ' . '\n';
//echo $HDSMood;
//echo ' /n ';

$HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];
//echo $HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];
//echo ' /n ';
$HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo $HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo ' /n ';
$HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo $HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo ' /n ';

$SSDMood = (($resultatSSD[0]['department_positive_tweets_quantity'] + $resultatSSD[0]['department_neutral_tweets_quantity']) / ($resultatSSD[0]['department_positive_tweets_quantity'] + $resultatSSD[0]['department_neutral_tweets_quantity'] + $resultatSSD[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de Seine Saint Denis est ' . '\n';
//echo $SSDMood;

$VDMMood = (($resultatVDM[0]['department_positive_tweets_quantity'] + $resultatVDM[0]['department_neutral_tweets_quantity']) / ($resultatVDM[0]['department_positive_tweets_quantity'] + $resultatVDM[0]['department_neutral_tweets_quantity'] + $resultatVDM[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur du VDM est ' . '\n';
//echo $VDMMood;

$districtMood = ($parisMood + $HDSMood + $SSDMood + $VDMMood)/4;    

//echo 'lhumeur régionale est ' . '\n' ;
//echo $districtMood;

if($_POST){
    
            echo $HDSPositiveQuantity;
    
}