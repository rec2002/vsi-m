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

<body>

<!-- LOADER -->
<div id="loader-wrapper"></div>


<!-- HEADER -->
<header class="tt-header <?=($isHome)? 'home' : ''?>">
    <div class="top-inner-container">
        <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
        <div class="cmn-toggle-switch"><span></span></div>
    </div>
    <div class="toggle-block">
        <div class="toggle-block-container">
            <div class="nav-left">
                <a href="new_task_1.html" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                <?=Nav::widget([
                    'items' => [
                        ['label' => 'Каталог майстрів', 'url' => ['site/category'], 'class' =>'button type-1 btn-simple'],
                        ['label' => 'Як це працює', 'url' => ['site/howitwork'], 'class' =>'button type-1 btn-simple'],

                    ],
                    'options' => ['class' =>'main-nav'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
            </div>
            <div class="nav-right">
                <a href="master-register.html" class="button type-1">Реєстрація майстра</a>
                <div class="nav-more">
                    <a href="login.html">Вхід</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="content-wrapper">

    <?= $content ?>

    <!-- TT-FOOTER -->
    <footer class="tt-footer">
        <div class="tt-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
<?=Nav::widget([
    'items' => [
        ['label' => 'Про нас', 'url' => ['site/about']],
        ['label' => 'Контакти', 'url' => ['site/contact']],
        ['label' => 'Питання та відповіді', 'url' => ['site/faq']],
        ['label' => 'Правила користування', 'url' => ['site/privacy']],
        ['label' => 'Як це працює', 'url' => ['site/howitwork']],
    ],
    'options' => ['class' =>'tt-footer-nav'], // set this to nav-tab to get tab-styled navigation
]);
?>

                    </div>
                    <div class="col-sm-4">
                        <div class="tt-footer-social">
                            <div class="tt-footer-social-label">Ми соцмережах:</div>
                            <ul class="tt-social">
                                <li>
                                    <a href="#">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAMFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkL9SS24AAAAD3RSTlMA8ar2FOsaJ4J2YUbomFmePvt7AAAAWUlEQVQoz2MYBdgAm+J/MBBKQBJ0/Q8FIUiC+jDBT0iC8jDBj0iC9v///+oHCX5GVfmd/T5MJULwNwPLZCyCDI8xBL+z9GCxaCLMIkwnEXI8wpvYA2QUYAEAROhw+W9H9KAAAAAASUVORK5CYII=" alt="">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAKlBMVEUAAAD///////////////////////////////////////////////////+Gu8ovAAAADXRSTlMA8ar2FOsaXieCdkaY2mYu3wAAAFlJREFUKM9jGAXYAJviXTAQSkASdL0LBSFIgrowwUtIgrIwwYtIgrZ3716fCxK8jKryBsdZmEqE4G0GlsVYBBmKMQRvsEzFYtFCmEWYTiLkeIQ3sQfIKMACAMW+YqMi/OZzAAAAAElFTkSuQmCC" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

    <?php $this->endBody() ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
</body>
</html>
<?php $this->endPage() ?>
