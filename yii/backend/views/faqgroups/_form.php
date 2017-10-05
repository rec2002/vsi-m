<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>
    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
