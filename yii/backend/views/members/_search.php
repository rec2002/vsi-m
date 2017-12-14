<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MembersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'avatar_image') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'forma') ?>

    <?php // echo $form->field($model, 'brygada') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'busy_to') ?>

    <?php // echo $form->field($model, 'budget_min') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
