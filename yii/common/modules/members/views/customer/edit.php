<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = 'Кабінет користувача';

?>

<? Pjax::begin();?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper padding0" style="height: 684px;">
                <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <div class="tab-menu active" data-tab="personal_data"><span>Особисті дані</span></div>
                        <div class="tab-menu" data-tab="notification"><span>Сповіщення</span></div>
                        <div class="tab-menu" data-tab="change_password"><span>Змінити пароль</span></div>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <div class="tt-person master">
                            <div class="row nopadding">
                                <div class="col-sm-12">
                                    <div class="tt-person-ava" style="padding-bottom: 0px;">
                                        <img class="tt-person-img img-responsive" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/person/person.png';?>" alt="">
                                        <div class="empty-space marg-sm-b15 marg-lg-b15"></div>
                                        <div class="button type-1 size-2">Змінити фото <input type="file" class="upload_avatar" data-source="/members/customer/uploadavatar/" accept="image/x-png,image/gif,image/jpeg"></div>

                                        <div id="progress-wrp" style="margin-top:15px;">
                                            <div class="progress-bar"></div>
                                            <div class="status" style="left: 47%;top: 6px;">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tt-editable-wrapper slide-anim">
                                <div class="tt-preson-row tt-editable-click">
                                    <div class="tt-preson-row-left">
                                        <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                        <div class="tt-input-label">Ім’я</div>
                                    </div>
                                    <div class="tt-preson-row-right">
                                        <?php

                                        $member->setScenario('first_name');
                                        $form1 = ActiveForm::begin(['id' => 'edit_first_name', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute(['/members/customer/validation/', 'scenario'=>'first_name']), 'action' =>Url::toRoute(['/members/customer/savemember/', 'scenario'=>'first_name'])]); ?>
                                        <div class="tt-editable">
                                            <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->first_name?></div>
                                            <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                        </div>
                                        <div class="tt-editable-form" >
                                            <?=$form1->field($member, 'first_name')->textInput(['value'=>$member->first_name, 'class' => 'simple-input', 'placeholder' => "Ваше ім’я"])->label(false); ?>


                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-editable-wrapper slide-anim">
                                <div class="tt-preson-row tt-editable-click">
                                    <div class="tt-preson-row-left">
                                        <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="" <?=(empty($member->last_name)) ? ' style="display:none;" ' : ''; ?>>
                                        <div class="tt-input-label">Прізвище</div>
                                    </div>
                                    <div class="tt-preson-row-right">
                                        <?php

                                        $member->setScenario('last_name');
                                        $form3 = ActiveForm::begin(['id' => 'edit_last_name', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute(['/members/customer/validation/', 'scenario'=>'last_name']), 'action' =>Url::toRoute(['/members/customer/savemember/', 'scenario'=>'last_name'])]); ?>
                                        <div class="tt-editable">
                                            <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->last_name?></div>
                                            <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                        </div>
                                        <div class="tt-editable-form">
                                            <?=$form3->field($member, 'last_name')->textInput(['value'=>$member->last_name, 'validateOnSubmit' => true, 'class' => 'simple-input', 'placeholder' => "Прізвище"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-editable-wrapper slide-anim">
                                <div class="tt-preson-row tt-editable-click">
                                    <div class="tt-preson-row-left">
                                        <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                        <div class="tt-input-label">Email</div>
                                    </div>
                                    <div class="tt-preson-row-right">
                                        <?php

                                        $member->setScenario('email');
                                        $form3 = ActiveForm::begin(['id' => 'edit_email', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute(['/members/customer/validation/', 'scenario'=>'email']), 'action' =>Url::toRoute(['/members/customer/savemember/', 'scenario'=>'email'])]); ?>
                                        <div class="tt-editable">
                                            <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->email?></div>
                                            <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                        </div>
                                        <div class="tt-editable-form">
                                            <?=$form3->field($member, 'email')->textInput(['value'=>$member->email, 'class' => 'simple-input', 'placeholder' => "Email"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-editable-wrapper slide-anim">
                                <div class="tt-preson-row tt-editable-click">
                                    <div class="tt-preson-row-left">
                                        <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                        <div class="tt-input-label">Телефон</div>
                                    </div>
                                    <div class="tt-preson-row-right">
                                        <?php

                                        $member->setScenario('phone');
                                        $form7 = ActiveForm::begin(['id' => 'edit_phone', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute(['/members/customer/validation/', 'scenario'=>'phone']), 'action' =>Url::toRoute(['/members/customer/savemember/', 'scenario'=>'phone'])]); ?>
                                        <div class="tt-editable">
                                            <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->phone?></div>
                                            <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                        </div>
                                        <div class="tt-editable-form">

                                            <div class="tt-input-label"></div>
                                            <div class="tt-fadein-top phone-reg-block" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?= $form7->field($member, 'phone')->textInput(['value'=>$member->phone, 'data-value'=>$member->phone, 'type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off',   'placeholder' => "+38 (0хх) ххх - хххх", 'data-phone'=>$member->phone])->label(false); ?>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3" style="display:none;">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-phone-submit disabled" href="javascript:">Підтвердити</a>
                                                    </div>
                                                    <div class="empty-space marg-xs-b20"></div>
                                                </div>
                                            </div>
                                            <div class="tt-fadein-bottom">
                                                <div class="simple-text size-3"><span></span><span class="remove_added_file remove"> [X] </span></div>
                                                <div class="empty-space marg-lg-b15"></div>
                                                <div class="row">
                                                    <div class="col-sm-8 col-md-9">
                                                        <?= $form7->field($member, 'confirm_sms')->textInput(['class' => 'simple-input', "id"=>"confirm_sms", 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>

                                                    </div>
                                                    <div class="col-sm-4 col-md-3">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-phone-code-submit " href="javascript:">ОК</a>
                                                    </div>
                                                    <div class="empty-space marg-xs-b20"></div>
                                                </div>
                                            </div>



                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close popup-close-phone button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3 save_phone', 'name' => 'save']) ?>
                                            </div>

                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-entry" style="display: none;">
                        <div class="tt-notification">
                            <div class="tt-notification-heading">
                                <div class="tt-notification-title"></div>
                                <div class="tt-notification-check">На пошту</div>
                            </div>

<? if (sizeof($Notices)) foreach ($Notices as $val) { ?>
                            <div class="tt-notification-entry">
                                <div class="tt-notification-title simple-text size-3">
                                    <p><?=$val['name']?></p>
                                </div>
                                <div class="tt-notification-check">
<? if ($val['show_email']==1) {?>
                                    <label class="checkbox-entry" ><input type="checkbox" class="notices_action" data-name="email" data-type="<?=$val['type']?>" data-id="<?=$val['notice_id']?>" value="1" <?=($val['email']==1) ? 'checked' : ''?>><span></span></label>
<? } ?>
                                </div>
                            </div>
<? } ?>
                        </div>
                    </div>
                    <div class="tab-entry" style="display: none;">


                        <?php $form = ActiveForm::begin(['id' => 'password-reset-form', 'options' => ['class'=>'form-ajax reset-form'], 'enableAjaxValidation'=>true,  'validationUrl'=>Url::toRoute('/members/customer/resetpasswordvalidation'), 'action' =>['/members/customer/resetpassword', '#'=>'change_password']]); ?>



                        <div class="tab-entry-box pad2">


                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label"></div>
                                        <div class="tt-input-entry">
                                            <div class="simple-text size-3">
                                                <?= Alert::widget() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-space marg-lg-b20"></div>
                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Старий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password_old')->passwordInput(['class' => 'simple-input', 'tabindex' => '1', 'autocomplete'=>'off'])->label(false); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-space marg-lg-b10"></div>
                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Новий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password')->passwordInput([ 'class' => 'simple-input', 'tabindex' => '2', 'autocomplete'=>'off'])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Повторіть новий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password_repeat')->passwordInput(['class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '3'])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="tt-buttons-block text-right">
                                        <?= Html::resetButton('Відмінити', ['class' => 'button type-1 size-3 uppercase']) ?>
                                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'save']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>


<? Pjax::end();?>
<?



echo $this->registerJs("(function(){
        
    $('body').on('keyup','input.simple-input[type=\"tel\"]', function(event) {
        var number = $(this);
     
        if (number.val()!=number.data('phone')) {
            number.parent().parent().removeClass('col-md-12').addClass('col-md-9').addClass('col-sm-8').next('div').show();
        } else {
            number.parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
        }
    });

    $('.tt-editable-close').click(function(){
        $(this).closest('.tt-editable-form').find('input').val($(this).closest('form').find('.tt-editable-item').text());
    });

    $('.popup-close-phone').click(function(){

        $(this).closest('#edit_phone').find('.tt-fadein-top').show();
        $(this).closest('#edit_phone').find('.tt-fadein-bottom').hide();
        $('input.simple-input[type=\"tel\"]').parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
        $('input.simple-input[type=\"tel\"]').val($('input.simple-input[type=\"tel\"]').data('value'));
        $('input.simple-input[type=\"tel\"]').next('p').html('');
        $(\"#confirm_sms\").val('');
        $('input.simple-input[type=\"tel\"]').closest('.phone-reg-block').prev('.tt-input-label').text('').css({'color':'#5cca47'});
        $('.popup-wrapper, .popup-content').removeClass('active');
        
        return false;
    });

    $(document).on(\"click\", \".save_phone\", function(e) {
    
        if ($('input.simple-input[type=\"tel\"]').parent().parent().hasClass('col-md-12') && $(\"#confirm_sms\").val()=='') {

            $('form#edit_phone').find('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
                 $(this).closest('.tt-editable-wrapper').removeClass('opened');
            });
            $('input.simple-input[type=\"tel\"]').next('p').html('');
            $('input.simple-input[type=\"tel\"]').parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
            $('input.simple-input[type=\"tel\"]').val($('input.simple-input[type=\"tel\"]').data('value'));
            $('input.simple-input[type=\"tel\"]').data('phone', $('input.simple-input[type=\"tel\"]').data('value'));
            
        }
    });

        
        
        
})();" , \yii\web\View::POS_END );

?>
