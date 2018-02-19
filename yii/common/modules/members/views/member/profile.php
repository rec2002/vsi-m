<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use kartik\select2\Select2;
use common\components\MemberHelper;
use common\modules\members\models\MemberResponse;

$this->title = 'Кабінет користувача';

?>
    <div class="tt-header-margin"  style="height: 55px;"></div>

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
                        <?= Html::a(Html::encode('Як мене бачать замовники'), Url::toRoute(['/professionals/default/profile', 'id' =>$member->id]), ['class' =>'button type-1 color-2']) ?>
                    </div>
                </div>
            </div>
            <div class="tt-heading-user clearfix">
                <div class="tt-heading-img">
                    <img class="img-responsive" src="<?=!empty($member->avatar_image) ? $member->avatar_image : '/img/person/person.png';?>" alt="">
                </div>
                <div class="tt-heading-user-content">
<? if ($member->online==1) {?>
                        <div class="tt-heading-status">зараз на сайті</div>
<? } ?>
                    <div class="tt-dropdown style-2">
                        <a class="tt-dropdown-link open-popup" data-rel="21" href="javascript:"><span class="tt-heading-state <?=(!empty($member->busy_to) ? 'red' : ''); ?>"><?=(empty($member->busy_to)) ? 'Вільний для роботи' : 'Зайнятий до '.date('d.m.Y', (strtotime($member->busy_to))); ?></span><span class="tt-dropdown-icon"><i></i></span></a>
                    </div>

                    <h3 class="tt-heading-title h3 light">
<? if ($member->approved ==1) {?>
                        <span class="tt-heading-check tt-tooltip" data-tooltip="Документи та достовірність внесеної інформації перевірені адміністраціює сайту"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAWlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////9ZMre9AAAAHXRSTlMA7uMjCr6qpE8/Lhj48d/d1tLJs29nXlZILBEEARTWarUAAABZSURBVBgZ5cHXFYJQFEXB8wIZJCpx99+mLj+BWwEzerC8kmmik+UNqQwfyHS26W+GVGeZK/WTw6iLFy5ICyS6qjw+lpAcuhEaWsew69ZaQx9lKPBRpiLomb6DfQQnMGTh7AAAAABJRU5ErkJggg==" alt=""></span>
<? } ?>
                        <?=(!empty($member->company)) ? $member->company : $member->first_name.' '.$member->last_name.' '.$member->surname ?> <!--<a class="open-popup tt-icon-hover tt-icon-entry" data-rel="15" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIXRSTlMAJG4QC5yml4RdCHdPHgX5YlhRSsjDubCPeWtkRUQ1LhVEw5mLAAAAXElEQVQI103KVw6AIBAA0V0UpSiC2Pv9T6kmwDJ/LxmgjgeypOBIurRU5J1b5hsRxBozajZhUA8LOm2SaizrIp6/qiDpc7XdKUjg7nUjGa7UMH+KLxe2hESJClIvbhADi7p4sv0AAAAASUVORK5CYII=" alt="">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                        </a>-->
                    </h3>
                    <div class="tt-heading-desc simple-text size-2">
                        <p><span id="profile_forma"><?=($member->forma!=3) ? MemberHelper::FORMA[$member->forma] : ''?><?=($member->forma==2) ? ' / '.MemberHelper::BRYGADA[$member->brygada] : ''?><?=($member->forma==3) ? ' Юридична особа ' : ''?></span> <a class="open-popup tt-icon-hover tt-icon-entry" data-rel="16" href="#">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAY1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+aRQ2gAAAAIXRSTlMAJG4QC5yml4RdCHdPHgX5YlhRSsjDubCPeWtkRUQ1LhVEw5mLAAAAXElEQVQI103KVw6AIBAA0V0UpSiC2Pv9T6kmwDJ/LxmgjgeypOBIurRU5J1b5hsRxBozajZhUA8LOm2SaizrIp6/qiDpc7XdKUjg7nUjGa7UMH+KLxe2hESJClIvbhADi7p4sv0AAAAASUVORK5CYII=" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC" alt="">
                            </a>
                        </p>
                    </div>
                    <div class="tt-heading-reliability">
                        <div class="tt-heading-rating tt-vote-wrapper">
                            <a class="tt-vote like <?=($ratings['positive']>0) ? 'active' : '' ?>">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon like grey"></i>
                                        <i class="tt-icon like green"></i>
                                    </span>
                                <span class="tt-vote-count"><?=$ratings['positive']?></span>
                            </a>
                            <a class="tt-vote dislike <?=($ratings['negative']>0) ? 'active' : '' ?>">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon dislike grey"></i>
                                        <i class="tt-icon dislike red"></i>
                                    </span>
                                <span class="tt-vote-count"><?=$ratings['negative']?></span>
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
                                <a href="tel:<?=preg_replace('/\D/', '', $member->phone)?>"><?=$member->phone?></a>
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
                            <div class="tab-menu active" data-tab="info"><span>Інформація</span></div>
                            <div class="tab-menu" data-tab="projects"><span>Виконані проекти</span></div>
                            <div class="tab-menu" data-tab="recall"><span>Відгуки <span>(<?=$ratings['total']?>)</span></span></div>
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
<? if (sizeof($portfolio)) foreach ($portfolio as $key=>$val) if ($key==0) { ?>
                                        <div class="col-sm-6">
                                            <div class="tt-project">
                                                <div class="tt-project-img">
                                                    <a class="custom-hover open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">
                                                        <img class="img-responsive" src="/uploads/members/portfolio/thmb/<?=$val['image']?>" alt="">
                                                    </a>
                                                    <a class="tt-project-img-edit  tt-icon-hover" href="javascript:" rel="nofollow" data-id="<?=$val['id']?>">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                    </a>
                                                </div>
                                                <a class="tt-project-title open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><?=$val['title']?></a>
                                                <div class="simple-text size-2 blue-links">
                                                    <p><?= Html::encode( mb_strimwidth($val['description'], 0, 200, '...')); ?> <a href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><b>Дізнатись більше</b></a></p>
                                                </div>
                                                <div class="tt-project-info">
                                                    <div class="tt-project-table">
                                                        <div class="tt-project-cell">
                                                            вартість робіт <span><?=(empty($val['cost'])) ? '(не вказано)' : $val['cost'] ?></span>
                                                        </div>
                                                        <div class="tt-project-cell">
                                                            Терміни та об'єми: <span><?=(empty($val['capacity_term'])) ? '(не вказано)' : $val['capacity_term'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="button type-1 full open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">Переглянути проект</a>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
<? } ?>
                                    </div>
                                    <div class="row">
