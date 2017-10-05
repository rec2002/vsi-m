<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model backend\models\FaqItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->widget(CKEditor::className(), [
        'clientOptions' => ['language' => 'uk'],
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>


    <?=$form->field($model, 'parent')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(backend\models\FaqGroups::findBySql('SELECT id, name FROM `faq_groups` WHERE active=1 ORDER BY priority ASC ')->all(), 'id', 'name'),
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '--Вибрати групу--'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>
    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
