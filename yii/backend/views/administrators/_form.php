<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Administrators */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrators-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'role')->dropDownList(['0'=>'Адміністратор', '1'=>'Модератор']) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Пароль [обв\'язкові великі, маленькі символи і цифри]')  ?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true])->label('Повторити Пароль')  ?>

    <div class="form-group">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    //beforeSubmit
    $js = "$('form#".$model->formName()."').on('beforeSubmit', function(e){
            var \$form = $(this);

            submitMySecondForm(\$form);
            
            return false;
        }).on('submit', function(e){
            e.preventDefault();
        });
     
        
    function submitMySecondForm(\$form){
console.log(\$form.attr(\"action\"));
console.log(\$form.serialize());

        alert(1);
        
$.ajax({
                type: \"POST\",
                async: false,
                url: \$form.attr(\"action\"),
                dataType: \"json\",
                data: \$form.serialize(),
                success: function(data) {

 alert(2);

                }
            });
            
      alert(3);       
            
        /*
        $.post(
            \$form.attr(\"action\"),
            \$form.serialize()
        )
            .done(function(result){
                alert(2);

            })
            .fail(function(){
                console.log(\"server error\");
                
                 alert(3);
                return false;
            });
        */    
        return false;
    }
        
        
        ";
    $this->registerJs($js);
?>
