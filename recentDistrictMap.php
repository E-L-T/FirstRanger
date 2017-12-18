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

//var_dump($resultatParis);

$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '92' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatHDS= $resultat->fetchAll();

//var_dump($resultatHDS);


$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '93' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatSSD = $resultat->fetchAll();

//var_dump($resultatSSD);

$resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '94' ORDER BY map_publication_hour DESC LIMIT 1");

$resultatVDM = $resultat->fetchAll();

//var_dump($resultatVDM);

//calcul de l'humeur de chq deprtt : ( (nbtwPos + 1/2nbTwNeut) / (nbtwTotal Tw) ) = note sur 20

//var_dump($resultatParis[0]['department_positive_tweets_quantity']);

$parisMood = (($resultatParis[0]['department_positive_tweets_quantity'] + ($resultatParis[0]['department_neutral_tweets_quantity'])/2) / ($resultatParis[0]['department_positive_tweets_quantity'] + $resultatParis[0]['department_neutral_tweets_quantity'] + $resultatParis[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de Paris est ' . '\n';
//echo $parisMood;
//echo ' /n ';
$parisMood = number_format($parisMood, 2, ',', ' ');
//echo 'apres numberformat : ';
//echo $parisMood;
//echo "stop";

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
$parisPositivePercentage = $parisPositiveQuantity/$parisTotalQuantity;
//echo $parisPositivePercentage;
$parisNegativePercentage = $parisNegativeQuantity/$parisTotalQuantity;
//echo $parisNegativePercentage;
$parisNeutralPercentage = $parisNeutralQuantity/$parisTotalQuantity;
//echo $parisNeutralPercentage;

$HDSMood = (($resultatHDS[0]['department_positive_tweets_quantity'] + ($resultatHDS[0]['department_neutral_tweets_quantity'])/2) / ($resultatHDS[0]['department_positive_tweets_quantity'] + $resultatHDS[0]['department_neutral_tweets_quantity'] + $resultatHDS[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de HDS est ' . '\n';
//echo $HDSMood;
//echo ' /n ';
$HDSMood = number_format($HDSMood, 2, ',', ' ');

$HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];

//echo $HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];
//echo ' /n ';
$HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo $HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo ' /n ';
$HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo $HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
$HDSTotalQuantity = $HDSPositiveQuantity + $HDSNegativeQuantity + $HDSNeutralQuantity;
$HDSPositivePercentage = $HDSPositiveQuantity/$HDSTotalQuantity;
//echo $HDSPositivePercentage;
$HDSNegativePercentage = $HDSNegativeQuantity/$HDSTotalQuantity;
//echo $HDSNegativePercentage;
$HDSNeutralPercentage = $HDSNeutralQuantity/$HDSTotalQuantity;
//echo $HDSNeutralPercentage;

$SSDMood = (($resultatSSD[0]['department_positive_tweets_quantity'] + ($resultatSSD[0]['department_neutral_tweets_quantity'])/2) / ($resultatSSD[0]['department_positive_tweets_quantity'] + $resultatSSD[0]['department_neutral_tweets_quantity'] + $resultatSSD[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de SSD est ' . '\n';
//echo $SSDMood;
//echo ' /n ';
$SSDMood = number_format($SSDMood, 2, ',', ' ');

$SSDPositiveQuantity = $resultatSSD[0]['department_positive_tweets_quantity'];

//echo $SSDPositiveQuantity = $resultatSSD[0]['department_positive_tweets_quantity'];
//echo ' /n ';
$SSDNegativeQuantity = $resultatSSD[0]['department_negative_tweets_quantity'];
//echo $SSDNegativeQuantity = $resultatSSD[0]['department_negative_tweets_quantity'];
//echo ' /n ';
$SSDNeutralQuantity = $resultatSSD[0]['department_neutral_tweets_quantity'];
//echo $SSDNeutralQuantity = $resultatSSD[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
$SSDTotalQuantity = $SSDPositiveQuantity + $SSDNegativeQuantity + $SSDNeutralQuantity;
$SSDPositivePercentage = $SSDPositiveQuantity/$SSDTotalQuantity;
//echo $SSDPositivePercentage;
$SSDNegativePercentage = $SSDNegativeQuantity/$SSDTotalQuantity;
//echo $SSDNegativePercentage;
$SSDNeutralPercentage = $SSDNeutralQuantity/$SSDTotalQuantity;
//echo $SSDNeutralPercentage;

$VDMMood = (($resultatVDM[0]['department_positive_tweets_quantity'] + ($resultatVDM[0]['department_neutral_tweets_quantity'])/2) / ($resultatVDM[0]['department_positive_tweets_quantity'] + $resultatVDM[0]['department_neutral_tweets_quantity'] + $resultatVDM[0]['department_negative_tweets_quantity']))*20;
//echo 'lhumeur de VDM est ' . '\n';
//echo $VDMMood;
//echo ' /n ';

$VDMMood = number_format($VDMMood, 2, ',', ' ');

$VDMPositiveQuantity = $resultatVDM[0]['department_positive_tweets_quantity'];

//echo $VDMPositiveQuantity = $resultatVDM[0]['department_positive_tweets_quantity'];
//echo ' /n ';
$VDMNegativeQuantity = $resultatVDM[0]['department_negative_tweets_quantity'];
//echo $VDMNegativeQuantity = $resultatVDM[0]['department_negative_tweets_quantity'];
//echo ' /n ';
$VDMNeutralQuantity = $resultatVDM[0]['department_neutral_tweets_quantity'];
//echo $VDMNeutralQuantity = $resultatVDM[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
$VDMTotalQuantity = $VDMPositiveQuantity + $VDMNegativeQuantity + $VDMNeutralQuantity;
$VDMPositivePercentage = $VDMPositiveQuantity/$VDMTotalQuantity;
//echo $VDMPositivePercentage;
$VDMNegativePercentage = $VDMNegativeQuantity/$VDMTotalQuantity;
//echo $VDMNegativePercentage;
$VDMNeutralPercentage = $VDMNeutralQuantity/$VDMTotalQuantity;
//echo $VDMNeutralPercentage;

$districtMood = ($parisMood + $HDSMood + $SSDMood + $VDMMood)/4;    

//echo 'lhumeur régionale est ' . '\n' ;
//echo $districtMood;

$bestMood = 0;
$bestMoodDepartment= '';

if($parisMood > $bestMood){
    $bestMood = $parisMood;
    $bestMoodDepartment= 'Paris';
}

if($HDSMood > $bestMood){
    $bestMood = $HDSMood;
    $bestMoodDepartment= 'HDS';
}

if($SSDMood > $bestMood){
    $bestMood = $SSDMood;
    $bestMoodDepartment= 'SSD';
}

if($VDMMood > $bestMood){
    $bestMood = $VDMMood;
    $bestMoodDepartment= 'VDM';
}

$worstMood = 21;
$worstMoodDepartment= '';

if($parisMood < $worstMood){
    $worstMood = $parisMood;
    $worstMoodDepartment= 'Paris';
}

if($HDSMood < $worstMood){
    $worstMood = $HDSMood;
    $worstMoodDepartment= 'HDS';
}

if($SSDMood < $worstMood){
    $worstMood = $SSDMood;
    $worstMoodDepartment= 'SSD';
}

if($VDMMood < $worstMood){
    $worstMood = $VDMMood;
    $worstMoodDepartment= 'VDM';
}

//echo 'le départment de meilleure humeur est : ' . '\n';
//echo $bestMoodDepartment;
//echo '\n';
//
//echo 'le départment de moins bonne humeur est : ' . '\n';
//echo $worstMoodDepartment;
//echo '\n';



if($_POST){
    
            echo $HDSPositiveQuantity;
            echo $
    
}

