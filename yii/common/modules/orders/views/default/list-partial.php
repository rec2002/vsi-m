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

<div class="empty-space marg-sm-b0 marg-lg-b25"></div>



<!-- TT-PAGINATION -->
<nav aria-label="" id="pagination" class="tt-pagination clearfix">
    <?php echo \yii\widgets\LinkPager::widget([
        'pagination' => $model->pagination,
        'linkOptions' => ['class'=>'page-link'],
        'options' => ['class'=>'pagination'],
        'nextPageCssClass' => 'next',
        'nextPageLabel' => 'наступні',
        'prevPageCssClass' =>'prev',
        'prevPageLabel' => 'попередні'])
    ?>
</nav>
<div class="empty-space marg-sm-b40 marg-lg-b90"></div>