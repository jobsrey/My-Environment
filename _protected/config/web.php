<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    // 'userClassName' => 'mdm\admin\models\User',
                    'userClassName' => 'dektrium\user\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu', //default from mdmadmin

        ],
        'gridview' =>  [
            'class' => 'kartik\grid\Module',
        ],
        'blog' => [
            'class' => 'amilna\blog\Module',
            'userClass' => 'dektrium\user\models\User', // example if use another user class 
        ],
        'ols' => [
            'class' => 'jobsrey\ols\Module',
        ], 
        'user' => [ 
            'class' => 'dektrium\user\Module',
            // 'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'enableConfirmation'=>false,
            // 'enableGeneratingPassword'=>true,
            'admins' => ['kireniusdena','adminweb'],
            'enableRegistration'=>true,
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mn8m9OGwV_PghtOHmUIxyjHv-uwIHHae',
        ],
        'cart' => [
            'class' => 'yii2mod\cart\Cart',
            // you can change default storage class as following:
            'storageClass' => [
                'class' => 'yii2mod\cart\storage\DatabaseStorage',
                // you can also override some properties 
                'deleteIfEmpty' => true
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            // 'class' => 'mdm\admin\components\DbManager',// or use 'yii\rbac\DbManager'
            'cache' => 'cache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/ols/<controller:.+>/<action:.+>/<id:\d+>' => '/ols/<controller>/<action>',
                '/ols/<controller:.+>/<action:.+>/<slug:.+>' => '/ols/<controller>/<action>',


                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*'as access' => [
            'class'=>'mdm\admin\components\AccessControl',
            'allowActions' => [
                'site/*',
                'admin/*',
                'user/*',
            ]
        ],*/
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
