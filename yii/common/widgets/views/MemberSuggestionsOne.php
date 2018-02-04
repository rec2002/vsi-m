<?
    use yii\bootstrap\ActiveForm;
    use common\components\MemberHelper;
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<div class="tt-proposition-wrapper1">
    <div class="empty-space marg-lg-b30"></div>
    <div class="tt-proposition-buttons">


<? if ($model->deleted==0 ) { ?>
        <div class="tt-proposition-pause">
            <a href="#" class="button type-1 color-3 icon-pause tt-proposition-pause-btn open-popup">Заморозити пропозицію</a>
            <div class="tt-info-btn tt-tooltip" data-tooltip="Свою пропозицію ви можете заморозити або видалити. В обох випадках замовник не зможе обмінятися з вами контактами і кошти не будуть списані з вашого балансу. Ця функція дозволить вам уникнути списання коштів, якщо ви з якоїсь причини не хочете приймати нові замовлення (наприклад, зайняті на об'єкті або йдіть у відпустку). Заморожені пропозиції можна відновити, віддалені - не можна. Після того як пропозиція буде видалено, ви не зможете відповісти на це замовлення ще раз.">?</div>
        </div>
<? } ?>
<? if ($model->deleted==2) { ?>
        <div class="tt-proposition-continue" style="display: block;">
            <h5 class="h5">Ви заморозили пропозицію</h5>
            <div class="empty-space marg-lg-b10"></div>
            <?php $form_ = ActiveForm::begin(['id' => 'suggestion_delete',  'fieldConfig' => [ 'options' => ['tag' => false]], 'enableClientValidation'=>false]); ?>
            <?=$form_->field($model, 'id')->hiddenInput()->label(false); ?>
            <?= Html::submitButton('Відновити пропозицію', ['class' => 'button type-1 color-5 icon-continue tt-proposition-continue-btn', 'name' => 'restore_btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
<? } ?>

<? if ($model->deleted==1) { ?>
            <div class="tt-proposition-continue" style="display: block;">
                <?= Html::submitButton('Пропозицію скасовано', ['class' => 'tt-fadein-link button type-1 disabled']) ?>
            </div>
<? } ?>

    </div>

    <div class="tt-proposition persone-online clearfix">
        <div class="tt-proposition-master">
            <a class="tt-proposition-img custom-hover round" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>">
                <img class="img-responsive" src="<?=!empty($model->member->avatar_image) ? $model->member->avatar_image : '/img/person/person.png';?>" alt="" style="height: 136px;">
            </a>
            <a class="tt-proposition-title h5" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>"><?=(!empty($model->member->company)) ? $model->member->company : $model->member->first_name.' '.$model->member->last_name.' '.$model->member->surname ?></a>
<? if (sizeof($ratings)) { ?>
                <div class="tt-proposition-reviews simple-text size-2">
                    <p><?=sizeof($ratings)?> <?=MemberHelper::NumberSufix(sizeof($ratings), array('відгук', 'відгуки', 'відгуків'))?></p>
                </div>
<? } ?>
            <div class="tt-proposition-team simple-text size-2">
                <p><?=($model->member->forma!=3) ? MemberHelper::FORMA[$model->member->forma] : ''?><?=($model->member->forma==2) ? ' / '.MemberHelper::BRYGADA[$model->member->brygada] : ''?><?=($model->member->forma==3) ? ' Юридична особа ' : ''?></p>
            </div>
            <div class="tt-proposition-average simple-text size-2">
                <p>На сайті <b><time class="timeago" datetime="<?=$model->member->created_at?>"></time></b></p>
            </div>
            <div class="tt-heading-status">зараз на сайті</div>
            <!--<div class="tt-task-status finish">Був на сайті 45хв назад</div>-->
        </div>
        <div class="tt-proposition-content">
            <div class="tabs-block style-1">
                <div class="tab-nav">
                    <div class="tab-menu active"><span>Пропозиція</span></div>
                    <div class="tab-menu"><span>Про майстра</span></div>
                    <div class="tab-menu"><span>Відгуки <span>(<?=sizeof($ratings)?>)</span></span></div>
                </div>

                <div class="tab-entry" style="display: block;">
                    <div class="tab-entry-box">
                        <div class="tt-proposition-desc simple-text size-3">
                            <p><?=nl2br($model->descriptions)?></p>
                        </div>
                        <div class="tt-proposition-option-wrapper">
                            <div class="tt-proposition-options">
                                <div class="tt-proposition-label">Ціна за всю роботу:</div>
                                <div class="tt-proposition-value"><?=($model->price_from==$model->price_to) ? $model->price_from : 'від '.$model->price_from.' до '.$model->price_to ?> грн</div>
                            </div>
                            <div class="tt-proposition-options">
                                <div class="tt-proposition-label">Термін виконання:</div>
                                <div class="tt-proposition-value"><?=($model->start_from==$model->start_to) ? $model->start_from : 'від '.$model->start_from.' до '.$model->start_to ?>
                                    <?=($model->start_from==$model->start_to) ? MemberHelper::NumberSufix($model->start_from, array('день', 'днів', 'днів')) : MemberHelper::NumberSufix($model->start_to, array('день', 'днів', 'днів')) ?>
                                </div>
                            </div>
                            <div class="tt-proposition-options">
                                <div class="tt-proposition-label">Дата і умови виїзду:</div>
                                <div class="tt-proposition-value"><?=MemberHelper::ListDates($model->dates)?>. <?=(!empty($model->payment_object)) ? 'Виїзд на об\'єкт платний - '.$model->payment_object.' грн.' : 'Виїзд на об\'єкт безкоштовний.'?> <?=($model->come_personally==1) ? 'На зустріч приїду особисто.' : ''?></div>
                            </div>
                            <div class="tt-proposition-options">
                                <div class="tt-proposition-label">Дод. умови:</div>
                                    <div class="tt-proposition-value"><?=($model->prepayment==1) ? 'Потрібна передоплата за роботу.' : 'Починаю роботу без предоплати.'?>
                                    <?=($model->prepayment_material==1) ? 'Потрібна передоплата за матеріали.' : ''?>
                                </div>
                            </div>
                        </div>
                        <div class="simple-text size-3">
<? if ($model->disregast_suggestion>0) { ?>
                            <p><b>Замовник відхилив пропозицію.</b></p>
<? } ?>
                            <p><?=(!empty($model->deadline)) ? ((date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($model->deadline))) ? 'Пропозиція діє ще <time class="timeago" datetime="'.$model->deadline.'"></time>' : '<span style="color:red;">Час дії пропозиції минув <time class="timeago" datetime="'.$model->deadline.'"></time> тому</span>') : ''?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-entry">
                    <div class="tab-entry-box">
                        <div class="simple-text size-3">
                            <h5>Про себе</h5>
                            <p><?=(!empty($model->member->about)) ? nl2br($model->member->about) : 'Інформація відсутня.' ?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-entry">
                    <div class="tab-entry-box">
                        <? if (sizeof($ratings)) { ?>

                            <? foreach ($ratings as $key=>$val) {?>

                                <div class="tt-review style2">
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
                                                <ul class="tt-rating">
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
<? if ($val['feedback_approve']==2) { ?>
                                            <div class="tt-reply">
                                                <div class="tt-reply-write">
                                                    <img class="tt-reply-write-img tt-profile-img" src="<?=!empty($model->member->avatar_image) ? $model->member->avatar_image : '/img/person/person.png';?>" style="width:54px;" alt="">
                                                    <div class="tt-editable feedback_text" style="margin-left:75px;">
                                                        <div class="simple-text size-3 small-space bold-style-2"><p><b>Коментар виконавця </b></p></div>
                                                        <div class="empty-space marg-lg-b20"></div>
                                                        <div class="tt-editable-item simple-text size-2"><?=nl2br($val['feedback_text'])?></div>
                                                        <div class="empty-space marg-lg-b20"></div>
                                                    </div>
                                                </div>
                                            </div>
<? } ?>									
                                </div>
                                <!-- Review1-END -->

                                <div class="tt-review-devider"></div>
                            <? } ?>
                        <? } else { ?>

                            <div class="alert alert-warning fade in alert-dismissable" style="margin-right: 20px;margin-left: 20px;"><strong>Не опубліковано жодної відгуку.</strong> </div>

                        <? } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="empty-space marg-sm-b40 marg-lg-b90"></div>

<? $this->beginBlock('custom_container'); ?>
    <?php $form = ActiveForm::begin(['id' => 'suggestion_delete',  'fieldConfig' => [ 'options' => ['tag' => false]], 'enableClientValidation'=>false]); ?>
    <div class="tt-freeze">
        <h5 class="tt-freeze-title h5"><span>Заморозити пропозицію</span><span>Відкликати пропозицію</span></h5>
        <h5 class="tt-freeze-subtitle h5"><span>Пропозицію буде тимчасово відкликано</span><span>Пропозицію буде видалено</span></h5>

        <?  echo $form->field($model, 'deleted')->checkbox([
        'template' => '<label class="tt-freeze-checkbox checkbox-entry">{input}<span>Видалити без можливості відновлення</span></label><div>{error}</div>'
        ])?>

        <?=$form->field($model, 'id')->hiddenInput()->label(false); ?>
        <?= Html::submitButton('Заморозити', ['class' => 'button type-1 color-3 icon-pause tt-freeze-btn-pause', 'name' => 'frozen_btn']) ?>
        <?= Html::submitButton('<span  class="icon-close"></span>Видалити', ['class' => 'button type-1 color-3 tt-freeze-btn-remove', 'name' => 'delete_btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>
<? $this->endBlock(); ?>





