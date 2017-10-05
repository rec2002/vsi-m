<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Dictcategory */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="dictcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="dictcategory-form">

        <?php $form = ActiveForm::begin([
            'id'=>$model->formName(),
            'enableAjaxValidation'=>true,
            'validationUrl'=>Url::toRoute('dictcategory/validation')
        ]); ?>

        <?= $form->field($model, 'name')->textInput(  ['maxlength' => true,  'class' => 'form-control name_tag']) ?>

        <?= $form->field($model, 'url_tag')->textInput(['maxlength' => true,  'class' => 'form-control name_tag_value']) ?>


        <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>

        <?= $form->field($model, 'types')->hiddenInput(['value'=>0])->label(false);?>
        <?= $form->field($model, 'parent')->hiddenInput(['value'=>$model->isNewRecord ?  '0' : $model->parent])->label(false); ?>
        <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>



<?php


$script = <<< JS
$(document).on("submit", "form#{$model->formName()}", function() {

   var \$form = $(this);
    $.ajax({type: "POST", async: false,  url: \$form.attr("action"),  dataType: "json", data: \$form.serialize(),
        success: function(data) {
        alert (1);
        if(data !== null){

            
            
            data = JSON.parse(JSON.stringify(data));
            
            console.log(data);
            if(data.status == 'Success'){
                $(\$form).trigger("reset");
                $(document).find('#modal').modal('hide');
                $.pjax.reload({container:'#kv-grid-adm'});
            }
            
        }   
        
        }
    });

    return false;
});
JS;
$this->registerJs($script);


?>
