<?php

namespace App;


use Propel\Propel\Departments;
use Propel\Propel\DepartmentsQuery;
use Propel\Propel\DepartmentSummary;
use Propel\Propel\Tweets;
use Propel\Propel\TweetsQuery;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RcentDistrictClass
 *
 * @author eric
 */
class RecentDistrictClass
{

    private $parisPositiveQuantity;
    private $parisNegativeQuantity;
    private $parisNeutralQuantity;
    private $parisTotalQuantity;
    private $HDSPositiveQuantity;
    private $HDSNegativeQuantity;
    private $HDSNeutralQuantity;
    private $HDSTotalQuantity;
    private $SSDPositiveQuantity;
    private $SSDNegativeQuantity;
    private $SSDNeutralQuantity;
    private $SSDTotalQuantity;
    private $VDMPositiveQuantity;
    private $VDMNegativeQuantity;
    private $VDMNeutralQuantity;
    private $VDMTotalQuantity;
    private $parisMood;
    private $HDSMood;
    private $SSDMood;
    private $VDMMood;
    private $districtMood;
    private $parisPositivePercentage;
    private $parisNegativePercentage;
    private $parisNeutralPercentage;
    private $HDSPositivePercentage;
    private $HDSNegativePercentage;
    private $HDSNeutralPercentage;
    private $SSDPositivePercentage;
    private $SSDNegativePercentage;
    private $SSDNeutralPercentage;
    private $VDMPositivePercentage;
    private $VDMNegativePercentage;
    private $VDMNeutralPercentage;
    private $bestMood;
    private $worstMood;
    private $bestMoodDepartment;
    private $worstMoodDepartment;

    public function generateDistrictMap()
    {


        //// Connexion BDD
        $pdo = new \PDO('mysql:host=31.207.33.82;port=3306;dbname=firstranger', 'firstranger', 'SBuy1s9O3CQsE86a', array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_BOTH
        ));



//
//$resultat = $pdo->query("SELECT  department_code FROM departments");
//$departmentsCodeDepartments = $resultat->fetchAll();
//récupération des données pour chaque département
        $resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '75' ORDER BY map_publication_hour DESC LIMIT 1");

        $resultatParis = $resultat->fetchAll();

//var_dump($resultatParis);

        $resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '92' ORDER BY map_publication_hour DESC LIMIT 1");

        $resultatHDS = $resultat->fetchAll();

//var_dump($resultatHDS);


        $resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '93' ORDER BY map_publication_hour DESC LIMIT 1");

        $resultatSSD = $resultat->fetchAll();

//var_dump($resultatSSD);

        $resultat = $pdo->query("SELECT department_positive_tweets_quantity, department_negative_tweets_quantity, department_neutral_tweets_quantity FROM department_summary WHERE department_code = '94' ORDER BY map_publication_hour DESC LIMIT 1");

        $resultatVDM = $resultat->fetchAll();

//var_dump($resultatVDM);
//calcul de l'humeur de chq deprtt : ( (nbtwPos + 1/2nbTwNeut) / (nbtwTotal Tw) ) = note sur 20
//var_dump($resultatParis[0]['department_positive_tweets_quantity']);

        $this->parisMood = (($resultatParis[0]['department_positive_tweets_quantity'] + ($resultatParis[0]['department_neutral_tweets_quantity']) / 2) / ($resultatParis[0]['department_positive_tweets_quantity'] + $resultatParis[0]['department_neutral_tweets_quantity'] + $resultatParis[0]['department_negative_tweets_quantity'])) * 20;
//echo 'lhumeur de Paris est ' . '\n';
//echo $this->parisMood;
//echo ' /n ';
        $this->parisMood = number_format($this->parisMood, 2, '.', ' ');
//echo 'apres numberformat : ';
//echo $this->parisMood;
//echo "stop";

