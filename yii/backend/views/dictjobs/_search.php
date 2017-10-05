<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DictjobsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictjobs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'url_tag') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'on_main') ?>

    <?php // echo $form->field($model, 'job_unit') ?>

    <?php // echo $form->field($model, 'job_markup') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'types') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
