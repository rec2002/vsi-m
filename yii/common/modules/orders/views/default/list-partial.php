<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use kartik\select2\Select2;
use common\components\MemberHelper;

?>


<?php


if (sizeof($model->getModels())) {

    echo \yii\widgets\ListView::widget([
        'dataProvider' => $model,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('@common/modules/members/views/list-item', ['model' => $model, 'url' => '/orders/default/detail']);
        },
        'layout' => "\n{items}\n",
    ]);
} else {
    echo '<div class="alert alert-warning fade in alert-dismissable"><strong>Жодного замовлення не знайдено. </strong> </div>';
}

?>

<!-- TT-PAGINATION -->
<div class="tt-pagination clearfix">
    <?php
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $model->pagination,
        'linkOptions' => [''],
        'options' => ['class' => ''],
        'nextPageCssClass' => 'button type-1 btn-simple icon-right uppercase tt-pagination-right',
        'nextPageLabel' => 'наступні',
        'prevPageCssClass' => 'button type-1 btn-simple icon-left uppercase tt-pagination-left',
        'prevPageLabel' => 'попередні'

    ])
    ?>
</div>
