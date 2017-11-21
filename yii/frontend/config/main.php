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
                'каталог-майстрів/<region:\w+>/<cat:\w+>' =>'/members/professionals/',
                 'каталог-майстрів/' =>'/members/professionals',
                'кабінет/виконані-проекти' =>'/members/portfolio/list',
                'кабінет/мої-замовлення' =>'members/customer/list',
                'блог/<id:\d+>/<slug>'=>'site/publish',
                'блог'=>'site/publish',
                'всі-категорії-майстрів'=>'site/category',
                'як-це-працює'=>'site/howitwork',
                'як-це-працює-для-майстра'=>'site/howitworkmaster',
                'правила-користування'=>'site/privacy',
                'питання-та-відповіді'=>'site/faq',
                'про-нас'=>'site/about',
                'контакти'=>'site/contact',
                'чому-варто-обирати-нас'=>'site/whywe',
                'defaultRoute' => 'site/index',
            ],
        ],


    ],
    'params' => $params,
];
