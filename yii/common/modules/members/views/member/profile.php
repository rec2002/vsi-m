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

    <!-- TT-HEADING -->
    <div class="tt-heading editable background-block" style="background-image:url(/img/bg/bg_3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <ul class="tt-breadcrumbs">
                        <li><a href="/">Головна</a></li>
                        <li><a href="<?=Url::to(['/members/member'])?>">Особисті дані</a></li>
                    </ul>
                    <div class="empty-space marg-xs-b20"></div>
                </div>
                <div class="col-sm-5">
                    <div class="tt-heading-preview">
                        <a href="professionals-detail-preview.html" class="button type-1 color-2">Як мене бачать замовники</a>
                    </div>
                </div>
            </div>
            <div class="tt-heading-user clearfix">
                <div class="tt-heading-img">
                    <img class="img-responsive" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/person/person.png';?>" alt="">
                </div>
                <div class="tt-heading-user-content">
                    <div class="tt-heading-status">зараз на сайті</div>
                    <div class="tt-dropdown style-2">
                        <a class="tt-dropdown-link open-popup" data-rel="21" href="javascript:"><span class="tt-heading-state <?=(!empty($member->busy_to) ? 'red' : ''); ?>"><?=(empty($member->busy_to)) ? 'Вільний для роботи' : 'Зайнятий до '.date('d.m.Y', (strtotime($member->busy_to))); ?></span><span class="tt-dropdown-icon"><i></i></span></a>
                        <!--<div class="tt-dropdown-entry">
                            <div class="tt-dropdown-overlay"><span></span></div>
                            <div class="tt-dropdown-close button-close small"></div>
                            <ul>
                                <li><a href="#">Вільний для роботи</a></li>
                                <li><a class="open-popup" data-rel="21" href="#">Занятий до</a></li>
                            </ul>
                        </div>-->
                    </div>

                    <h3 class="tt-heading-title h3 light">24/7 Electrical Company <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="15" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIXRSTlMAJG4QC5yml4RdCHdPHgX5YlhRSsjDubCPeWtkRUQ1LhVEw5mLAAAAXElEQVQI103KVw6AIBAA0V0UpSiC2Pv9T6kmwDJ/LxmgjgeypOBIurRU5J1b5hsRxBozajZhUA8LOm2SaizrIp6/qiDpc7XdKUjg7nUjGa7UMH+KLxe2hESJClIvbhADi7p4sv0AAAAASUVORK5CYII=" alt="">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                        </a>
                    </h3>
                    <div class="tt-heading-desc simple-text size-2">
                        <p><span id="profile_forma"><?=($member->forma!=3) ? MemberHelper::FORMA[$member->forma] : ''?><?=($member->forma==2) ? ' / '.MemberHelper::BRYGADA[$member->brygada] : ''?><?=($member->forma==3) ? ' Юридична особа ' : ''?></span> <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="16" href="#">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIXRSTlMAJG4QC5yml4RdCHdPHgX5YlhRSsjDubCPeWtkRUQ1LhVEw5mLAAAAXElEQVQI103KVw6AIBAA0V0UpSiC2Pv9T6kmwDJ/LxmgjgeypOBIurRU5J1b5hsRxBozajZhUA8LOm2SaizrIp6/qiDpc7XdKUjg7nUjGa7UMH+KLxe2hESJClIvbhADi7p4sv0AAAAASUVORK5CYII=" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                            </a>
                        </p>
                    </div>
                    <div class="tt-heading-reliability">
                        <div class="tt-heading-rating">
                            <a class="tt-vote active" href="#">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon like grey"></i>
                                        <i class="tt-icon like green"></i>
                                    </span>
                                <span class="tt-vote-count">0</span>
                            </a>
                            <a class="tt-vote dislike" href="#">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon dislike grey"></i>
                                        <i class="tt-icon dislike red"></i>
                                    </span>
                                <span class="tt-vote-count">0</span>
                            </a>
                        </div>
                        <div class="tt-heading-duration simple-text size-2">
                            <p>На сайті <b><time class="timeago" datetime="<?=$member->created_at?>"></time></b></p>
                        </div>
                    </div>
                    <div class="tt-underheading-table editable">
                        <div class="tt-underheading-price">
                            <div class="tt-underheading-price-entry">
                                <div class="simple-text size-3">
                                    <p>
                                        Мінімальна вартість замовлення <b id="budget_min"><?=($member->budget_min>0) ? $member->budget_min.' грн.' : ' (не вказано)'?></b>
                                        <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="20" href="#">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAUVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////8IN+deAAAAG3RSTlMADSRuBpyml4Rdd08e+cZiWFFKRDG5sI95ZBUTkji5AAAAXElEQVQI103OSw6AIAxFUSxFKCgg4Hf/CxUTsLzZSe7gCV5+xDAyCljFErJvFWRypkk69Fbu0LSJE6LFXxomPfXy09xEadSyZsMSsVyShQrRH1W9VSZUdRIgX30BLq0C2VB3RkwAAAAASUVORK5CYII=" alt="">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tt-underheading-phone">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAUCAMAAACK2/weAAAARVBMVEUAAACqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7ZxyU2/AAAAF3RSTlMA6heZq1Xvig313LqimoF60W5p42ssBC1PkxoAAAB6SURBVBjTrY9JDsMwDAPJKJa8xU6c5f9P7cEKCvTcuQ1EQiBiUzLveya1RRxqIXSRHoLpgUoA13leAFhhOt7rUENL325qEN6Lc1OwMcKJ3CBcXl0o/9SfR5bK6pRkrrW6znDvHq58AJQC4GGd88MYYc6PTUnmTFJb/AA54QVJiz4xVAAAAABJRU5ErkJggg==" alt="">
                            <div class="tt-underheading-item">
                                <a href="tel:0675552363">(067) 555-23-63</a>
                                <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="17" href="#">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAUVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////8IN+deAAAAG3RSTlMADSRuBpyml4Rdd08e+cZiWFFKRDG5sI95ZBUTkji5AAAAXElEQVQI103OSw6AIAxFUSxFKCgg4Hf/CxUTsLzZSe7gCV5+xDAyCljFErJvFWRypkk69Fbu0LSJE6LFXxomPfXy09xEadSyZsMSsVyShQrRH1W9VSZUdRIgX30BLq0C2VB3RkwAAAAASUVORK5CYII=" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tt-bg-grey">
        <div class="tt-devider"></div>
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b40"></div>

            <div class="row">

                <div class="col-md-9 col-md-push-3">
                    <div class="tabs-block style-1">
                        <div class="tab-nav">
                            <div class="tab-menu active"><span>Інформація</span></div>
                            <div class="tab-menu"><span>Виконані проекти</span></div>
                            <div class="tab-menu"><span>Відгуки <span>(20)</span></span></div>
                        </div>

                        <div class="tab-entry" style="display: block;">
                            <div class="tab-entry-box">
                                <div class="tt-editable-wrapper fade-anim">
                                    <h5 class="tt-editable-title h5">Інформація для довідки
                                        <a class="tt-editable-btn tt-editable-click tt-icon-entry tt-icon-hover">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                        </a>
                                    </h5>
                                    <div class="empty-space marg-lg-b15"></div>
                                    <div class="tt-editable">
                                        <div class="tt-editable-item simple-text size-3" data-rel="title"><?=nl2br($member->about, false)?></div>


                                    </div>
                                    <div class="tt-editable-form">
                                        <?php $form4 = ActiveForm::begin(['id' => 'edit_about', 'options' => ['class'=>'form-edit-ajax profile'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=about'), 'action' =>['/members/member/savemember/?scenario=about']]); ?>
                                            <div class="simple-input-max">
                                                <?= $form4->field($member, 'about')->textarea(['value'=>$member->about, 'class' => 'simple-input height-2', 'maxlength'=>'800', 'placeholder' => "Про себе", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>
                                                <div class="simple-text size-2 simple-input-max-count">Залишилося 800 символів</div>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                                <div class="empty-space marg-sm-b30 marg-lg-b45"></div>
                                <div class="tab-entry-box-devider"></div>
                                <div class="empty-space marg-sm-b30 marg-lg-b40"></div>
                                <div class="tt-editable-wrapper fade-anim">
                                    <div class="tt-editable">
                                        <h5 class="tt-editable-title h5 bold">Ціни та послуги

                                            <a class="tt-editable-btn tt-editable-click tt-icon-hover">
                                                <span class="tt-icon-entry">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                </span>
                                            </a>

                                        </h5>
                                        <div class="empty-space marg-lg-b25"></div>
                                        <div id="price_list">
                                            <? echo $this->context->actionPriceslist(); ?>
                                        </div>
                                    </div>
                                    <div class="tt-editable-form">

                                        <h5 class="h5 bold">Ціни та послуги</h5>

                                        <? echo $this->context->actionPrices(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="empty-space marg-lg-b30"></div>
                            <!-- TT-PROJECT-EDIT -->
                            <div class="tt-project-edit-wrapper">
                                <div class="tt-project-list">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="tt-project-add">
                                                    <span class="tt-project-add-entry">
                                                        <span class="tt-project-add-icon"></span>
                                                        <span class="simple-text size-4">Додати проект</span>
                                                    </span>
                                            </a>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="tt-project">
                                                <div class="tt-project-img">
                                                    <a class="custom-hover open-popup" href="#" data-rel="14">
                                                        <img class="img-responsive" src="/img/project/project_3.jpg" alt="">
                                                    </a>
                                                    <a class="tt-project-img-edit  tt-icon-hover" href="#">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                    </a>
                                                </div>
                                                <a class="tt-project-title open-popup" href="#" data-rel="14">Ел.монтажние роботи під ключ.</a>
                                                <div class="simple-text size-2 blue-links">
                                                    <p>Короткий опис проведених робіт Etiam varius, leo sit amet tristique fermentum, sem sem condimentum nibh, sed consectetur lacus tellus eget ... <a href="#"><b>Дізнатись більше</b></a></p>
                                                </div>
                                                <div class="tt-project-info">
                                                    <div class="tt-project-table">
                                                        <div class="tt-project-cell">
                                                            вартість робіт <span>1500грн.</span>
                                                        </div>
                                                        <div class="tt-project-cell">
                                                            дата проведення <span>02/2016</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="button type-1 full open-popup" data-rel="14">Переглянути проект</a>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="tt-project">
                                                <div class="tt-project-img">
                                                    <a class="custom-hover open-popup" href="#" data-rel="14">
                                                        <img class="img-responsive" src="/img/project/project_4.jpg" alt="">
                                                    </a>
                                                    <a class="tt-project-img-edit  tt-icon-hover" href="#">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                    </a>
                                                </div>
                                                <a class="tt-project-title open-popup" href="#" data-rel="14">Ел.монтажние роботи під ключ.</a>
                                                <div class="simple-text size-2 blue-links">
                                                    <p>Короткий опис проведених робіт Etiam varius, leo sit amet tristique fermentum, sem sem condimentum nibh, sed consectetur lacus tellus eget ... <a href="#"><b>Дізнатись більше</b></a></p>
                                                </div>
                                                <div class="tt-project-info">
                                                    <div class="tt-project-table">
                                                        <div class="tt-project-cell">
                                                            вартість робіт <span>5000грн.</span>
                                                        </div>
                                                        <div class="tt-project-cell">
                                                            дата проведення <span>02/2016</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="button type-1 full open-popup" data-rel="14">Переглянути проект</a>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-project-new">
                                    <div class="tab-entry-box">
                                        <form>
                                            <h4 class="h4">Новий проект</h4>
                                            <div class="empty-space marg-lg-b20"></div>
                                            <div class="tt-project-new-img">
                                                <div class="tt-project-pic tt-img-upload">
                                                        <span class="tt-project-pic-entry">
                                                            <span class="tt-project-pic-icon"></span>
                                                            <span class="simple-text size-2">Додати фото</span>
                                                        </span>
                                                    <input type="file">
                                                </div>
                                                <div class="tt-project-pic-loaded">
                                                    <span style="background-image:url(/img/project/new_1.jpg);"></span>
                                                    <div class="button-close small"></div>
                                                </div>
                                                <div class="tt-project-pic-loaded">
                                                    <span style="background-image:url(/img/project/new_2.jpg);"></span>
                                                    <div class="button-close small"></div>
                                                </div>
                                            </div>
                                            <div class="empty-space marg-lg-b10"></div>
                                            <div class="tt-input-label">Назва робіт</div>
                                            <input class="simple-input" placeholder="Наприклад, ремонт квартири під ключ" type="text">
                                            <div class="empty-space marg-lg-b25"></div>
                                            <div class="tt-input-label">Вартість робіт</div>
                                            <input class="simple-input" placeholder="Наприклад, 2500грн. за весь ремонт" type="text">
                                            <div class="empty-space marg-lg-b25"></div>
                                            <div class="tt-input-label">Коли проводились роботи</div>
                                            <div class="simple-input-icon">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                <input class="simple-input simple-datapicker hasDatepicker" placeholder="Коли проводились роботи" id="dp1509732832899" type="text">
                                            </div>
                                            <div class="empty-space marg-lg-b25"></div>
                                            <div class="tt-input-label">Опис виконаний робіт</div>
                                            <textarea class="simple-input height-4" placeholder="Коли проводились роботи"></textarea>
                                            <div class="empty-space marg-lg-b40"></div>
                                            <div class="tt-buttons-block m10 text-right">
                                                <a class="button type-1 tt-project-new-close"><span>Відмінити</span></a>
                                                <div class="button type-1 color-3">
                                                    <span>Залишити</span>
                                                    <input type="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="tabs-block style-2">
                                <div class="tab-nav">
                                    <div class="tab-menu active">Всі</div>
                                    <div class="tab-menu">Позитивні <span class="count-large">(2)</span></div>
                                    <div class="tab-menu">Негативні <span class="count-large">(0)</span></div>
                                </div>

                                <div class="tab-entry" style="display: block;">
                                    <!-- TT-REVIEW -->
                                    <div class="tt-review editable">
                                        <div class="tt-dropdown style-2 dark">
                                            <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                            <ul class="tt-dropdown-entry" style="display: none;">
                                                <li><a href="#">Нецензурна лексика</a></li>
                                                <li><a href="#">Спам</a></li>
                                                <li><a href="#">Порушення правил</a></li>
                                            </ul>
                                        </div>
                                        <div class="tt-review-top row">
                                            <div class="col-sm-6">
                                                <div class="tt-response good"><i class="tt-icon like white"></i><span>Позитивний відгук</span></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="tt-review-right">
                                                    <div class="tt-review-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        <span>24.04.2017</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="simple-text size-3 small-space bold-style-2">
                                            <p><b>Сподобалось</b></p>
                                            <p>Спокійний, грамотний, відповідальний фахівець і дуже душевна людина. Всі роботи виконані відповідно до вимог і навіть більше (запропонував найкращі варіанти виконання роботи).</p>
                                            <p><b>Не сподобалось</b></p>
                                            <p>Все сподобалось!</p>
                                            <p><b>Загальний висновок</b></p>
                                            <p>Рекомендую для виконання інженерних робіт, без трудомістких будівельних завдань.</p>
                                        </div>
                                        <div class="row vertical-middle">
                                            <div class="col-sm-6 col-lg-5">
                                                <div class="tt-rating-block">
                                                    <ul class="tt-rating">
                                                        <li>
                                                            <div class="tt-rating-title">Вічливість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">На зв'язку</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Пунктуальність</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання ціни</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання термінів</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Ціна/Якість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-7">
                                                <div class="tt-review-category">Замовлення: <a href="professionals-work-detail.html">Заміна старої проводки</a></div>
                                                <div class="tt-review-name"><a href="professionals-detail.html">Jordan Crump</a></div>
                                            </div>
                                        </div>
                                        <div class="tt-reply">
                                            <div class="tt-reply-write">
                                                <img class="tt-reply-write-img" src="/img/reply/user_3.jpg" alt="">
                                                <div class="tt-reply-write-info">
                                                    <textarea class="simple-input height-2" placeholder="Залишити коментар"></textarea>
                                                    <div class="tt-buttons-block m10 text-right">
                                                        <div class="empty-space marg-lg-b20"></div>
                                                        <a class="button type-1 tt-reply-write-close"><span>Відмінити</span></a>
                                                        <div class="button type-1 color-3">
                                                            <span>Залишити</span>
                                                            <input type="submit">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>
                                    <div class="tt-review editable">
                                        <div class="tt-dropdown style-2 dark">
                                            <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                            <ul class="tt-dropdown-entry" style="display: none;">
                                                <li><a href="#">Нецензурна лексика</a></li>
                                                <li><a href="#">Спам</a></li>
                                                <li><a href="#">Порушення правил</a></li>
                                            </ul>
                                        </div>
                                        <div class="tt-review-top row">
                                            <div class="col-sm-6">
                                                <div class="tt-response good"><i class="tt-icon like white"></i><span>Позитивний відгук</span></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="tt-review-right">
                                                    <div class="tt-review-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        <span>24.04.2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simple-text size-3 small-space bold-style-2">
                                            <p><b>Сподобалось</b></p>
                                            <p>Зробив мені розведення і монтаж в 3-х кімнатній квартирі 98 м2. Господа, якщо ви хочете швидко і дорого то не звертайтеся будь ласка до цього майстра. Якщо хочете щоб було все РІВНЕ, так так, РІВНЕ, що в наш час практично не буває, то це до Мушеху Мнацаканович. Дуже грамотний, і найголовніше - ненав'язливий підхід. Охайного ставлення і точний витрата матеріалу до міліметра !!!<br>Грамотна, ергономічна і красива комплектація електричного щита.</p>
                                            <p><b>Не сподобалось</b></p>
                                            <p>Не вміє робити свою справу тяп-ляп :)</p>
                                            <p><b>Загальний висновок</b></p>
                                            <p>Дивлячись на роботу електриків в квартирах у моїх друзів і знайомих, скажу одне, у цих типу "фахівців" дві проблеми: погано з геометрією і ставлення до роботи на "відвалися". Сміливо звертайтеся до Мушеху Мнацаканович, це дуже хороший фахівець і найголовніше відповідальна людина, яка дуже поважає свою працю і в результаті - Вас ...</p>
                                        </div>
                                        <div class="row vertical-middle">
                                            <div class="col-sm-6 col-lg-5">
                                                <div class="tt-rating-block">
                                                    <ul class="tt-rating">
                                                        <li>
                                                            <div class="tt-rating-title">Вічливість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">На зв'язку</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Пунктуальність</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання ціни</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання термінів</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Ціна/Якість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-7">
                                                <div class="tt-review-category">Замовлення: <a href="professionals-work-detail.html">Потрібен електромонтаж в новобудові</a></div>
                                                <div class="tt-review-name"><a href="professionals-detail.html">Jordan Crump</a></div>
                                            </div>
                                        </div>
                                        <div class="tt-reply">
                                            <div class="tt-reply-write">
                                                <img class="tt-reply-write-img" src="/img/reply/user_3.jpg" alt="">
                                                <div class="tt-reply-write-info">
                                                    <textarea class="simple-input height-2" placeholder="Залишити коментар"></textarea>
                                                    <div class="tt-buttons-block m10 text-right">
                                                        <div class="empty-space marg-lg-b20"></div>
                                                        <a class="button type-1 tt-reply-write-close"><span>Відмінити</span></a>
                                                        <div class="button type-1 color-3">
                                                            <span>Залишити</span>
                                                            <input type="submit">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>
                                </div>
                                <div class="tab-entry">
                                    <div class="tt-review editable">
                                        <div class="tt-dropdown style-2 dark">
                                            <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                            <ul class="tt-dropdown-entry" style="display: none;">
                                                <li><a href="#">Нецензурна лексика</a></li>
                                                <li><a href="#">Спам</a></li>
                                                <li><a href="#">Порушення правил</a></li>
                                            </ul>
                                        </div>
                                        <div class="tt-review-top row">
                                            <div class="col-sm-6">
                                                <div class="tt-response good"><i class="tt-icon like white"></i><span>Позитивний відгук</span></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="tt-review-right">
                                                    <div class="tt-review-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        <span>24.04.2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simple-text size-3 small-space bold-style-2">
                                            <p><b>Сподобалось</b></p>
                                            <p>Зробив мені розведення і монтаж в 3-х кімнатній квартирі 98 м2. Господа, якщо ви хочете швидко і дорого то не звертайтеся будь ласка до цього майстра. Якщо хочете щоб було все РІВНЕ, так так, РІВНЕ, що в наш час практично не буває, то це до Мушеху Мнацаканович. Дуже грамотний, і найголовніше - ненав'язливий підхід. Охайного ставлення і точний витрата матеріалу до міліметра !!!<br>Грамотна, ергономічна і красива комплектація електричного щита.</p>
                                            <p><b>Не сподобалось</b></p>
                                            <p>Не вміє робити свою справу тяп-ляп :)</p>
                                            <p><b>Загальний висновок</b></p>
                                            <p>Дивлячись на роботу електриків в квартирах у моїх друзів і знайомих, скажу одне, у цих типу "фахівців" дві проблеми: погано з геометрією і ставлення до роботи на "відвалися". Сміливо звертайтеся до Мушеху Мнацаканович, це дуже хороший фахівець і найголовніше відповідальна людина, яка дуже поважає свою працю і в результаті - Вас ...</p>
                                        </div>
                                        <div class="row vertical-middle">
                                            <div class="col-sm-6 col-lg-5">
                                                <div class="tt-rating-block">
                                                    <ul class="tt-rating">
                                                        <li>
                                                            <div class="tt-rating-title">Вічливість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">На зв'язку</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Пунктуальність</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання ціни</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання термінів</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Ціна/Якість</div>
                                                            <div class="tt-rating-stars">
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                                <i class="tt-icon star"></i>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-7">
                                                <div class="tt-review-category">Замовлення: <a href="professionals-work-detail.html">Потрібен електромонтаж в новобудові</a></div>
                                                <div class="tt-review-name"><a href="professionals-detail.html">Jordan Crump</a></div>
                                            </div>
                                        </div>
                                        <div class="tt-reply">
                                            <div class="tt-reply-write">
                                                <img class="tt-reply-write-img" src="/img/reply/user_3.jpg" alt="">
                                                <div class="tt-reply-write-info">
                                                    <textarea class="simple-input height-2" placeholder="Залишити коментар"></textarea>
                                                    <div class="tt-buttons-block m10 text-right">
                                                        <div class="empty-space marg-lg-b20"></div>
                                                        <a class="button type-1 tt-reply-write-close"><span>Відмінити</span></a>
                                                        <div class="button type-1 color-3">
                                                            <span>Залишити</span>
                                                            <input type="submit">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-entry">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space marg-sm-b40"></div>
                </div>
                <div class="col-md-3 col-md-pull-9">
                    <div class="tt-widget">
                        <h5 class="tt-widget-title editable h5">Розташування <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="18" href="#">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAZlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkKZr9qgAAAAInRSTlMAYKcGQI81zsS3rysXx5+bl/zh18iKhXBWMR0Kv1xaShYBE04zmQAAAGJJREFUCNdNyUUWgDAMANGkWIUKLkXvf0kWkNDZ/TfA1eMJSV5ZvAnZpL2xSHLWiaFQn0Sxtlp0O6neMOiVdElcZM5PYlm9in5IBEczql9ZmLRggemNaTsSzE2vXAnMgEtkPdrDBKj0PuQ6AAAAAElFTkSuQmCC" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                            </a></h5>
                        <div class="tt-widget-location">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAUCAMAAACzvE1FAAAAV1BMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkLkTjgbAAAAHHRSTlMA3Z2EEHekmIsV1s9Q5KwF9sq5tWhDQTcdCmZiOw521AAAAI1JREFUGBkFwYVhw0AABDA9mJ04TL3956wEPnNJyvwBGJJtmrZkAGqmDktNhSF/AL8M9Iw4huHAOd0c9JKUzpHmtGLMsmTEWmTC9cLlihqZ8Mq25YUapxX2UnZYT1q+AHzT9IwAjOm0vAHeaVACkAKW3IBbFmDPDHN2gJYHjzQAap7PVAA4J2cA4H4H/AMiuQhmojIjvwAAAABJRU5ErkJggg==" alt="">
                            <div id="profile-place"><?=$member->place?></div>
                        </div>
                        <div class="tt-widget-devider"></div>
                        <h5 class="tt-widget-title editable h5">Виїзд на об`єкти (обл.) <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="19" href="#">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAZlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkKZr9qgAAAAInRSTlMAYKcGQI81zsS3rysXx5+bl/zh18iKhXBWMR0Kv1xaShYBE04zmQAAAGJJREFUCNdNyUUWgDAMANGkWIUKLkXvf0kWkNDZ/TfA1eMJSV5ZvAnZpL2xSHLWiaFQn0Sxtlp0O6neMOiVdElcZM5PYlm9in5IBEczql9ZmLRggemNaTsSzE2vXAnMgEtkPdrDBKj0PuQ6AAAAAElFTkSuQmCC" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                            </a></h5>
                        <ul class="simple-list size-2 profile">
<?  $regions = Yii::$app->db->createCommand("SELECT id, name, name_short  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();?>
<? if (!is_array($member->regions)) $member->regions = array(); foreach ($regions as $val) if (in_array($val['id'], $member->regions)) { ?><li><a href="javascript:"><?=$val['name_short']?></a></li><? } ?>
                        </ul>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>
                    <div class="tt-widget">
                        <h5 class="tt-widget-title h5">Оцінки <span>(0)</span></h5>
                        <div class="simple-text size-2">
                            <p>Наразі не має жодної оцінки</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        </div>
        <div class="tt-devider"></div>
    </div>


















    <div class="popup-wrapper">
        <div class="bg-layer"></div>

        <div class="popup-content" data-rel="12">
            <div class="layer-close"></div>
            <div class="popup-container size-3">
                <div class="popup-align">
                    <form>
                        <h4 class="h4 text-center">Відгук про співпрацю</h4>
                        <div class="empty-space marg-lg-b30"></div>
                        <div class="tt-input-wrapper">
                            <div class="tt-input-label">Для проекту</div>
                            <div class="tt-input-entry">
                                <div class="simple-select">
                                    <div class="SumoSelect" tabindex="0"><select class="SumoUnder" tabindex="-1">
                                            <option selected="" disabled="" value="Оберіть проект">Оберіть проект</option>
                                            <option value="">Послуга №1</option>
                                            <option value="">Послуга №2</option>
                                            <option value="">Послуга №3</option>
                                            <option value="">Послуга №4</option>
                                        </select><p class="CaptionCont SelectBox" title=" Оберіть проект"><span class="placeholder"> Оберіть проект</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt disabled selected"><label>Оберіть проект</label></li><li class="opt"><label>Послуга №1</label></li><li class="opt"><label>Послуга №2</label></li><li class="opt"><label>Послуга №3</label></li><li class="opt"><label>Послуга №4</label></li></ul></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>
                        <div class="tt-input-wrapper">
                            <div class="tt-input-label">Тип відгуку</div>
                            <div class="tt-input-entry">
                                <div class="checkbox-inline">
                                    <label class="checkbox-entry radio">
                                        <input name="3" checked="" type="radio"><span class="tt-response good"><i class="tt-icon like green"></i><span>Позитивний відгук</span></span>
                                    </label>
                                    <label class="checkbox-entry radio">
                                        <input name="3" type="radio"><span class="tt-response bad"><i class="tt-icon dislike red"></i><span>негативний відгук</span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>
                        <textarea class="simple-input size-2 height-2" required="" placeholder="Що сподобалось"></textarea>
                        <div class="empty-space marg-lg-b10"></div>
                        <textarea class="simple-input size-2 height-2" required="" placeholder="Що не сподобалось"></textarea>
                        <div class="empty-space marg-lg-b10"></div>
                        <textarea class="simple-input size-2 height-2" required="" placeholder="Загальні враження від співпраці"></textarea>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="simple-text size-3 darker">
                            <p><b>Будь ласка оцініть виконавця:</b></p>
                        </div>
                        <div class="empty-space marg-lg-b15"></div>

                        <div class="tt-rating-block">
                            <div class="row row10">
                                <div class="col-sm-4">
                                    <ul class="tt-rating style-2">
                                        <li>
                                            <div class="tt-rating-stars wth-hover">
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                            </div>
                                            <div class="tt-rating-title">Вічливість</div>
                                        </li>
                                        <li>
                                            <div class="tt-rating-stars wth-hover">
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                            </div>
                                            <div class="tt-rating-title">Пунктуальність</div>
                                        </li>
                                    </ul>
                                    <div class="empty-space marg-xs-b15"></div>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="tt-rating style-2">
                                        <li>
                                            <div class="tt-rating-stars wth-hover">
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                            </div>
                                            <div class="tt-rating-title">Дотримання ціни</div>
                                        </li>
                                        <li>
                                            <div class="tt-rating-stars wth-hover">
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                            </div>
                                            <div class="tt-rating-title">Дотримання термінів</div>
                                        </li>
                                    </ul>
                                    <div class="empty-space marg-xs-b15"></div>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="tt-rating style-2">
                                        <li>
                                            <div class="tt-rating-stars wth-hover">
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                                <span>
                                                    <i class="tt-icon star-empty"></i>
                                                    <i class="tt-icon star"></i>
                                                </span>
                                            </div>
                                            <div class="tt-rating-title">Ціна/Якість</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b40"></div>

                        <div class="tt-popup-response-btn">
                            <a class="button type-1 size-3 uppercase popup-close"><span>відмінити</span></a>
                            <div class="button type-1 size-3 color-3 uppercase">
                                <span>залишити відгук</span>
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="13">
            <div class="layer-close"></div>
            <div class="popup-container size-4">
                <div class="popup-align">
                    <form>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h4 class="h4 text-center">Показати телефон</h4>
                                <div class="empty-space marg-lg-b25"></div>

                                <div class="simple-text size-3 bold-style-2">
                                    <p><b>Важливо!</b> Зв'язуючись з виконавцем по телефону без додавання замовлення на сайті, ви втрачаєте можливість залишити відгук про роботи.</p>
                                </div>
                                <div class="empty-space marg-lg-b30"></div>
                                <div class="simple-toggle">
                                    <a class="simple-toggle-title h6" href="#">Детальніше про можливі ризики <span class="simple-toggle-img">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGCAMAAADAMI+zAAAAM1BMVEUAAAAtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkOWchbXAAAAEXRSTlMA/P63pE01JhjElJGDfnJfQVsZ+r8AAAAwSURBVAgdBcGHAYAwEAQg7lOM3f2nFeQGeGLUCVz18lWHowbMNHomsGVv2QBWsuAHHzoAt0s5vpMAAAAASUVORK5CYII=" alt="">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGBAMAAAAFwGKyAAAAKlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igALMZbCAAAADnRSTlMA/bekk4FNNSYYxHJfQbY+m64AAAAtSURBVAjXYxBlAIKNDIkODAysMgy8wgwMjgkMDIUKzOJAcQ4pxQaQ/ERJBgYAXNAEYoEO6FQAAAAASUVORK5CYII=" alt="">
                                    </span></a>
                                    <div class="simple-toggle-content">
                                        <div class="simple-text">
                                            <p>Інженер-електрик 25 років стажу виконає електротехнічні роботи від заміни та перенесення розеток до електромонтажу "під ключ" квартири, будинки, новобудови, дачі, офіси, підприємства якісно недорого гарантія.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty-space marg-lg-b30"></div>
                                <label class="checkbox-entry">
                                    <input type="checkbox"><span>Я попереджений/-на про ризики роботи без додавання замовлення</span>
                                </label>
                                <div class="empty-space marg-lg-b30"></div>
                            </div>
                        </div>
                        <div class="tt-popup-btn-center">
                            <a class="button type-1 size-3 color-3 uppercase" href="#"><span>запит на послугу</span></a>
                            <a class="button type-1 size-3 uppercase tt-underheading-show popup-close" href="#"><span>показати телефон</span></a>
                        </div>
                    </form>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="14">
            <div class="layer-close"></div>
            <div class="popup-container size-5 gallery">
                <div class="popup-align">
                    <div class="empty-space marg-xs-b15 marg-lg-b20"></div>
                    <div class="tt-two-slider tt-project-slider">
                        <div class="custom-arrows">
                            <div class="custom-arrows-prev tt-arrow-prev pos-2 style-2 hidden-xs hidden-sm"></div>
                            <div class="custom-arrows-next tt-arrow-next pos-2 style-2 hidden-xs hidden-sm"></div>
                            <div class="swiper-container swiper-control-top swiper-swiper-unique-id-0 initialized swiper-container-horizontal" data-lazy="1" data-space-between="30" id="swiper-unique-id-0">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="width: 888px; margin-right: 30px;">
                                        <div class="tt-project-preview swiper-lazy swiper-lazy-loaded" style="background-image: url(&quot;img/project/project_detail.jpg&quot;);">

                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" style="width: 888px; margin-right: 30px;">
                                        <div class="tt-project-preview swiper-lazy" data-background="img/project/project_detail_2.jpg">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="width: 888px; margin-right: 30px;">
                                        <div class="tt-project-preview swiper-lazy" data-background="img/project/project_detail_3.jpg">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination relative-pagination hidden swiper-pagination-swiper-unique-id-0 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                            </div>
                        </div>
                        <div class="swiper-container swiper-control-bottom swiper-swiper-unique-id-1 initialized swiper-container-horizontal" data-slides-per-view="auto" data-lazy="1" data-space-between="10" data-center="1" data-clicked-slide="1" id="swiper-unique-id-1">
                            <div class="swiper-wrapper" style="transform: translate3d(410.5px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-visible swiper-slide-active" style="margin-right: 10px;">
                                    <div class="tt-project-thumb">
                                        <img src="/img/project/thumb_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-visible swiper-slide-next" style="margin-right: 10px;">
                                    <div class="tt-project-thumb">
                                        <img src="/img/project/thumb_2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-visible" style="margin-right: 10px;">
                                    <div class="tt-project-thumb">
                                        <img src="/img/project/thumb_3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination relative-pagination hidden swiper-pagination-swiper-unique-id-1 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                        </div>
                    </div>
                    <h4 class="tt-project-slider-title h4">Ел.монтажние роботи під ключ.</h4>
                    <div class="tt-project-slider-text simple-text size-3">
                        <p>Опис проекту і проведених робіт ed mollis, augue at aliquet feugiat, sapien elit dictum felis, vel cursus tortor lorem non nunc. Pellentesque magna magna, iaculis eget nisl at, rutrum consectetur nisl. Duis bibendum leo at urna cursus, at facilisis elit venenatis. Sed fermentum efficitur justo, cursus hendrerit metus dapibus et. Maecenas vel porta ligula.</p>
                    </div>
                    <div class="tt-project-slider-info-wrapper">
                        <div class="tt-project-slider-info">вартість робіт: <span>2500грн.</span></div>
                        <div class="tt-project-slider-info">дата проведення: <span>03/2016</span></div>
                    </div>

                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="15">
            <div class="layer-close"></div>
            <div class="popup-container size-8">
                <div class="popup-align">
                    <h4 class="h4 text-center">Назва компанії</h4>
                    <div class="empty-space marg-lg-b30"></div>
                    <input class="simple-input" placeholder="24/7 Electrical Company" type="text">
                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <a class="button type-1 size-1 popup-close"><span>Відмінити</span></a>
                        <div class="button type-1 size-1 color-3">
                            <span>Зберегти</span>
                            <input type="submit">
                        </div>
                    </div>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="16">
            <div class="layer-close"></div>
            <div class="popup-container size-7">
                <div class="popup-align">
                    <h4 class="h4 text-center">Форма роботи із замоником</h4>
                    <div class="empty-space marg-lg-b30"></div>
                    <div class="row">

                        <?php $form6 = ActiveForm::begin(['id' => 'edit_forma', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=forma'), 'action' =>['/members/member/savemember/?scenario=forma']]); ?>


                        <div class="col-sm-5">
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
                            <div class="empty-space marg-xs-b20"></div>
                        </div>
                        <div class="col-sm-7">
                            <div class="tt-select-swither-content">
                                <div class="tt-select-swither-item" data-rel="1" <?=($member->forma==1) ? 'style="display:block;"' : '' ?>></div>
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
                                <div class="tt-select-swither-item" data-rel="3"  <?=($member->forma==3) ? 'style="display:block;"' : '' ?>>
                                    <?= $form6->field($member, 'company')->textInput(['value'=>$member->company, 'class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Назва компанії"])->label(false); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <?= Html::resetButton('Відмінити', ['class' => 'popup-close button type-1']) ?>
                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="17">
            <div class="layer-close"></div>
            <div class="popup-container">
                <div class="popup-align">
                    <h4 class="h4 text-center">Номер телефону</h4>
                    <div class="empty-space marg-lg-b30"></div>

                    <div class="tt-fadein-top">
                        <div class="row">
                            <div class="col-sm-8 col-md-9">
                                <input class="simple-input" required="" placeholder="+38 (ххх) ххх - хх - хх" value="+38 (067) 555-4326" type="tel">
                                <div class="empty-space marg-xs-b20"></div>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link tt-phone-submit" href="#">Підтвердити</a>
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

                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <div class="button type-1 size-3 color-3">
                            <span>Зберегти</span>
                            <input type="submit">
                        </div>
                        <a class="button type-1 size-3 popup-close"><span>Відмінити</span></a>
                    </div>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="18">
            <div class="layer-close"></div>
            <div class="popup-container size-8">
                <div class="popup-align">

                    <?php $form4 = ActiveForm::begin(['id' => 'edit_place', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=place'), 'action' =>['/members/member/savemember/?scenario=place']]); ?>
                    <h4 class="h4 text-center">Розташуваня</h4>
                    <div class="empty-space marg-lg-b30"></div>
                    <?=$form4->field($member, 'place')->textInput(['value'=>$member->place, 'class' => 'simple-input', "id"=>"tt-google-single-autocomplete", 'autocomplete'=>'off', 'placeholder' => "Введіть місце знаходження"])->label(false); ?>
                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <?= Html::resetButton('Відмінити', ['class' => 'popup-close button type-1']) ?>
                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="19">
            <div class="layer-close"></div>
            <div class="popup-container size-7">
                <div class="popup-align">

                    <?php $form5 = ActiveForm::begin(['id' => 'edit_regions', 'options' => ['class'=>'form-edit-ajax'],
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=regions'), 'action' =>['/members/member/savemember/?scenario=regions']]); ?>

                    <h4 class="h4">Виїзд на об’єкти:</h4>
                    <div class="simple-text size-3">
                        <p>Виберіть області, у яких можливий виїзд на об'єкти</p>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>


                    <div class="row">
                        <?
                        $regions_arr = $regions_arr_=array();
                        if (sizeof($regions)) {
                            foreach ($regions as $val) { $regions_arr[$val['id']] = $val['name_short']; }

                        }


                        echo  $form5->field($member, 'regions')->checkboxList($regions_arr, [
                            'item' => function($index, $label, $name, $checked, $value) {


                                if ($checked==1) $checked = 'checked';
                                return (($index==0) ? "<div class=\"col-xs-6\">" : "").(($index==13) ? "</div><div class=\"col-xs-6\">" : "")."<label class=\"checkbox-entry nowrap\"><input type=\"checkbox\" class=\"checklist\" {$checked} name='{$name}' value='{$value}'><span><b>{$label}</b></span></label><div class=\"empty-space marg-lg-b15\"></div>".(($index==24) ? "</div>" : "");
                            }
                        ])->label(false);
                        ?>
                    </div>
                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <?= Html::resetButton('Відмінити', ['class' => 'popup-close button type-1']) ?>
                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                    </div>



                    <?php ActiveForm::end(); ?>

                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="20">
            <div class="layer-close"></div>
            <div class="popup-container">
                <div class="popup-align">
                    <?php $form8 = ActiveForm::begin(['id' => 'edit_budget_min', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=budget_min'), 'action' =>['/members/member/savemember/?scenario=budget_min']]); ?>
                    <h4 class="h4 text-center">Мінімальна вартість замовлення</h4>
                    <div class="empty-space marg-lg-b30"></div>

                   <?
                    echo \yii\widgets\MaskedInput::widget([
                        'name' => 'MemberEdit[budget_min]',
                        'mask' => '9',
                        'value' =>($member->budget_min>0)? $member->budget_min : '',
                        'options' =>["class" => "simple-input",  'placeholder' => "вказати в гривнях", 'autocomplete'=>"off"],
                        'clientOptions' => ['repeat' => 10, 'greedy' => false]
                    ]);

                    ?>

                    <div class="empty-space marg-lg-b20"></div>
                    <div class="tt-buttons-block text-right">
                        <?= Html::resetButton('Відмінити', ['class' => 'popup-close button type-1']) ?>
                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="21">
            <div class="layer-close"></div>
            <div class="popup-container">
                <div class="popup-align">
                    <h4 class="h4 text-center">Робочий статус</h4>
                    <div class="empty-space marg-lg-b30"></div>


                    <?php $form0 = ActiveForm::begin(['id' => 'edit_busy_to', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=busy_to'), 'action' =>['/members/member/savemember/?scenario=busy_to']]); ?>
                    <div class="tt-editable-form" style="display: block;">


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
                            <?= Html::resetButton('Відмінити', ['class' => 'popup-close button type-1']) ?>
                            <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                        </div>

                    </div>

                    <?php ActiveForm::end(); ?>

















                </div>
                <div class="button-close"></div>
            </div>
        </div>
    </div>

<?




$gpJsLink= 'http://maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

$options = '{"types":["(cities)"],"componentRestrictions":{"country":"ua"}}';
echo $this->registerJs("(function(){



        var input = document.getElementById('tt-google-single-autocomplete');
        var options = $options;        
        searchbox = new google.maps.places.Autocomplete(input, options);

$(\"time.timeago\").html($.timeago($(\"time.timeago\")));





        
})();" , \yii\web\View::POS_END );

?>

<?php $style= ".pac-container {z-index: 2000 !important;}";
 $this->registerCss($style);
?>


