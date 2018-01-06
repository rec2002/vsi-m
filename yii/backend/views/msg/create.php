<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


?>




        <? $form = ActiveForm::begin(['id' => 'send_msg', 'enableAjaxValidation'=>false, 'action' =>['msg/create'] ]); ?>

<?
        echo $form->field($model, 'member_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Yii::$app->db->createCommand('SELECT id, if (company!=\'\', CONCAT(\'[\', id, \'] \', company), CONCAT(\'[\', id, \'] \', first_name, \' \', last_name, \' \', surname)) as name FROM `members` ORDER BY `id`  DESC ')->queryAll(), 'id', 'name'),
            'options' => ['placeholder' => 'Вибрати користувача ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],
        ])->label('Користувач');
?>
        <?= $form->field($model, 'msg')->textarea(['rows' => 2])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Відправити'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


<?
echo $this->registerJs("(function(){


    $(document).on(\"beforeSubmit\", \"form#send_msg\", function(e) {
        e.preventDefault();


        var msg = $.trim($('#membermsg-msg').val());
        if (msg=='')  return false ;

        var form = $(this);
        jQuery.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serializeArray(),
            cache: false,
            dataType: 'json',
            async: false,
            success: function (data) {

                if (data.status==1){

                
                    location.reload();
                }
            }
        });

        return false;

    });
    
    
})();" , \yii\web\View::POS_END );
?>