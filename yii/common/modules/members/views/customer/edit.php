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
                        <div class="tab-entry-box">
                            <div class="empty-space marg-lg-b10"></div>
                            <!-- TT-PERSON -->
                            <div class="tt-person">
                                <div class="tt-person-ava">
                                    <img class="tt-person-img img-responsive" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/person/person.png';?>" alt="">
                                    <div class="empty-space marg-sm-b15 marg-lg-b15"></div>
                                    <div class="button type-1 size-2">Змінити фото <input type="file" class="upload_avatar" data-source="/members/customer/uploadavatar/" accept="image/x-png,image/gif,image/jpeg"></div>

                                    <div id="progress-wrp" style="margin-top:15px;">
                                        <div class="progress-bar"></div>
                                        <div class="status" style="left: 47%;top: 6px;">0%</div>
                                    </div>
                                </div>
                                <div class="tt-person-form">
                                    <div class="tt-editable-wrapper slide-anim">
                                        <div class="tt-preson-row tt-editable-click">
                                            <div class="tt-preson-row-left">
                                                <div class="tt-input-label">Ім’я</div>
                                            </div>
                                            <div class="tt-preson-row-right">
                                                <?php

                                                $member->setScenario('first_name');
                                                $form1 = ActiveForm::begin(['id' => 'edit_first_name', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=first_name'), 'action' =>['/members/member/savemember/?scenario=first_name']]); ?>
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















                                        <div class="tt-person-inputs">
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Ім’я</div>
                                                <div class="tt-input-entry">




                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Прізвище</div>
                                                <div class="tt-input-entry">
                                                    Прізвище
                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Email</div>
                                                <div class="tt-input-entry">
                                                    Email
                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Телефон</div>
                                                <div class="tt-input-entry">

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <div class="empty-space marg-lg-b15"></div>
                        </div>
                    </div>
                    <div class="tab-entry" style="display: none;">
                        <div class="tt-notification">
                            <div class="tt-notification-heading">
                                <div class="tt-notification-title"></div>
                                <div class="tt-notification-check">Пошта</div>
                                <div class="tt-notification-check">СМС</div>
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
                                <div class="tt-notification-check">
<? if ($val['show_sms']==1) {?>
                                    <label class="checkbox-entry"><input type="checkbox"  class="notices_action" data-name="sms" data-type="<?=$val['type']?>" data-id="<?=$val['notice_id']?>" value="1" <?=($val['sms']==1) ? 'checked' : ''?>><span></span></label>
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
        
        
        if (number.val()!=number.data('value')) {
        
        
            number.parent().parent().removeClass('col-md-12').addClass('col-md-7');
            number.parent().parent().next().show();

        } else {
            number.parent().parent().removeClass('col-md-7').addClass('col-md-12');
            number.parent().parent().next().hide();
        }

		
    });

        
        
        
})();" , \yii\web\View::POS_END );

?>
