<?

    use common\components\MemberHelper;
    use yii\helpers\Url;
?>
<div class="tt-proposition-wrapper1">
    <div class="empty-space marg-lg-b30"></div>
    <div class="tt-proposition-buttons">
        <div class="tt-proposition-pause">
            <a href="#" class="button type-1 color-3 icon-pause tt-proposition-pause-btn open-popup" data-rel="16">Заморозити пропозицію</a>
            <div class="tt-info-btn tt-tooltip" data-tooltip="Свою пропозицію ви можете заморозити або видалити. В обох випадках замовник не зможе обмінятися з вами контактами і кошти не будуть списані з вашого балансу. Ця функція дозволить вам уникнути списання коштів, якщо ви з якоїсь причини не хочете приймати нові замовлення (наприклад, зайняті на об'єкті або йдіть у відпустку). Заморожені пропозиції можна відновити, віддалені - не можна. Після того як пропозиція буде видалено, ви не зможете відповісти на це замовлення ще раз.">?</div>
        </div>
        <div class="tt-proposition-continue">
            <h5 class="h5">Ви заморозили пропозицію</h5>
            <div class="empty-space marg-lg-b10"></div>
            <a href="#" class="button type-1 color-5 icon-continue tt-proposition-continue-btn">Відновити пропозицію</a>
        </div>

    </div>

    <div class="tt-proposition persone-online clearfix">
        <div class="tt-proposition-master">
            <a class="tt-proposition-img custom-hover round" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>">
                <img class="img-responsive" src="<?=!empty($model->member->avatar_image) ? $model->member->avatar_image : '/img/person/person.png';?>" alt="" style="height: 136px;">
            </a>
            <a class="tt-proposition-title h5" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>"><?=(!empty($model->member->company)) ? $model->member->company : $model->member->first_name.' '.$model->member->last_name.' '.$model->member->surname ?></a>
            <!--<div class="tt-proposition-reviews simple-text size-2">
                <p>2 відгука</p>
            </div>-->
            <!--<div class="tt-proposition-city simple-text size-2">
                <p><b>м.Київ</b></p>
            </div>-->
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
                    <div class="tab-menu"><span>Відгуки</span></div>
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
                            <p><?=(!empty($model->deadline)) ? ((date('Y-m-d H:i:s')<=strtotime($model->deadline)) ? 'Пропозиція діє ще <time class="timeago" datetime="'.$model->deadline.'"></time>' : '<span style="color:red;">Час дії пропозиції минув <time class="timeago" datetime="'.$model->deadline.'"></time> тому</span>') : ''?></p>
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
                        Відгуки відсутні.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="empty-space marg-sm-b40 marg-lg-b90"></div>
