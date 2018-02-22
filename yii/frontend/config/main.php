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

                'login'=>'members/login',
                'login/reset'=>'members/login/reset',
                'login/resetpassword'=>'/members/login/resetpassword',

                'new-order'=>'/orders/default/addorder',


                'orders-suggested/<page:\d+>/<limit:\d+>/status/<status:\d+>'=>'orders/default/suggested',
                'orders-suggested/<page:\d+>/<limit:\d+>'=>'orders/default/suggested',
                'orders-suggested/status/<status:\d+>'=>'orders/default/suggested',
                'orders-suggested'=>'orders/default/suggested',

                'myorders/<page:\d+>/<limit:\d+>/status/<status:\d+>'=>'orders/default/myorders',
                'myorders/<page:\d+>/<limit:\d+>'=>'orders/default/myorders',
                'myorders/status/<status:\d+>'=>'orders/default/myorders',
                'myorders'=>'orders/default/myorders',

                'order/<id:\d+>/<slug>'=>'orders/default/detail',
                'orders/list/<page:\d+>/<limit:\d+>'=>'orders/default/index',
                'orders/list'=>'orders/default/index',

                'blog/<id:\d+>/<slug>'=>'site/publish',
                'blog/list/<page:\d+>/<limit:\d+>'=>'site/publish',
                'blog/list'=>'site/publish',


                'account/msg/filter/<filter:\w+>'=>'members/msg',
                'account/msg'=>'members/msg',
                'account/edit'=>'members/member',
                'account/prices'=>'members/member/types',
                'account/projects'=>'members/portfolio/list',
                'account/change-pwd'=>'members/member/resetpwd',
                'account/notices'=>'members/member/noticesettings',
                'account/billing'=>'members/member/billing',
                'account/billing-history'=>'members/member/billinghistory',
                'account/payment'=>'members/member/billingpayment',
                'account/profile'=>'members/member/profile',
                'account/edit'=>'members/customer',


                'create-order'=>'members/customregistration/create',
                'registration/<id:\d+>'=>'members/registration',
                'registration'=>'members/registration',
#                'professionals/region/<region:[\wd-]+>/cat/<cat:[\wd-]+>'=>'professionals',
#                'professionals/region/<region:[\wd-]+>'=>'professionals',
#                'professionals/cat/<cat:[\wd-]+>'=>'professionals',
                'professionals/profile/<id:\d+>'=>'/professionals/default/profile',
                'professionals/<page:\d+>/<limit:\d+>'=>'professionals/default/index',
                'professionals'=>'professionals/default/index',

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
