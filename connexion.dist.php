<?php
 $pdo = new \PDO('mysql:host=213.246.56.10;port=3306;dbname=firstranger', 'moodyboy', '', array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_BOTH
        ));