        $this->parisPositiveQuantity = $resultatParis[0]['department_positive_tweets_quantity'];

//echo $this->parisPositiveQuantity = $resultatParis[0]['department_positive_tweets_quantity'];
//echo ' /n ';
        $this->parisNegativeQuantity = $resultatParis[0]['department_negative_tweets_quantity'];
//echo $this->parisNegativeQuantity = $resultatParis[0]['department_negative_tweets_quantity'];
//echo ' /n ';
        $this->parisNeutralQuantity = $resultatParis[0]['department_neutral_tweets_quantity'];
//echo $this->parisNeutralQuantity = $resultatParis[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
        $this->parisTotalQuantity = $this->parisPositiveQuantity + $this->parisNegativeQuantity + $this->parisNeutralQuantity;
        $this->parisPositivePercentage = $this->parisPositiveQuantity / $this->parisTotalQuantity;
//echo $this->parisPositivePercentage;
        $this->parisNegativePercentage = $this->parisNegativeQuantity / $this->parisTotalQuantity;
//echo $this->parisNegativePercentage;
        $this->parisNeutralPercentage = $this->parisNeutralQuantity / $this->parisTotalQuantity;
//echo $this->parisNeutralPercentage;

        $this->HDSMood = (($resultatHDS[0]['department_positive_tweets_quantity'] + ($resultatHDS[0]['department_neutral_tweets_quantity']) / 2) / ($resultatHDS[0]['department_positive_tweets_quantity'] + $resultatHDS[0]['department_neutral_tweets_quantity'] + $resultatHDS[0]['department_negative_tweets_quantity'])) * 20;
//echo 'lhumeur de HDS est ' . '\n';
//echo $this->HDSMood;
//echo ' /n ';
        $this->HDSMood = number_format($this->HDSMood, 2, '.', ' ');

        $this->HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];

//echo $this->HDSPositiveQuantity = $resultatHDS[0]['department_positive_tweets_quantity'];
//echo ' /n ';
        $this->HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo $this->HDSNegativeQuantity = $resultatHDS[0]['department_negative_tweets_quantity'];
