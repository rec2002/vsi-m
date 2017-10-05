<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Dictypes;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictjobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictjobs-form">

    <?php $form = ActiveForm::begin(['options' => ['class'=>'modal-form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,  'class' => 'form-control ' ]) ?>


    <?=$form->field($model, 'parent')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dictypes::findBySql('SELECT id, name FROM dict_category WHERE active=1 AND  types=1 ORDER BY name ASC ')->all(), 'id', 'name'),
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати `вид робіт` --'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <?=$form->field($model, 'job_unit')->widget(Select2::classname(), [
        'data' => [1=>'грн. / год', 2=>'грн. / шт.', 3=>'грн. / м2', 4=>'грн. / м3', 5=>'грн. / м/п', 6=>'грн. / місце'],
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати тип обрахунку --'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <?= $form->field($model, 'types')->hiddenInput(['value'=>2])->label(false);?>

    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>

    <?= $form->field($model, 'job_markup')->widget(kartik\switchinput\SwitchInput::classname(), [
        'pluginOptions'=>[
            'onText'=>'TAK',
            'offText'=>'HI'
        ]])->label('Виділити чорним');

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