<? $i=0; if (sizeof($portfolio)>1) foreach ($portfolio as $key=>$val) if ($key>0) {  ?>
                                        <div class="col-sm-6">
                                            <div class="tt-project">
                                                <div class="tt-project-img">
                                                    <a class="custom-hover open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">
                                                        <img class="img-responsive" src="/uploads/members/portfolio/thmb/<?=$val['image']?>" alt="">
                                                    </a>
                                                    <a class="tt-project-img-edit  tt-icon-hover"  href="javascript:" rel="nofollow" data-id="<?=$val['id']?>">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                    </a>
                                                </div>
                                                <a class="tt-project-title open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><?=$val['title']?></a>
                                                <div class="simple-text size-2 blue-links">
                                                    <p><?= Html::encode( mb_strimwidth($val['description'], 0, 200, '...')); ?> <a href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><b>Дізнатись більше</b></a></p>
                                                </div>
                                                <div class="tt-project-info">
                                                    <div class="tt-project-table">
                                                        <div class="tt-project-cell">
                                                            вартість робіт <span><?=(empty($val['cost'])) ? '(не вказано)' : $val['cost'] ?></span>
                                                        </div>
                                                        <div class="tt-project-cell">
                                                            Терміни та об'єми: <span><?=(empty($val['capacity_term'])) ? '(не вказано)' : $val['capacity_term'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="button type-1 full open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">Переглянути проект</a>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
<?
        if ($i%2) echo ' </div><div class="row">';
        $i++;
?>
<? } ?>



                                    </div>
                                </div>




                                <div class="tt-project-new">
                                    <div class="tab-entry-box">

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-entry">
                            <div class="tabs-block style-2">

                                <? if (sizeof($ratings['reviews']))  { ?>
                                    <div class="tab-nav">
                                        <div class="tab-menu redirect review_list active" data-value="0">Всі</div>
                                        <div class="tab-menu redirect review_list" data-value="1">Позитивні <span class="count-large">(<?=$ratings['positive']?>)</span></div>
                                        <div class="tab-menu redirect review_list" data-value="2">Негативні <span class="count-large">(<?=$ratings['negative']?>)</span></div>
                                    </div>

                                    <div class="tab-entry" style="display: block;">

                                        <? foreach ($ratings['reviews'] as $key=>$val) {?>
                                            <div class="tt-review" data-review="<?=$val['positive_negative']?>">
                                                <div class="tt-review-top row">
                                                    <div class="col-sm-6">
                                                        <? if ($val['positive_negative']==1) { ?>
                                                            <div class="tt-response good"><i class="tt-icon like white"></i><span>Позитивний відгук</span></div>
                                                        <? } ?>
                                                        <? if ($val['positive_negative']==2) { ?>
                                                            <div class="tt-response bad"><i class="tt-icon dislike white"></i><span>негативний відгук</span></div>
                                                        <? } ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="tt-review-date">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                            <span><?=date('d.m.Y', strtotime($val['created_at']))?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simple-text size-3 small-space bold-style-2">
                                                    <p><b>Сподобалось</b></p>
                                                    <p><?=nl2br($val['positive_note'])?></p>
                                                    <p><b>Не сподобалось</b></p>
                                                    <p><?=nl2br($val['negative_note'])?></p>
                                                    <p><b>Загальний висновок</b></p>
                                                    <p><?=nl2br($val['conclusion_note'])?></p>
                                                </div>
                                                <div class="row vertical-middle">
                                                    <div class="col-sm-6 col-lg-5">
                                                        <div class="tt-rating-block">
                                                            <ul class="tt-rating style-2">
                                                                <li>
                                                                    <div class="tt-rating-title">Вічливість</div>
                                                                    <?=MemberHelper::GetRatingStar($val['devotion'], 'devotion', false);?>
                                                                </li>
                                                                <li>
                                                                    <div class="tt-rating-title">На зв'язку</div>
                                                                    <?=MemberHelper::GetRatingStar($val['connected'], 'connected', false);?>
                                                                </li>
                                                                <li>
                                                                    <div class="tt-rating-title">Пунктуальність</div>
                                                                    <?=MemberHelper::GetRatingStar($val['punctuality'], 'punctuality', false);?>
                                                                </li>
                                                                <li>
                                                                    <div class="tt-rating-title">Дотримання ціни</div>
                                                                    <?=MemberHelper::GetRatingStar($val['price'], 'price', false);?>
                                                                </li>
                                                                <li>
                                                                    <div class="tt-rating-title">Дотримання термінів</div>
                                                                    <?=MemberHelper::GetRatingStar($val['terms'], 'terms', false);?>
                                                                </li>
                                                                <li>
                                                                    <div class="tt-rating-title">Ціна/Якість</div>
                                                                    <?=MemberHelper::GetRatingStar($val['quality'], 'quality', false);?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-7">
                                                        <div class="tt-review-category">Замовлення: <?= Html::a($val['title'], ['/orders/default/detail', 'id' => $val['order_id']]) ?></div>
                                                        <div class="tt-review-name"><?= Html::a($val['first_name'], ['/orders/default/detail', 'id' => $val['order_id']]) ?></div>
                                                    </div>
                                                </div>
<? if (sizeof($val['images']))  { ?>
                                                    <div class="empty-space marg-lg-b20"></div>
                                                    <h6 class="tt-task-subtitle gallery-response-view">Фото:</h6>
                                                    <ul class="tt-task-gal clearfix">
                                                        <? foreach ($val['images'] as $key=>$item) {?>
                                                            <li style="width: auto;">
                                                                <a class="custom-hover open-popup-big response-image" href="javascript:" data-id="<?=$item['response_id']; ?>">
                                                                    <img class="img-responsive" src="/uploads/members/responses/thmb/<?=$item['image']; ?>" style="width:80px;" alt="">
                                                                </a>
                                                            </li>
                                                        <? } ?>
                                                    </ul>
                                                    <div class="empty-space marg-lg-b20"></div>
<? } ?>

<? if (in_array(@$val['feedback_approve'], array(1,2))) { ?>
                                                    <div class="tt-reply">
                                                        <div class="tt-reply-write">
                                                            <img class="tt-reply-write-img tt-profile-img" src="<?=!empty($member->avatar_image) ? $member->avatar_image : '/img/person/person.png';?>" style="width:54px;" alt="">
                                                            <div class="tt-editable feedback_text" style="margin-left:75px;">
                                                                <div class="tt-editable-item simple-text size-2"><?=nl2br($val['feedback_text'])?></div>
                                                                <div class="empty-space marg-lg-b30"></div>
<? if ($val['feedback_approve']==1) {?>
                                                                <div class="tt-editable-item simple-text size-2"><span style="color:red;">Коментар на модерації, закритий для публічного перегляду.</span></div>
<? } ?>
                                                            </div>
                                                        </div>
                                                    </div>
<? } else { ?>

<?
$responsive_model = MemberResponse::findOne(['id' => $val['id'] ]);
$responsive_model->setScenario('feedback');
$form_f = ActiveForm::begin(['options' => ['class'=>'response_feedback'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute(['/members/member/validations', 'mode'=>'feedback']), 'action' =>'']);
?>
                                                <div class="tt-reply">
                                                    <div class="tt-reply-write">
                                                        <img class="tt-reply-write-img tt-profile-img" src="<?=!empty($member->avatar_image) ? $member->avatar_image : '/img/person/person.png';?>" style="width:54px;" alt="">

                                                        <div class="tt-editable feedback_text" style="display:none;margin-left:75px;">
                                                            <div class="tt-editable-item simple-text size-2"></div>
                                                            <div class="empty-space marg-lg-b30"></div>
                                                            <div class="tt-editable-item simple-text size-2"><span style="color:red;">Коментар на модерації, закритий для публічного перегляду.</span></div>
                                                        </div>

                                                        <div class="tt-reply-write-info">
                                                            <?=$form_f->field($responsive_model, 'id')->hiddenInput()->label(false); ?>
                                                            <?=$form_f->field($responsive_model, 'feedback_text')->textarea(['class' => 'simple-input height-2', 'autocomplete'=>'off', 'placeholder' => "Залишити коментар", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>
                                                            <div class="tt-buttons-block m10 text-right">
                                                                <div class="empty-space marg-lg-b20"></div>
                                                                <?= Html::resetButton('Відмінити', ['class' => 'button type-1 tt-reply-write-close']) ?>
                                                                <?= Html::submitButton('Залишити', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php ActiveForm::end(); ?>
<? } ?>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>

                                        <? } ?>

                                        <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
                                    </div>
                                <? } else { ?>
                                    <div class="alert alert-warning fade in alert-dismissable" style="margin-right: 20px;margin-left: 20px;"><strong>Не опубліковано жодної відгуку.</strong> </div>
                                <? } ?>


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
<?  $regions = Yii::$app->db->createCommand("SELECT id, name, name_short, url_tag  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();?>
<? if (!is_array($member->regions)) $member->regions = array(); foreach ($regions as $val) if (in_array($val['id'], $member->regions)) { ?><li><a href="<?=Url::to(['/professionals',  'region'=>$val['url_tag']])?>"><?=$val['name_short']?></a></li><? } ?>
                        </ul>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>

                    <? if ($ratings['total']>0) { ?>
                        <div class="tt-widget">
                            <h5 class="tt-widget-title h5">Загальні оцінки</h5>
                            <ul class="tt-rating style-2">
                                <li>
                                    <div class="tt-rating-title">Вічливість</div>
                                    <?=MemberHelper::GetRatingStar($ratings['devotion'], 'devotion', false);?>
                                </li>
                                <li>
                                    <div class="tt-rating-title">На зв'язку</div>
                                    <?=MemberHelper::GetRatingStar($ratings['connected'], 'connected', false);?>
                                </li>
                                <li>
                                    <div class="tt-rating-title">Пунктуальність</div>
                                    <?=MemberHelper::GetRatingStar($ratings['punctuality'], 'punctuality', false);?>
                                </li>
                                <li>
                                    <div class="tt-rating-title">Дотримання ціни</div>
                                    <?=MemberHelper::GetRatingStar($ratings['price'], 'price', false);?>
                                </li>
                                <li>
                                    <div class="tt-rating-title">Дотримання термінів</div>
                                    <?=MemberHelper::GetRatingStar($ratings['terms'], 'terms', false);?>
                                </li>
                                <li>
                                    <div class="tt-rating-title">Ціна/Якість</div>
                                    <?=MemberHelper::GetRatingStar($ratings['quality'], 'quality', false);?>
                                </li>
                            </ul>
                            <!--<a href="javascript:" class="button type-1 full">Залишити відгук</a>-->
                        </div>
<? } else { ?>
                        <div class="tt-widget">
                            <h5 class="tt-widget-title h5">Загальні оцінки</h5>
                            <p>Наразі не має жодної оцінки</p>
                        </div>
<? } ?>

                </div>
            </div>

            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        </div>
        <div class="tt-devider"></div>
    </div>


    <div class="popup-wrapper">
        <div class="bg-layer"></div>

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

                    <?php

                    $member->setScenario('phone');
                    $form7 = ActiveForm::begin(['id' => 'edit_phone', 'options' => ['class'=>'form-edit-ajax profile'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=phone'), 'action' =>['/members/member/savemember/?scenario=phone']]); ?>
                    <div class="tt-editable-form1" style="display:block;">

                        <div class="tt-input-label"></div>
                        <div class="tt-fadein-top phone-reg-block" >
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form7->field($member, 'phone')->textInput(['value'=>$member->phone, 'data-value'=>$member->phone, 'type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off',   'placeholder' => "+38 (0хх) ххх - хххх", "id"=>"memberedit-phone", 'data-phone'=>$member->phone])->label(false); ?>


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
                                    <div class="empty-space marg-xs-b20"></div>
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
                <div class="button-close"></div>
            </div>
        </div>
        <div class="popup-content" data-rel="18">
            <div class="layer-close"></div>
            <div class="popup-container size-8">
                <div class="popup-align">

                    <?php
                    $member->setScenario('place');
                    $form4 = ActiveForm::begin(['id' => 'edit_place', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>false, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=place'), 'action' =>['/members/member/savemember/?scenario=place']]); ?>
                    <h4 class="h4 text-center">Розташуваня</h4>
                    <div class="empty-space marg-lg-b30"></div>
                    <?=$form4->field($member, 'place')->textInput(['value'=>$member->place, 'class' => 'simple-input', "id"=>"tt-google-single-autocomplete-only", 'autocomplete'=>'off', 'placeholder' => "Введіть місце знаходження"])->label(false); ?>
                    <?=$form4->field($member, 'region')->hiddenInput(['id'=>'tt-google-single-autocomplete-region'])->label(false); ?>
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

                    <?php


                    $member->setScenario('regions');
                    $form5 = ActiveForm::begin(['id' => 'edit_regions', 'options' => ['class'=>'form-edit-ajax'],
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
                                return (($index==0) ? "<div class=\"col-xs-6\">" : "").(($index==13) ? "</div><div class=\"col-xs-6\">" : "")."<label class=\"checkbox-entry nowrap\"><input type=\"checkbox\" class=\"checklist\" {$checked} name='{$name}' value='{$value}'><span><b>{$label}</b></span></label><div class=\"empty-space marg-lg-b15\"></div>".(($index==24) ? "</div><div style=\"clear:both;\">" : "");
                            }
                        ])->label(false);

                        echo "</div>";

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
                    <?php
                    $member->setScenario('budget_min');
                    $form8 = ActiveForm::begin(['id' => 'edit_budget_min', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>true, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=budget_min'), 'action' =>['/members/member/savemember/?scenario=budget_min']]); ?>
                    <h4 class="h4 text-center">Мінімальна вартість замовлення</h4>
                    <div class="empty-space marg-lg-b30"></div>

                   <?
                    echo \yii\widgets\MaskedInput::widget([
                        'name' => 'MemberEdit[budget_min]',
                        'mask' => '9',
                        'value' =>($member->budget_min>0)? $member->budget_min : '',
                        'options' =>["class" => "simple-input",  'placeholder' => "Вказати в гривнях", 'autocomplete'=>"off"],
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


                    <?php

                    $member->setScenario('busy_to');
                    $form0 = ActiveForm::begin(['id' => 'edit_busy_to', 'options' => ['class'=>'form-edit-ajax'], 'enableAjaxValidation'=>false, 'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=busy_to'), 'action' =>['/members/member/savemember/?scenario=busy_to']]); ?>
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




$gpJsLink= '//maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);


echo $this->registerJs("(function(){



    $('body').on('keyup','input.simple-input[type=\"tel\"]', function(event) {
        var number = $(this);
        
        if (number.val()!=number.data('phone')) {
            number.parent().parent().removeClass('col-md-12').addClass('col-md-9').addClass('col-sm-8').next('div').show();
        } else {
            number.parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
        }

		
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

            $('input.simple-input[type=\"tel\"]').next('p').html('');
            $('input.simple-input[type=\"tel\"]').parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
            $('input.simple-input[type=\"tel\"]').val($('input.simple-input[type=\"tel\"]').data('value'));
            $('input.simple-input[type=\"tel\"]').data('phone', $('input.simple-input[type=\"tel\"]').data('value'));
            $('.popup-wrapper, .popup-content').removeClass('active');            
        }
        $('input.simple-input[type=\"tel\"]').closest('.phone-reg-block').prev('.tt-input-label').text('').css({'color':'#5cca47'});
    });
        
})();" , \yii\web\View::POS_END );

    echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);
    $bundle = AppAsset::register(Yii::$app->view);
    $bundle->js[] = '/js/portfolio.js'; // dynamic file added
?>



<?php $style= ".pac-container {z-index: 2000 !important;}";
 $this->registerCss($style);
?>


