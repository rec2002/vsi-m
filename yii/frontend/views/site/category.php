<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Seo;
$seo = new Seo();

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tt-header-margin"></div>
<div class="tt-bg-grey">
    <div class="tt-pageform-wrapper padding0">

        <?=\common\widgets\Categories::widget() ?>

    </div>
</div>