//echo ' /n ';
        $this->HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo $this->HDSNeutralQuantity = $resultatHDS[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
        $this->HDSTotalQuantity = $this->HDSPositiveQuantity + $this->HDSNegativeQuantity + $this->HDSNeutralQuantity;
        $this->HDSPositivePercentage = $this->HDSPositiveQuantity / $this->HDSTotalQuantity;
//echo $this->HDSPositivePercentage;
        $this->HDSNegativePercentage = $this->HDSNegativeQuantity / $this->HDSTotalQuantity;
//echo $this->HDSNegativePercentage;
        $this->HDSNeutralPercentage = $this->HDSNeutralQuantity / $this->HDSTotalQuantity;
//echo $this->HDSNeutralPercentage;

        $this->SSDMood = (($resultatSSD[0]['department_positive_tweets_quantity'] + ($resultatSSD[0]['department_neutral_tweets_quantity']) / 2) / ($resultatSSD[0]['department_positive_tweets_quantity'] + $resultatSSD[0]['department_neutral_tweets_quantity'] + $resultatSSD[0]['department_negative_tweets_quantity'])) * 20;
//echo 'lhumeur de SSD est ' . '\n';
//echo $this->SSDMood;
//echo ' /n ';
        $this->SSDMood = number_format($this->SSDMood, 2, '.', ' ');

        $this->SSDPositiveQuantity = $resultatSSD[0]['department_positive_tweets_quantity'];

//echo $this->SSDPositiveQuantity = $resultatSSD[0]['department_positive_tweets_quantity'];
//echo ' /n ';
        $this->SSDNegativeQuantity = $resultatSSD[0]['department_negative_tweets_quantity'];
//echo $this->SSDNegativeQuantity = $resultatSSD[0]['department_negative_tweets_quantity'];
//echo ' /n ';
        $this->SSDNeutralQuantity = $resultatSSD[0]['department_neutral_tweets_quantity'];
//echo $this->SSDNeutralQuantity = $resultatSSD[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
        $this->SSDTotalQuantity = $this->SSDPositiveQuantity + $this->SSDNegativeQuantity + $this->SSDNeutralQuantity;
        $this->SSDPositivePercentage = $this->SSDPositiveQuantity / $this->SSDTotalQuantity;
//echo $this->SSDPositivePercentage;
        $this->SSDNegativePercentage = $this->SSDNegativeQuantity / $this->SSDTotalQuantity;
//echo $this->SSDNegativePercentage;
        $this->SSDNeutralPercentage = $this->SSDNeutralQuantity / $this->SSDTotalQuantity;
//echo $this->SSDNeutralPercentage;

        $this->VDMMood = (($resultatVDM[0]['department_positive_tweets_quantity'] + ($resultatVDM[0]['department_neutral_tweets_quantity']) / 2) / ($resultatVDM[0]['department_positive_tweets_quantity'] + $resultatVDM[0]['department_neutral_tweets_quantity'] + $resultatVDM[0]['department_negative_tweets_quantity'])) * 20;
//echo 'lhumeur de VDM est ' . '\n';
//echo $this->VDMMood;
//echo ' /n ';

        $this->VDMMood = number_format($this->VDMMood, 2, '.', ' ');

        $this->VDMPositiveQuantity = $resultatVDM[0]['department_positive_tweets_quantity'];

//echo $this->VDMPositiveQuantity = $resultatVDM[0]['department_positive_tweets_quantity'];
//echo ' /n ';
        $this->VDMNegativeQuantity = $resultatVDM[0]['department_negative_tweets_quantity'];
//echo $this->VDMNegativeQuantity = $resultatVDM[0]['department_negative_tweets_quantity'];
//echo ' /n ';
        $this->VDMNeutralQuantity = $resultatVDM[0]['department_neutral_tweets_quantity'];
//echo $this->VDMNeutralQuantity = $resultatVDM[0]['department_neutral_tweets_quantity'];
//echo ' /n ';
        $this->VDMTotalQuantity = $this->VDMPositiveQuantity + $this->VDMNegativeQuantity + $this->VDMNeutralQuantity;
        $this->VDMPositivePercentage = $this->VDMPositiveQuantity / $this->VDMTotalQuantity;
//echo $this->VDMPositivePercentage;
        $this->VDMNegativePercentage = $this->VDMNegativeQuantity / $this->VDMTotalQuantity;
//echo $this->VDMNegativePercentage;
        $this->VDMNeutralPercentage = $this->VDMNeutralQuantity / $this->VDMTotalQuantity;
//echo $this->VDMNeutralPercentage;

        $this->districtMood = ($this->parisMood + $this->HDSMood + $this->SSDMood + $this->VDMMood) / 4;

//echo 'lhumeur régionale est ' . '\n' ;
//echo $this->districtMood;

        $this->bestMood = 0;
        $this->bestMoodDepartment = '';

        if ($this->parisMood > $this->bestMood) {
            $this->bestMood = $this->parisMood;
            $this->bestMoodDepartment = 'Paris';
        }

        if ($this->HDSMood > $this->bestMood) {
            $this->bestMood = $this->HDSMood;
            $this->bestMoodDepartment = 'Hauts-de-Seine';
        }

        if ($this->SSDMood > $this->bestMood) {
            $this->bestMood = $this->SSDMood;
            $this->bestMoodDepartment = 'Seine-Saint-Denis';
        }

        if ($this->VDMMood > $this->bestMood) {
            $this->bestMood = $this->VDMMood;
            $this->bestMoodDepartment = 'Val-de-Marne';
        }

        $this->worstMood = 21;
        $this->worstMoodDepartment = '';

        if ($this->parisMood < $this->worstMood) {
            $this->worstMood = $this->parisMood;
            $this->worstMoodDepartment = 'Paris';
        }

        if ($this->HDSMood < $this->worstMood) {
            $this->worstMood = $this->HDSMood;
            $this->worstMoodDepartment = 'Hauts-de-Seine';
        }

        if ($this->SSDMood < $this->worstMood) {
            $this->worstMood = $this->SSDMood;
            $this->worstMoodDepartment = 'Seine-Saint-Denis';
        }

        if ($this->VDMMood < $this->worstMood) {
            $this->worstMood = $this->VDMMood;
            $this->worstMoodDepartment = 'Val-de-Marne';
        }
    }

    function getParisPositiveQuantity()
    {
        return $this->parisPositiveQuantity;
    }

    function getParisNegativeQuantity()
    {
        return $this->parisNegativeQuantity;
    }

    function getParisNeutralQuantity()
    {
        return $this->parisNeutralQuantity;
    }

    function getParisTotalQuantity()
    {
        return $this->parisTotalQuantity;
    }

    function getHDSPositiveQuantity()
    {
        return $this->HDSPositiveQuantity;
    }

    function getHDSNegativeQuantity()
    {
        return $this->HDSNegativeQuantity;
    }

    function getHDSNeutralQuantity()
    {
        return $this->HDSNeutralQuantity;
    }

    function getHDSTotalQuantity()
    {
        return $this->HDSTotalQuantity;
    }

    function getSSDPositiveQuantity()
    {
        return $this->SSDPositiveQuantity;
    }

    function getSSDNegativeQuantity()
    {
        return $this->SSDNegativeQuantity;
    }

    function getSSDNeutralQuantity()
    {
        return $this->SSDNeutralQuantity;
    }

    function getSSDTotalQuantity()
    {
        return $this->SSDTotalQuantity;
    }

    function getVDMPositiveQuantity()
    {
        return $this->VDMPositiveQuantity;
    }

    function getVDMNegativeQuantity()
    {
        return $this->VDMNegativeQuantity;
    }

    function getVDMNeutralQuantity()
    {
        return $this->VDMNeutralQuantity;
    }

    function getVDMTotalQuantity()
    {
        return $this->VDMTotalQuantity;
    }

    function getParisMood()
    {
        return $this->parisMood;
    }

    function getHDSMood()
    {
        return $this->HDSMood;
    }

    function getSSDMood()
    {
        return $this->SSDMood;
    }

    function getVDMMood()
    {
        return $this->VDMMood;
    }

    function getDistrictMood()
    {
        return $this->districtMood;
    }

    function getParisPositivePercentage()
    {
        return $this->parisPositivePercentage;
    }

    function getParisNegativePercentage()
    {
        return $this->parisNegativePercentage;
    }

    function getParisNeutralPercentage()
    {
        return $this->parisNeutralPercentage;
    }

    function getHDSPositivePercentage()
    {
        return $this->HDSPositivePercentage;
    }

    function getHDSNegativePercentage()
    {
        return $this->HDSNegativePercentage;
    }

    function getHDSNeutralPercentage()
    {
        return $this->HDSNeutralPercentage;
    }

    function getSSDPositivePercentage()
    {
        return $this->SSDPositivePercentage;
    }

    function getSSDNegativePercentage()
    {
        return $this->SSDNegativePercentage;
    }

    function getSSDNeutralPercentage()
    {
        return $this->SSDNeutralPercentage;
    }

    function getVDMPositivePercentage()
    {
        return $this->VDMPositivePercentage;
    }

    function getVDMNegativePercentage()
    {
        return $this->VDMNegativePercentage;
    }

    function getVDMNeutralPercentage()
    {
        return $this->VDMNeutralPercentage;
    }

    function getBestMood()
    {
        return $this->bestMood;
    }

    function getWorstMood()
    {
        return $this->worstMood;
    }

    function getBestMoodDepartment()
    {
        return $this->bestMoodDepartment;
    }

    function getWorstMoodDepartment()
    {
        return $this->worstMoodDepartment;
    }

}
