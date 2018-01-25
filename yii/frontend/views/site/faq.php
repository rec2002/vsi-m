<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\assets\AppAsset;


$this->title = 'Питання та відповіді';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tt-header-margin"></div>

<div class="tt-pageform-wrapper padding0">
    <div class="tt-bg-grey">
        <div class="empty-space marg-sm-b40 marg-lg-b70"></div>
        <div class="container">
            <h2 class="tt-banner-title h2 small text-center">Питання та відповіді</h2>
            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>



            <?=\common\widgets\Faq::widget(array('id' => '0')) ?>


        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
        <div class="tt-devider"></div>
    </div>
    <div class="container">
        <div class="empty-space marg-sm-b30 marg-lg-b60"></div>
        <h2 class="h2 text-center">Не знайшли відповіді?</h2>
        <div class="empty-space marg-lg-b30"></div>
        <div class="text-center">


            <a href="javascript:" class="button type-1 size-4 color-3 uppercase tt-faq-btn ">Задайте своє питання</a>

        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
    </div>
</div>

<?
$bundle = AppAsset::register(Yii::$app->view);
$bundle->js[] = '/js/faq.js';
?>


