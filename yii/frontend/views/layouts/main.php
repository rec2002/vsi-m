<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- LOADER -->
    <style>
        #loader-wrapper{position:fixed;top:0;left:0;height:100%;width:100%;background:#fff;z-index:300;}
    </style>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<?php
    $controller = Yii::$app->controller;
    $default_controller = Yii::$app->defaultRoute;
    $isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="//www.googletagmanager.com/gtag/js?id=UA-113317503-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113317503-1');
</script>
<body>

<!-- LOADER -->
<div id="loader-wrapper"></div>

<?=$this->render('header', ['isHome' =>$isHome]);?>


<div id="content-wrapper">

    <?= $content ?>
    <?=$this->render('footer');?>

</div>

    <?php $this->endBody() ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">

</body>
</html>
<?php $this->endPage() ?>
