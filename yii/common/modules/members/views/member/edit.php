<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = 'Кабінет користувача';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
            <div class="tabs-block style-1">
                <div class="tab-nav">
                    <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/'])?>"><span>Особисті дані</span></a>
                    <a class="tab-menu redirect" href="professionals-profile-price.html"><span>Послуги та ціни</span></a>
                    <a class="tab-menu redirect" href="professionals-profile-project.html"><span>Виконані проекти</span></a>
                    <a class="tab-menu redirect" href="professionals-profile-password.html"><span>Змінити пароль</span></a>
                    <a class="tab-menu redirect" href="professionals-profile-notification.html"><span>Сповіщення</span></a>
                    <a class="tab-menu redirect" href="professionals-profile-orders.html"><span>Доступ до замовлень</span></a>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">Вільний для роботи</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <div class="simple-select tt-select-swither">
                                                <div class="SumoSelect sumo_title" tabindex="0"><select name="title" class="SumoUnder" tabindex="-1">
                                                        <option value="Вільний для роботи">Вільний для роботи</option>
                                                        <option value="Зайнятий до">Зайнятий до</option>
                                                    </select><p class="CaptionCont SelectBox" title=" Вільний для роботи"><span> Вільний для роботи</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt selected"><label>Вільний для роботи</label></li><li class="opt"><label>Зайнятий до</label></li></ul></div></div>
                                            </div>
                                            <div class="tt-select-swither-content">
                                                <div class="tt-select-swither-item" data-rel="Вільний для роботи">

                                                </div>
                                                <div class="tt-select-swither-item" data-rel="Зайнятий до">
                                                    <div class="simple-input-icon">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        <input class="simple-input simple-datapicker hasDatepicker" data-min-date="0" placeholder="Виберіть дату" id="dp1509249920388" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=Yii::$app->user->identity->first_name?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <?php $form = ActiveForm::begin(['id' => 'edit_first_name', 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation'), 'action' =>['/members/member']]); ?>
                                            <?=$form->field($member, 'first_name')->textInput(['value'=>Yii::$app->user->identity->first_name, 'class' => 'simple-input', 'placeholder' => "Ваше ім’я"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-editable-wrapper slide-anim">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">По батькові</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=Yii::$app->user->identity->surname?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <?php $form = ActiveForm::begin(['id' => 'edit_last_name', 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation'), 'action' =>['/members/member']]); ?>
                                        <?=$form->field($member, 'surname')->textInput(['value'=>Yii::$app->user->identity->surname, 'class' => 'simple-input', 'placeholder' => "По батькові"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title"><?=Yii::$app->user->identity->last_name?></div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <?php $form = ActiveForm::begin(['id' => 'edit_last_name', 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation'), 'action' =>['/members/member']]); ?>
                                        <?=$form->field($member, 'last_name')->textInput(['value'=>Yii::$app->user->identity->last_name, 'class' => 'simple-input', 'placeholder' => "Прізвище"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">+38 (067) 555-4326</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <div class="tt-fadein-top">
                                                <div class="row">
                                                    <div class="col-sm-8 col-md-9">
                                                        <input class="simple-input" name="title" required="" placeholder="+38 (ххх) ххх - хх - хх" value="+38 (067) 555-4326" type="tel">
                                                    </div>
                                                    <div class="col-sm-4 col-md-3">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link tt-phone-submit" href="#">Підтвердити</a><div class="empty-space marg-xs-b20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-fadein-bottom">
                                                <div class="simple-text size-3"></div>
                                                <div class="empty-space marg-lg-b15"></div>
                                                <div class="row">
                                                    <div class="col-sm-8 col-md-9">
                                                        <input class="simple-input" required="" placeholder="код отриманий по смс" type="text">
                                                        <div class="empty-space marg-xs-b20"></div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-3">
                                                        <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link" href="#">ОК</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">bohdan.red@gmail.com</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <input class="simple-input" name="title" value="bohdan.red@gmail.com" type="text">
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">Львів, Львівська обл.</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <input id="tt-google-single-autocomplete" class="simple-input" name="title" value="Львів, Львівська обл." placeholder="Введіть місцезнаходження" autocomplete="off" type="text">
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
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
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">Приватний майстер</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <div class="simple-select tt-select-swither">
                                                <div class="SumoSelect sumo_title" tabindex="0"><select name="title" class="SumoUnder" tabindex="-1">
                                                        <option value="1" selected="">Приватний майстер</option>
                                                        <option value="2">Бригада</option>
                                                        <option value="3">Компанія</option>
                                                    </select><p class="CaptionCont SelectBox" title=" Приватний майстер"><span> Приватний майстер</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt selected"><label>Приватний майстер</label></li><li class="opt"><label>Бригада</label></li><li class="opt"><label>Компанія</label></li></ul></div></div>
                                            </div>
                                            <div class="tt-select-swither-content">
                                                <div class="tt-select-swither-item" data-rel="1">

                                                </div>
                                                <div class="tt-select-swither-item" data-rel="2">
                                                    <div class="simple-select">
                                                        <div class="SumoSelect" tabindex="0"><select class="SumoUnder" tabindex="-1">
                                                                <option value="">до 10 чоловік</option>
                                                                <option value="">10-30 чоловік</option>
                                                                <option value="">від 30 чоловік</option>
                                                            </select><p class="CaptionCont SelectBox" title=" до 10 чоловік"><span> до 10 чоловік</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt selected"><label>до 10 чоловік</label></li><li class="opt"><label>10-30 чоловік</label></li><li class="opt"><label>від 30 чоловік</label></li></ul></div></div>
                                                    </div>
                                                </div>
                                                <div class="tt-select-swither-item" data-rel="3">
                                                    <input class="simple-input" required="" placeholder="Назва компанії" type="text">
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-editable-wrapper slide-anim">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYDhmhAAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">Назва компанії</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <div class="tt-editable">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">Назва не вказана</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <input class="simple-input" name="title" placeholder="Назва не вказана" type="text">
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-editable-wrapper slide-anim opened">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYDhmhAAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">Про себе</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <div class="tt-editable" style="display: none;">
                                        <div class="simple-text size-3 tt-editable-item" data-rel="title">Nam erat libero, mollis vel lectus vitae, gravida dignissim dolor. Donec a ultricies diam, a porta purus. Vivamus porttitor, est at elementum vestibulum, neque ex tincidunt enim, nec volutpat dolor lacus pulvinar est. Nullam suscipit commodo nisl nec blandit. Integer et velit ac massa commodo egestas ec a ultricies diam, a porta purus. Amus porttitor, est at elementum vestibulum, neque ex tincidunt enim, nec volutpat dolor lacus pulvinar est.</div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form" style="display: block;">
                                        <form>
                                            <div class="simple-input-max">
                                                <textarea class="simple-input height-2" name="title" maxlength="800">Nam erat libero, mollis vel lectus vitae, gravida dignissim dolor. Donec a ultricies diam, a porta purus. Vivamus porttitor, est at elementum vestibulum, neque ex tincidunt enim, nec volutpat dolor lacus pulvinar est. Nullam suscipit commodo nisl nec blandit. Integer et velit ac massa commodo egestas ec a ultricies diam, a porta purus. Amus porttitor, est at elementum vestibulum, neque ex tincidunt enim, nec volutpat dolor lacus pulvinar est.</textarea>
                                                <div class="simple-text size-2 simple-input-max-count">Залишилося 354 символів</div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-editable-wrapper slide-anim opened">
                            <div class="tt-preson-row tt-editable-click">
                                <div class="tt-preson-row-left">
                                    <img class="tt-preson-row-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAKBAMAAAByAqLJAAAAMFBMVEUAAABXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEBXzEDAhUHfAAAAD3RSTlMAbkZd32VUThXqu7CrgiPhPtpNAAAAO0lEQVQI12MAA2EwyfgfTMV/ApHM/xUYdjEw5H9nYPA/wP4/gYGh5a/+Z6AEx/z/ASAF7z+CVTMJAAkAzrkOpzxe/mQAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-input-label">Виїзд на об`єкти</div>
                                </div>
                                <div class="tt-preson-row-right">
                                    <div class="tt-editable" style="display: none;">
                                        <div class="simple-text size-3 bold-style-2 tt-editable-item" data-rel="title">
                                            <p><b>Волинська</b></p>
                                            <p><b>Львівська</b></p>
                                            <p><b>Івано-Франківська</b></p>
                                            <p><b>Закарпатська</b></p>
                                        </div>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form has-checkbox" style="display: block;">
                                        <form>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Вінницька</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Волинська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Дніпропетровська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Донецька</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Житомирська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Закарпатська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Запорізька</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Івано-Франківська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Київська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Кіровоградська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Луганська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Львівська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Миколаївська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Одеська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Полтавська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Рівненська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Сумська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Тернопільська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Харківська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Херсонська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Хмельницька</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Черкаська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Чернівецька</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <label class="checkbox-entry nowrap">
                                                <input type="checkbox"><span><b>Чернігівська</b></span>
                                            </label>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
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
