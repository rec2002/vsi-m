<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="layer-close"></div>
<div class="popup-container">
    <div class="popup-align">
        <div class="tt-send-question-form">
            <?php $form = ActiveForm::begin(['id' => 'faq-form', 'action' =>['site/faqform']]); ?>
            <h4 class="h4 text-center" style="font-weight: 400;">Задати питання</h4>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'simple-input', 'placeholder' => "Ваше ім’я *"])->label(false); ?>

            <?= $form->field($model, 'email')->textInput(['class' => 'simple-input', 'placeholder' => "Email *"])->label(false); ?>

            <?= $form->field($model, 'message')->textarea(['rows' => 6, 'class' => 'simple-input height-2', 'placeholder' => "Яке ваше питання? *"])->label(false); ?>

            <div class="text-right">
                <?= Html::submitButton('Надіслати', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'faq-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="button-close" id="button-close"></div>
</div>

<style>
    div.form-group.field-faqform-email.required.has-error{margin-bottom: 5px;}
</style>