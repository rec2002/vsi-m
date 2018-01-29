<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>

<div class="member-response-form">

    <?php $form = ActiveForm::begin(); ?>



    <?
    $status = array(0=>'Відмінити', 1=>'На модерації', 2=>'Опубліковано');
    echo $form->field($model, 'feedback_approve')->widget(Select2::classname(), [
    'data' => $status,
    'language' => 'uk',
    'hideSearch' => true,
    'options' => ['placeholder' => '-- Вибрати статус --'],
    'pluginOptions' => [
    'allowClear' => false
    ],
    ])->label('Змінити статус на коментар майстра'); ?>

    <?= $form->field($model, 'feedback_text_approve')->textInput(['maxlength' => 255])->label('Вказати причину відмови'); ?>

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