<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'rbac' => [
            'class' => 'backend\modules\rbac\rbac',
        ],
        'user' => [
            'class' => 'backend\modules\user\user',
        ],

        'goods' => [
            'class' => 'backend\modules\goods\goods',
        ],
        
        'article' => [
            'class' => 'backend\modules\article\article',
        ],
        'manage' => [
            'class' => 'backend\modules\manage\manage',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\AdminUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager' => [ 
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item', //认证项表名称
            'assignmentTable' => 'auth_assignment', //认证项父子关系
            'itemChildTable' => 'auth_item_child', //认证项赋权关系
        ],
    ],
    'params' => $params,
];
