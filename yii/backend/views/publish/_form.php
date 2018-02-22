<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Publish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publish-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'enableAjaxValidation'=>true,
        'validationUrl'=>Url::toRoute('publish/validation'),
        'options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'id')->hiddenInput(['value'=> $model->isNewRecord ? '' : $model->id])->label(false); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,  'class' => 'form-control name_tag']) ?>
    <?//= $form->field($model, 'url_tag')->textInput(['maxlength' => true,  'class' => 'form-control name_tag_value']) ?>

    <?= $form->field($model, 'short_desc')->textarea(['rows' => 3]) ?>

    <?=$form->field($model, 'file')->widget(kartik\file\FileInput::className(), [
        'name' => 'image',
        'pluginOptions' => [
            'allowedFileExtensions' => ['jpg', 'gif', 'png'],
            'initialPreviewShowDelete' => true,
            'showPreview' => true,
            'showCaption' => false,
            'showRemove' => true,
            'showUpload' => false,
            'initialPreview'=> [(!empty($model->SmallImage)) ? '<img src="'.$model->SmallImage.'" class="file-preview-image" width="64">' : ''],
            'initialPreviewConfig'=> [
                ['caption'=> $model->image,  'url'=> Url::home(true)."dictypes/deleteimg?id=".$model->id, 'key'=> 1]
            ],
        ],
        'options' => ['accept' => 'image/*'],
    ]);?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
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

    <?=$form->field($model, 'date_publish')->widget(DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose'=>true,
            'language'=>'uk',
            'readonly' => true,
            'options' => ['placeholder' => 'Enter birth date ...'],

            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true

        ]
    ]);?>

    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
