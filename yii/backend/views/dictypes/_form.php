<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Dictcategory;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictypes */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .kv-file-upload, {visibility: hidden;}
    .krajee-default.file-preview-frame .kv-file-content {   line-height: 160px;}

</style>
<div class="dictypes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,  'class' => 'form-control name_tag' ]) ?>

    <?= $form->field($model, 'url_tag')->textInput(['maxlength' => true,  'class' => 'form-control name_tag_value']) ?>

    <?=$form->field($model, 'parent')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dictcategory::findBySql('SELECT id, name FROM dict_category WHERE active=1 AND parent=0 AND types=0 ORDER BY priority ASC ')->all(), 'id', 'name'),
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '--Вибрати категорію--'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>

    <?=$form->field($model, 'file')->widget(kartik\file\FileInput::className(), [
        'name' => 'image',
        'pluginOptions' => [
             'allowedFileExtensions' => ['jpg', 'gif', 'png'],
             'initialPreviewShowDelete' => true,
             'showPreview' => true,
             'showCaption' => false,
             'showRemove' => true,
             'showUpload' => false,

          // 'browseClass' => 'btn btn-primary btn-block',
          //   'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',

            'initialPreview'=> [(!empty($model->SmallImage)) ? '<img src="'.$model->SmallImage.'" class="file-preview-image" width="64">' : ''],
            'initialPreviewConfig'=> [
            ['caption'=> $model->image,  'url'=> Url::home(true)."dictypes/deleteimg?id=".$model->id, 'key'=> 1]

        ],
        ],

        'options' => ['accept' => 'image/*'],
    ]);?>

    <?= $form->field($model, 'types')->hiddenInput(['value'=>1])->label(false);?>

    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>

    <?= $form->field($model, 'on_main')->widget(kartik\switchinput\SwitchInput::classname(), [
        'pluginOptions'=>[
            'onText'=>'TAK',
            'offText'=>'HI'
        ]])->label('Вивід на головній сторінці');

?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
