<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\components\MemberHelper;


?>



<div class="tt-messages-content">
    <div class="tt-messages-entry clearfix">
        <div class="tt-messages-head">
            <a class="tt-messages-back" href="#">
                <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<g><path d="M10.5,266.5c-2.8,0-5.5-1.1-7.6-3.2c-4-4.2-3.9-10.9,0.3-14.9l191.5-185c4.2-4,10.9-3.9,14.9,0.3   c4,4.2,3.9,10.9-0.3,14.9l-191.5,185C15.8,265.6,13.2,266.5,10.5,266.5z" fill="#6A6E7C"/><path d="M202,451.6c-2.6,0-5.3-1-7.3-3L3.2,263.6c-3.1-3-4.1-7.6-2.4-11.5c1.6-4,5.5-6.6,9.8-6.6h318.8   c100.7,0,182.7,81.9,182.7,182.7V441c0,5.8-4.7,10.5-10.5,10.5c-5.8,0-10.5-4.7-10.5-10.5v-12.9c0-89.1-72.5-161.6-161.6-161.6   H36.6l172.7,166.9c4.2,4,4.3,10.7,0.3,14.9C207.5,450.5,204.8,451.6,202,451.6z" fill="#6A6E7C"/></g>
				</svg>
                <span>назад</span>
            </a>
            <a class="tt-messages-ava custom-hover round" href="<?=Url::to(['/professionals/default/profile', 'id'=>$model['member_id']])?>">
                <img class="img-responsive" src="<?=!empty($model['avatar_image']) ? $model['avatar_image'] : '/img/person/person.png';?>" style="width:60px;" alt="">
            </a>
            <div class="tt-messages-head-info">
                <a class="tt-messages-head-phone h5" href="tel:<?=preg_replace('/\D+/', '', $model['phone'])?>"><?=$model['phone']?></a>
                <a class="tt-messages-head-name h5" href="<?=Url::to(['/professionals/default/profile', 'id'=>$model['member_id']])?>"><?=(!empty($model['company'])) ? $model['company'] : $model['first_name'].' '.$model['last_name'].' '.$model['surname'] ?></a>
                <div class="simple-text size-2 space5">
                    <p>Замовлення <a href=""<?=Url::to(['/orders/default/detail', 'id'=>$model['order_id']])?>"><?=$model['title']?></a></p>
                    <p>Б’юджет: <?=MemberHelper::GetBudgetRange()[$model['budget']]['budget']?></p>
                </div>
            </div>
        </div>
        <div class="tt-message-area">
            <? $form = ActiveForm::begin(['id' => 'send_msg', 'enableAjaxValidation'=>false, 'action' =>['/members/msg/savemsg', 'id'=>$model['suggestion_id']] ]); ?>
                <?=$form->field($message, 'msg')->textarea(['class' => 'simple-input', 'placeholder'=>'Напишіть повідомлення'])->error(false)->label(false); ?>
                <?= Html::submitButton('Відправити', ['class' => 'button type-1 color-3', 'name' => 'submit']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="tt-messages-text">
            <h5 class="h5 text-center">Щодо замовлення №<?=$model['order_id']?> <a href="<?=Url::to(['/orders/default/detail', 'id'=>$model['order_id']])?>"><?=$model['title']?></a></h5>

            <div class="tt-messages-item simple-text other">
                <div class="tt-messages-offer">
                    <div class="tt-messages-offer-row">
                        <div class="tt-messages-offer-cell">Ціна за всю роботу:</div>
                        <div class="tt-messages-offer-cell"><?=($model['price_from']==$model['price_to']) ? $model['price_from'] : 'від '.$model['price_from'].' до '.$model['price_to'] ?> грн</div>
                    </div>
                    <div class="tt-messages-offer-row">
                        <div class="tt-messages-offer-cell">Термін виконання:</div>
                        <div class="tt-messages-offer-cell"><?=($model['start_from']==$model['start_to']) ? $model['start_from'] : 'від '.$model['start_from'].' до '.$model['start_to'] ?>
                            <?=($model['start_from']==$model['start_to']) ? MemberHelper::NumberSufix($model['start_from'], array('день', 'днів', 'днів')) : MemberHelper::NumberSufix($model['start_to'], array('день', 'днів', 'днів')) ?>
                        </div>
                    </div>
                    <div class="tt-messages-offer-row">
                        <div class="tt-messages-offer-cell">Дата і умови виїзду:</div>
                        <div class="tt-messages-offer-cell"><?=MemberHelper::ListDates($model['dates'])?>. <?=(!empty($model['payment_object'])) ? 'Виїзд на об\'єкт платний - '.$model['payment_object'].' грн.' : 'Виїзд на об\'єкт безкоштовний.'?> <?=($model['come_personally']==1) ? 'На зустріч приїду особисто.' : ''?></div>
                    </div>
                    <div class="tt-messages-offer-row">
                        <div class="tt-messages-offer-cell">Дод. умови:</div>
                        <div class="tt-messages-offer-cell"><?=($model['prepayment']==1) ? 'Потрібна передоплата за роботу.' : 'Починаю роботу без предоплати.'?>
                            <?=($model['prepayment_material']==1) ? 'Потрібна передоплата за матеріали.' : ''?></div>
                    </div>
                </div>
                <p><?=nl2br($model['descriptions'])?></p>
            </div>

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

} ?>


        </div>

    </div>
</div>
<?
$this->registerCss(".form-group { margin-bottom: 0px;}");
?>