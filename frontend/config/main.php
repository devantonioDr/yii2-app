<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                // your rules go here
                
            ],
            // ...
        ],

        // UrlManager component for client, address, and profile controllers
        'clientUrlManager' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '/mnt', // Prefix for all URLs
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'client' => 'client/index', // maps `/mnt/client` to `ClientController::actionIndex()`
                'address' => 'address/index', // maps `/mnt/address` to `AddressController::actionIndex()`
                'profile' => 'profile/index', // maps `/mnt/profile` to `ProfileController::actionIndex()`
                // Your custom URL rules here
            ],
        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
    'urlManager' => [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
    ],
    ],
     */
    ],
    'params' => $params,
];
