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
