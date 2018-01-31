<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'uk',
    'sourceLanguage'=>'uk',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',



    'modules' => [
        'members' => [
            'class' => 'common\modules\members\members',
        ],
        'professionals' => [
            'class' => 'common\modules\professionals\professionals',
        ],
        'orders' => [
            'class' => 'common\modules\orders\orders',
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
/*        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
*/

        'user' => [
                 'identityClass' => 'common\modules\members\models\Members',
                    'enableAutoLogin' => true,
                    'identityCookie' => ['name' => '_identity-member', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'assetManager' => [
            'bundles' => [
                /*
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        'bootstrap.css' => '/css/bootstrap.min.css'
                    ]
                ],

                */
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/jquery.min.js',
                    ]
                ]
            ]
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                /*'каталог-майстрів/<region:\w+>/<cat:\w+>' =>'/members/professionals/',
                 'каталог-майстрів/' =>'/members/professionals',*/



                /*'кабінет/виконані-проекти' =>'/members/portfolio/list',*/
                /*'кабінет/мої-замовлення' =>'members/customer/list',*/
                'orders'=>'orders/default/index',
                'blog/<id:\d+>/<slug>'=>'site/publish',
                'blog'=>'site/publish',
                'category'=>'site/category',
                'howitwork'=>'site/howitwork',
                'howitworkmaster'=>'site/howitworkmaster',
                'privacy'=>'site/privacy',
                'faq'=>'site/faq',
                'about'=>'site/about',
                'contact'=>'site/contact',
                'whywe'=>'site/whywe',
                'defaultRoute' => 'site/index',
            ],
        ],


    ],
    'params' => $params,
];
