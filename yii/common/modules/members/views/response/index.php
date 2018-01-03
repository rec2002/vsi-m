<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\components\MemberHelper;

$this->title = 'Кабінет користувача';

?>
<h1>response/index</h1>

<p>

<br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php

$model->setScenario('last_name');
$form3 = ActiveForm::begin(['id' => 'edit_last_name', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true,  'action' =>['/members/member/savemember/?scenario=last_name']]); ?>

    <?=$form3->field($model, 'last_name')->textInput([ 'validateOnSubmit' => true, 'class' => 'simple-input', 'placeholder' => "Прізвище"])->label(false); ?>
    <div class="tt-editable-form-btn">
        <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
    </div>

<?php ActiveForm::end(); ?>
