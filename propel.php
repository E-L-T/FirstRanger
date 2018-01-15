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
                    'dsn' => 'mysql:host=213.246.56.10;port=3306;dbname=firstranger',
                    'user' => 'moodyboy',
                    'password' => 'ytjtxkBmIV2A698r',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];
