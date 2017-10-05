<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\MailTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mail-template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emails')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notices')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mail_content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            /*'plugins' => [
                "advlist autolink lists link charmap hr preview pagebreak",
                "searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking",
                "save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager",
            ],
            */
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media",
            'external_filemanager_path' => '/admin/plugins/responsivefilemanager/filemanager/',
            'filemanager_title' => 'Responsive Filemanager',
            'external_plugins' => [
                // Кнопка загрузки файла в диалоге вставки изображения.
                'filemanager' => '/admin/plugins/responsivefilemanager/filemanager/plugin.min.js',
                // Кнопка загрузки файла в тулбаре.
                'responsivefilemanager' => '/admin/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            ],
            'language' => 'uk'
        ],

    ]) ?>

    <?= $form->field($model, 'sms_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
