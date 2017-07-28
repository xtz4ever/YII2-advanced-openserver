<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=stockaccs',
            'username' => 'root',
            'password' => '',
            'enableSchemaCache' => true,
            'charset' => 'utf8',
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
    ],


];
