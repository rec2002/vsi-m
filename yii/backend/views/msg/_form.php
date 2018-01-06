<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\members\models\MemberMsg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-msg-form">

    <div class="tt-messages-content">
        <div class="tt-messages-entry clearfix">
            <div class="tt-message-area">
            <div class="tt-messages-text" style="height: 350px;width: 100%">
                <? if (sizeof($messages)) foreach ($messages as $val) {

                    switch($val['type']) {
                        case 'who':
                            echo '<div class="tt-messages-item other simple-text"><p>'.nl2br($val['msg']).'</p></div>';
                            break;
                        case 'whom':
                            echo '<div class="tt-messages-item simple-text"><p>'.nl2br($val['msg']).'</p></div>';
                            break;
                        case 'system':
                            echo '<div class="tt-messages-inform simple-text size-2 text-center"><p>'.$val['msg'].'</p></div>';
                            break;
                        case 'date':
                            echo '<h5 class="h5 text-center">'.$val['msg'].'</h5>';
                            break;
                    }

                } ?>            </div>

        </div>
    </div>


        <? $form = ActiveForm::begin(['id' => 'send_msg', 'enableAjaxValidation'=>false, 'action' =>['msg/savemsg', 'id'=>Yii::$app->request->get('id')] ]); ?>

    <?= $form->field($model, 'msg')->textarea(['rows' => 2])->error(false)->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Відправити'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?

$this->registerCss("
.tt-messages { height: 600px; font-size: 0; background: #fff; border: 1px solid #e5e7eb; border-radius: 3px; -webkit-box-shadow: -1px 2px 15px 0px rgba(0, 0, 0, 0.06); box-shadow: -1px 2px 15px 0px rgba(0, 0, 0, 0.06); }
.tt-messages-content { display: inline-block; width: 100%; height: 100%; vertical-align: top; }
.tt-messages-user.active { background: #2d3642; }
.tt-messages-user.active .tt-messages-name, .tt-messages-user.active .simple-text { color: #fff; }
.tt-messages-chose { height: 100%; text-align: center; }
.tt-messages-chose:after { content: ''; display: inline-block; width: 0; height: 100%; vertical-align: middle; }
.tt-messages-chose .simple-text { display: inline-block; vertical-align: middle; }
.tt-messages-entry { position: relative; }
.tt-messages-head { height: 120px; padding: 20px; border-bottom: 1px solid #e5e7eb; }
.tt-messages-head:after { content: ''; display: block; clear: both; }
.tt-messages-ava { float: left; }
.tt-messages-text { height: 400px; background: #f9f9f9; overflow: auto; padding: 25px; }
.tt-messages-text h5 { margin-bottom: 20px; }
.tt-messages-text h5 a { color: #3b5997; }
.tt-messages-text h5 a:hover { color: #ff8a00; }
.tt-messages-item { width: 85%; background: #fff; padding: 10px; margin-bottom: 20px; border: 1px solid #e5e7eb; }
.tt-messages-item.other { background: #ededed; margin-left: auto; }
.tt-messages-inform { margin-bottom: 20px; }
.tt-message-area { position: relative; }
.tt-message-area .simple-input { height: 79px; padding-right: 150px; }
.tt-message-area .button { position: absolute; top: 50%; right: 15px; -webkit-transform: translateY(-50%); transform: translateY(-50%); }
.tt-messages-offer { display: table; width: 100%; }
.tt-messages-offer-row { display: table-row; }
.tt-messages-offer-cell { display: table-cell; vertical-align: middle; padding: 3px 0; }
.tt-messages-offer-cell:first-child { font-weight: 700; width: 30%; }
.tt-messages-back { display: none; }
.tt-messages-entry.support .tt-messages-head-info { display: table-cell; width: 9999px; height: 80px; vertical-align: middle; padding-left: 30px; }
 }");

?>
<?
echo $this->registerJs("(function(){

    setTimeout(function(){ $(\".tt-messages-text\").animate({ scrollTop: $('.tt-messages-text').prop(\"scrollHeight\")}, 100); }, 500);

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
                    $('#membermsg-msg').val('');
                    $('.tt-messages-text').append('<div class=\"tt-messages-item other simple-text\"><p>'+data.msg+'</p></div>');
                    $(\".tt-messages-text\").animate({ scrollTop: $('.tt-messages-text').prop(\"scrollHeight\")}, 500);
                }
            }
        });

        return false;

    });
    
    
})();" , \yii\web\View::POS_END );
?>