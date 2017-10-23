<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],
        'turbosms' => [
            'class' => 'avator\turbosms\Turbosms',
            'sender' => 'VsiMastry',
            'login' => 'rec2002',
            'password' => '74002abc',
        //    'debug' => false,
        ],
    ],
];
