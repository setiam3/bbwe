<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$config = [
    'id' => 'basic',
    'layout' => 'general', //of theme
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads/files/',
        '@urlUpload' => '/uploads/files/',
        '@mitrm' => '@vendor/mitrm',
    ],
    'modules' => [
        'chat' => [
            'class' => 'app\modules\chat\Module',
            'layout' => '@app/themes/limitless/views/layouts/main',
        ],
        'chatroom' => [
            'class' => 'app\modules\chatroom\CM',
            'layout' => '@app/modules/chatroom/views/layouts/main',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],

        ],
        'frontend' => [
            'class' => 'app\modules\frontend\Frontend',
            'layout' => '@app/themes/british/layouts/british',
        ],
        'backend' => [
            'class' => 'app\modules\backend\Backend',
            'layout' => '@app/modules/backend/views/layouts/main',
        ],
    ],
    'timeZone' => 'Asia/Jakarta',
    'components' => [
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'ffmpeg' => [
            'class' => '\rbtphp\ffmpeg\Ffmpeg',
            'path' => '/usr/bin/ffmpeg',
        ],
        'session' => [
            'class' => 'yii\web\CacheSession',
            // 'class' => 'yii\web\DbSession',
            // 'db' => $db,
            // 'sessionTable' => 'session',
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-black',
                ],
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/general'],
                'baseUrl' => '@web',
                'basePath' => '@web',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rsE2ILrUA0kdVMUW3hQuUKJ_Sfn7h02L',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'cache2' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis'
        ],
        'user' => [
            'identityClass' => 'app\models\Member',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db['main'],
        'chat_db' => $db['chat_db'],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'angular' => ['class' => 'dee\gii\generators\angular\Generator'],
        ]
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}
return $config;
