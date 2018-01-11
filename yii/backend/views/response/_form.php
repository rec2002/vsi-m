<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>

<div class="member-response-form">

    <?php $form = ActiveForm::begin(); ?>



    <?
    $status = array(3=>'Крок 3', 4=>'На модерації', 5=>'Опубліковано');
    echo $form->field($model, 'step')->widget(Select2::classname(), [
    'data' => $status,
    'language' => 'uk',
    'hideSearch' => true,
    'options' => ['placeholder' => '-- Вибрати статус --'],
    'pluginOptions' => [
    'allowClear' => false
    ],
    ])->label('Змінити статус'); ?>

    <?= $form->field($model, 'message_approve')->textInput(['maxlength' => 255])->label('Вказати причину відмови'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Зберегти'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<? echo $this->registerJs("(function(){

    if ($('#memberresponse-step').val()!=3)  $('.field-memberresponse-message_approve').hide();
    
    $('#memberresponse-step').on('change', function(){
        if ($(this).val()!=3)  $('.field-memberresponse-message_approve').hide(); else $('.field-memberresponse-message_approve').show();
    });

})();" , \yii\web\View::POS_END );
?>