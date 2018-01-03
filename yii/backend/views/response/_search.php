<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ResponseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-response-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'suggestion_id') ?>

    <?= $form->field($model, 'step') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'devotion') ?>

    <?php // echo $form->field($model, 'connected') ?>

    <?php // echo $form->field($model, 'punctuality') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'terms') ?>

    <?php // echo $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'meeting') ?>

    <?php // echo $form->field($model, 'meeting_result') ?>

    <?php // echo $form->field($model, 'meeting_comment') ?>

    <?php // echo $form->field($model, 'date_continue') ?>

    <?php // echo $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'days') ?>

    <?php // echo $form->field($model, 'positive_negative') ?>

    <?php // echo $form->field($model, 'come_personality') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'positive_note') ?>

    <?php // echo $form->field($model, 'negative_note') ?>

    <?php // echo $form->field($model, 'performer') ?>

    <?php // echo $form->field($model, 'dogovir') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
