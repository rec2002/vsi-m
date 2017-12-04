<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/swiper.min.css',
        'css/style.css',
        'css/style_custom.css',
        'css/sumoselect.min.css'
    ];
    public $js = [
        'js/jquery.sumoselect.min.js',
        'js/jquery-ui.min.js',
        'js/datepicker-uk.js',
        'js/jquery.timeago.js',
        'js/jquery.timeago.uk.js',
        'js/jquery.timeago.uk.js',
        'js/swiper.jquery.min.js',
        'js/global.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
