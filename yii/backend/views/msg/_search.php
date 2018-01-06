<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MsgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-msg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'suggestion_id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'member_id') ?>

    <?= $form->field($model, 'who_id') ?>

    <?php // echo $form->field($model, 'whom_id') ?>

    <?php // echo $form->field($model, 'msg') ?>

    <?php // echo $form->field($model, 'system') ?>

    <?php // echo $form->field($model, 'support') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
