<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Всі категорії майстрів';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tt-header-margin"></div>
<div class="tt-bg-grey">
    <div class="tt-pageform-wrapper padding0">

        <?=\common\widgets\Categories::widget() ?>

    </div>
</div>

