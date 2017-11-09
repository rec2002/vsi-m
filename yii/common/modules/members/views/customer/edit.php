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
                                    <div class="button type-1 size-2">Змінити фото <input type="file" class="upload_avatar" data-source="/members/customer/uploadavatar/" accept="image/x-png,image/gif,image/jpeg"></div>

                                    <div id="progress-wrp" style="margin-top:15px;">
                                        <div class="progress-bar"></div>
                                        <div class="status" style="left: 47%;top: 6px;">0%</div>
                                    </div>
                                </div>
                                <div class="tt-person-form">
                                    <?php $form = ActiveForm::begin(['id' => 'save-customer-form',  'enableAjaxValidation'=>true, 'options' => ['class'=>'form-ajax'], 'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=personal'), 'action' =>['/members/customer/personalsave', '#'=>'personal_data']]); ?>
                                        <div class="tt-person-inputs">
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Ім’я</div>
                                                <div class="tt-input-entry">
                                                    <?= $form->field($Member, 'first_name')->textInput(['value'=>Yii::$app->user->identity->first_name, 'class' => 'simple-input', 'tabindex' => '1', 'autocomplete'=>'off'])->label(false); ?>
                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Прізвище</div>
                                                <div class="tt-input-entry">
                                                    <?= $form->field($Member, 'last_name')->textInput(['value'=>Yii::$app->user->identity->last_name, 'class' => 'simple-input', 'tabindex' => '2', 'autocomplete'=>'off'])->label(false); ?>
                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Email</div>
                                                <div class="tt-input-entry">
                                                    <?= $form->field($Member, 'email')->textInput(['value'=>Yii::$app->user->identity->email, 'class' => 'simple-input', 'tabindex' => '3', 'autocomplete'=>'off'])->label(false); ?>
                                                </div>
                                            </div>
                                            <div class="empty-space marg-xs-b5"></div>
                                            <div class="tt-input-wrapper">
                                                <div class="tt-input-label">Телефон</div>
                                                <div class="tt-input-entry">
                                                    <div class="tt-fadein-top">
                                                        <div class="row row10">
                                                            <div class="col-md-12">
                                                                <?= $form->field($Member, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38 (099) 999-9999'])->textInput(['value'=>Yii::$app->user->identity->phone, 'data-value'=>Yii::$app->user->identity->phone, 'type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '3',  'placeholder' => "+38 (0хх) ххх - хххх"])->label(false); ?>
                                                                <div class="empty-space marg-sm-b10"></div>
                                                            </div>
                                                            <div class="col-md-5" style="display: none;">
                                                                <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link tt-phone-submit" href="javascript:">Підтвердити</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tt-fadein-bottom">
                                                        <div class="simple-text size-3"></div>
                                                        <div class="empty-space marg-lg-b10"></div>
                                                        <div class="row row10">
                                                            <div class="col-md-8">
                                                                <?= $form->field($Member, 'confirm_sms')->textInput(['class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>

                                                                <div class="empty-space marg-sm-b10"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link" href="javascript:">ОК</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tt-person-btn">
                                            <?= Html::resetButton('Відмінити', ['class' => 'button type-1 uppercase']) ?>
                                            <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3 uppercase', 'name' => 'save']) ?>
                                        </div>
                                    <?php ActiveForm::end(); ?>
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
