<?php
return [
    'propel' => [
         'paths' => [
                // The directory where Propel expects to find your `schema.xml` file.
                'schemaDir' => '/var/www/html/FirstRanger',

                // The directory where Propel should output generated object model classes.
                'phpDir' => 'src/',
            ],
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host=31.207.33.82;port=3306;dbname=firstranger',
                    'user' => 'firstranger',
                    'password' => 'SBuy1s9O3CQsE86a',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];
