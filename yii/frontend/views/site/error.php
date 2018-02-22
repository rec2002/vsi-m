<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\models\Seo;
$seo = new Seo();
$this->title = $name;
?>



<div class="tt-header-margin"></div>

<div class="tt-bg-grey">
    <div class="empty-space marg-sm-b40 marg-lg-b70"></div>
    <div class="container">
        <h2 class="tt-banner-title h2 small text-center"><?= Html::encode($this->title) ?></h2>
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        <div class="simple-text size-3 bold-style-2">
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
        </div>
    </div>
    <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
</div>


