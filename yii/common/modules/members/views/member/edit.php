<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;
use kartik\select2\Select2;
use common\components\MemberHelper;

$this->title = 'Кабінет користувача';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
            <div class="tabs-block style-1">
                <div class="tab-nav">
                    <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/'])?>"><span>Особисті дані</span></a>
                    <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                    <a class="tab-menu redirect" href="<?=Url::to(['/members/portfolio/list'])?>"><span>Виконані проекти</span></a>
                    <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                    <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                    <a class="tab-menu redirect" href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;"><span>Доступ до замовлень</span></a>
                </div>
                <div class="tab-entry" style="display: block;">
                    <div class="tt-person master">
                        <div class="row nopadding">
                            <div class="col-sm-6">
                                <div class="tt-person-ava">
                                    <div class="tt-person-img">
                                        <div class="tt-heading-check unchecked tt-tooltip" data-tooltip="Документи та достовірність внесеної інформації наразі не перевірено"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAAPFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHbdgYzgAAAAE3RSTlMA4e+tLSMVCtS+pFNKP/jJb2dex1uRwAAAAFVJREFUGBntwUcOgDAQBMFZZ3Lo//8VxN32FSGq9PuEOalnp6jjAK+2E0ZVJD0m8KoYXdBtAq8aw0VphkFVybAcYFBDdJhjU1NYoWS1LVhWzxL1e7ELQ3wCozk2KIMAAAAASUVORK5CYII=" alt=""></div>
                                        <img class="tt-person-img img-responsive" style="margin: 0;" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/person/person.png';?>" alt="">
                                    </div>

                                    <div class="button type-1 size-2">Змінити фото <input type="file" class="upload_avatar" data-source="/members/member/uploadavatar/" accept="image/x-png,image/gif,image/jpeg"></div>

                                    <div id="progress-wrp" style="margin-top:15px;">
                                        <div class="progress-bar"></div>
                                        <div class="status" style="left: 47%;top: 6px;">0%</div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="tt-person-documents">
                                    <a class="button type-1 color-5 open-popup" data-rel="1" href="#">Підтвердити профіль</a>
                                    <div class="tt-person-documents-entry">
                                        <div class="simple-text size-3 text-center">
                                            <p>Жодного документа наразі не завантажено</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-editable-wrapper slide-anim">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">Робочий статус</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('busy_to');
                                    $form0 = ActiveForm::begin(['id' => 'edit_busy_to', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>false, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=busy_to'), 'action' =>['/members/member/savemember/?scenario=busy_to']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=(empty($member->busy_to)) ? 'Вільний для роботи' : 'Зайнятий до '.date('d.m.Y', (strtotime($member->busy_to))); ?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form" >


                                        <div class="simple-select tt-select-swither">
                                            <?

                                                $member->busy = (!empty($member->busy_to)) ? 1 : 0;


                                                echo $form0->field($member, 'busy')->widget(Select2::classname(), [
                                                    'data' => MemberHelper::BUSY,
                                                    'language' => 'uk',
                                                    'hideSearch' => true,
                                                    'size' => Select2::LARGE,
                                                    'theme' => Select2::THEME_BOOTSTRAP,
                                                    'pluginOptions' => [
                                                        'allowClear' => false,
                                                        'tabindex' => '3'
                                                    ],
                                                ])->label(false); ?>
                                        </div>
                                        <div class="tt-select-swither-content">
                                            <div class="tt-select-swither-item" data-rel="Вільний для роботи">

                                            </div>
                                            <div class="tt-select-swither-item" data-rel="1" <?=(!empty($member->busy_to)) ? ' style="display:block;" ' : '';  ?>>
                                                <div class="simple-input-icon">
                                                    <img style="top: 28px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                    <?= $form0->field($member, 'busy_to')->widget(\yii\widgets\MaskedInput::className(), [
                                                        'mask' => '99.99.9999',
                                                        'options' => [
                                                            'placeholder' => 'Виберіть дату'
                                                        ]

                                                    ])->textInput(['value'=>(!empty($member->busy_to)) ? date('d.m.Y', (strtotime($member->busy_to))) : '',  'class' => 'simple-input simple-datapicker', 'autocomplete'=>'off',  'data-min-date'=>'0',  'placeholder' => "Виберіть дату", 'style' => 'margin-bottom: 0px;'])->label(false); ?>
                                                </div>
                                            </div>
                                        </div>
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
                        <div class="tt-editable-wrapper slide-anim">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" <?=(empty($member->surname)) ? ' style="display:none;" ' : ''; ?> src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">По батькові</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('surname');
                                    $form = ActiveForm::begin(['id' => 'edit_surname',  'options' => ['class'=>'form-edit-ajax'],  'enableAjaxValidation'=>true, 'validateOnSubmit' => true, 'validateOnType' => true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=surname'), 'action' =>['/members/member/savemember/?scenario=surname']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->surname?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="" >
                                    </div>
                                    <div class="tt-editable-form">
                                        <?=$form->field($member, 'surname')->textInput(['value'=>$member->surname, 'class' => 'simple-input', 'placeholder' => "По батькові"])->label(false); ?>
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
                                    <div class="tt-input-label">Прізвище</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('last_name');
                                    $form3 = ActiveForm::begin(['id' => 'edit_last_name', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=last_name'), 'action' =>['/members/member/savemember/?scenario=last_name']]); ?>
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
                                    <div class="tt-input-label">Телефон</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('phone');
                                    $form7 = ActiveForm::begin(['id' => 'edit_phone', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=phone'), 'action' =>['/members/member/savemember/?scenario=phone']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->phone?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">

                                            <div class="tt-fadein-top">
                                                <div class="row">
                                                    <div class="col-sm-8 col-md-12">
                                                        <?= $form7->field($member, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38 (099) 999-9999'])->textInput(['value'=>'', 'data-value'=>$member->phone, 'type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off',   'placeholder' => "+38 (0хх) ххх - хххх"])->label(false); ?>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3"  style="display: none;">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link tt-phone-submit" href="javascript:">Підтвердити</a>
                                                        <div class="empty-space marg-xs-b20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-fadein-bottom">
                                                <div class="simple-text size-3"></div>
                                                <div class="empty-space marg-lg-b15"></div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <?= $form7->field($member, 'confirm_sms')->textInput(['class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>
                                                        <div class="empty-space marg-xs-b20"></div>
                                                    </div>
                                                    <!--<div class="col-sm-4 col-md-3">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link" href="javascript:">ОК</a>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close popup-close-phone button type-1']) ?>
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
                                    $form3 = ActiveForm::begin(['id' => 'edit_email', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=email'), 'action' =>['/members/member/savemember/?scenario=email']]); ?>
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
                                    <div class="tt-input-label">Основне місто</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('place');
                                    $form4 = ActiveForm::begin(['id' => 'edit_place', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>false, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=place'), 'action' =>['/members/member/savemember/?scenario=place']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=$member->place?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <?=$form4->field($member, 'place')->textInput(['class' => 'simple-input', "id"=>"tt-google-single-autocomplete-only", 'autocomplete'=>'off', 'placeholder' => "Введіть місце знаходження"])->label(false); ?>
                                        <?=$form4->field($member, 'region')->hiddenInput(['id'=>'tt-google-single-autocomplete-region'])->label(false); ?>
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
                                    <div class="tt-input-label">Форма роботи</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php

                                    $member->setScenario('forma');
                                    $form6 = ActiveForm::begin(['id' => 'edit_forma', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=forma'), 'action' =>['/members/member/savemember/?scenario=forma']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=MemberHelper::FORMA[$member->forma]?><?=($member->forma==2) ? ' / '.MemberHelper::BRYGADA[$member->brygada] : ''?><?=($member->forma==3) ? ' / '.$member->company : ''?>
                                        </div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                            <div class="simple-select tt-select-swither">
                                            <?


                                                echo $form6->field($member, 'forma')->widget(Select2::classname(), [
                                                    'data' => MemberHelper::FORMA,
                                                    'language' => 'uk',
                                                    'hideSearch' => true,
                                                    'size' => Select2::LARGE,
                                                    'theme' => Select2::THEME_BOOTSTRAP,
                                                    'options' => ['placeholder' => 'Вибрати форму роботи'],
                                                    'pluginOptions' => [
                                                        'allowClear' => false
                                                    ],
                                                ]); ?>
                                            </div>
                                            <div class="tt-select-swither-content">
                                                <div class="tt-select-swither-item" data-rel="1" <?=($member->forma==1) ? 'style="display:block;"' : '' ?> ></div>
                                                <div class="tt-select-swither-item" data-rel="2" <?=($member->forma==2) ? 'style="display:block;"' : '' ?>>
                                                    <div class="simple-select">
                                                    <?
                                                       echo $form6->field($member, 'brygada')->widget(Select2::classname(), [
                                                            'data' => MemberHelper::BRYGADA,
                                                            'language' => 'uk',
                                                            'hideSearch' => true,
                                                            'size' => Select2::LARGE,
                                                            'theme' => Select2::THEME_BOOTSTRAP,
                                                            'pluginOptions' => [
                                                                'allowClear' => false
                                                            ],
                                                        ]); ?>
                                                    </div>
                                                </div>
                                                <div class="tt-select-swither-item" data-rel="3" <?=($member->forma==3) ? 'style="display:block;"' : '' ?>>
                                                    <?= $form6->field($member, 'company')->textInput(['value'=>$member->company, 'class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Назва компанії"])->label(false); ?>
                                                </div>
                                            </div>
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
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYDhmhAAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" <?=(empty($member->about)) ? ' style="display:none;" ' : ''; ?> alt="">
                                    <div class="tt-input-label">Про себе</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php
                                    $member->setScenario('about');
                                    $form4 = ActiveForm::begin(['id' => 'edit_about', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=about'), 'action' =>['/members/member/savemember/?scenario=about']]); ?>
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=nl2br($member->about)?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <div class="simple-input-max">
                                            <?= $form4->field($member, 'about')->textarea(['value'=>$member->about, 'class' => 'simple-input height-2', 'maxlength'=>'800', 'placeholder' => "Про себе", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>
                                            <div class="simple-text size-2 simple-input-max-count">Залишилося 800 символів</div>
                                        </div>
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
                                    <div class="tt-input-label">Виїзд на об`єкти</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <?php


                                    $member->setScenario('regions');
                                    $form5 = ActiveForm::begin(['id' => 'edit_regions', 'options' => ['class'=>'form-edit-ajax'],
                                        'enableAjaxValidation' => false,
                                        'enableClientValidation' => true,
                                        'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=regions'), 'action' =>['/members/member/savemember/?scenario=regions']]); ?>

                                    <div class="tt-editable">
                                        <div class="simple-text size-3 bold-style-2 tt-editable-item" data-rel="title">
<?  $regions = Yii::$app->db->createCommand("SELECT id, name_short  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();?>
<? foreach ($regions as $val) if (in_array($val['id'], $member->regions)) { ?><p><b><?=$val['name_short']?></b></p><? } ?>
                                        </div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form has-checkbox">
<?

    $regions_arr=array();
    if (sizeof($regions)) { foreach ($regions as $val) { $regions_arr[$val['id']] = $val['name_short']; }}


echo  $form5->field($member, 'regions')->checkboxList($regions_arr, [
    'item' => function($index, $label, $name, $checked, $value) {
        if ($checked==1) $checked = 'checked';
        return "<label class=\"checkbox-entry nowrap\"><input type=\"checkbox\" class=\"checklist\"  {$checked} name=\"{$name}\" value=\"{$value}\"><span><b>{$label}</b></span></label><div class=\"empty-space marg-lg-b15\"></div>";

    }
])->label(false);
?>

                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
        </div>
        <div class="tt-devider"></div>
    </div>


<?

$gpJsLink= 'http://maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

echo $this->registerJs("(function(){
        $('body').on('keyup','input.simple-input[type=\"tel\"]', function(event) {
        var number = $(this);
        
        if (number.val()!=number.data('value')) {
            number.parent().parent().removeClass('col-md-12').addClass('col-md-9');
            number.parent().parent().next().show();

        } else {
            number.parent().parent().removeClass('col-md-9').addClass('col-md-12');
            number.parent().parent().next().hide();
        }

		
    });

    $('.popup-close-phone').click(function(){

        $(this).closest('#edit_phone').find('.tt-fadein-top').show();
        $(this).closest('#edit_phone').find('.tt-fadein-bottom').hide();
        
        $('input#memberedit-phone').val($('input#memberedit-phone').data('value'));		
        $('input#memberedit-confirm_sms').val('');
    
        $('.popup-wrapper, .popup-content').removeClass('active');
        return false;
    });
        
        
        
})();" , \yii\web\View::POS_END );

echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);

?>

