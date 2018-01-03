<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\components\MemberHelper;
$this->title = 'Повідомлення';

?>
    <div class="tt-header-margin"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper padding0">
                <div class="empty-space marg-sm-b30 marg-lg-b90"></div>
                <h4 class="h4">Повідомлення</h4>
                <div class="empty-space marg-lg-b20"></div>
                <? Pjax::begin(); ?>
                <div class="tabs-block style-2">
                    <div class="tab-nav">

                        <a href="<?=Url::to(['/members/msg'])?>" class="tab-menu <?=(!isset($_GET['filter'])) ? 'active' : '' ?>"><span>Всі</span></a>
                        <a href="<?=Url::to(['/members/msg?filter=orders'])?>" class="tab-menu <?=((@$_GET['filter']=='orders') ? 'active' : '')?>"><span>Мої замовники</span></a>
                        <a href="<?=Url::to(['/members/msg?filter=executors'])?>" class="tab-menu <?=((@$_GET['filter']=='executors') ? 'active' : '' )?>"><span>Мої виконавці</span></a>
                        <a href="<?=Url::to(['/members/msg?filter=support'])?>" class="tab-menu <?=((@$_GET['filter']=='support') ? 'active' : '' )?>"><span>Підтримка</span></a>

                    </div>

                    <div class="tab-entry" style="display: block;">




<? if (sizeof($members)) { ?>

                    <!-- TT-MESSAGES -->
                     <div class="tt-messages clearfix">
                            <div class="tt-messages-nav">
<? foreach ($members as $val) {
    $arrayParams = ['id'=>$val['suggestion_id']];
    if (!empty($_GET['filter'])) $arrayParams =  array_merge($arrayParams, array('filter'=>$_GET['filter']));
    Yii::$app->urlManager->createUrl(array_merge(["members/msg"], $arrayParams));
?>
                                <div class="tt-messages-user clearfix <?=(@$_GET['id']==$val['suggestion_id']) ? 'active' : ''?>" data-url="<?=Yii::$app->urlManager->createUrl(array_merge(["members/msg"], $arrayParams))?>">
                                    <img src="<?=!empty($val['avatar_image']) ? $val['avatar_image'] : '/img/person/person.png';?>" style="width:60px;" alt="">
                                    <div class="tt-messages-user-info">
                                        <div class="tt-messages-date simple-text"><?=MemberHelper::GetShortDates($val['created_at'])?></div>
                                        <div class="tt-messages-name h6"><?=(!empty($val['company'])) ? $val['company'] : $val['first_name'].' '.$val['last_name'].' '.$val['surname'] ?></div>
                                        <div class="simple-text">
                                            <p><?= Html::encode( mb_strimwidth($val['msg'], 0, 300, '...')); ?></p>
                                        </div>
                                    </div>
                                </div>
<? } ?>
                            </div>
<? if (!empty($msg)) { echo $msg; } else { ?>
                            <div class="tt-messages-content">
                                <div class="tt-messages-chose">
                                    <div class="simple-text">
                                        <p>Будь ласка, виберіть контакт, щоб почати спілкування</p>
                                    </div>
                                </div>
                            </div>
<? } ?>

                        </div>
                    </div>

<? } else { ?>

                    <div class="tt-messages clearfix">
                        <div class="tt-messages-content" style="width: 100%;">
                            <div class="tt-messages-chose">
                                <div class="simple-text">
                                    <p>Немає контактів для спілкування</p>
                                </div>
                            </div>
                        </div>
                    </div>
<? } ?>



                </div>
                <? Pjax::end(); ?>

                <div class="empty-space marg-sm-b30 marg-lg-b90"></div>
            </div>
        </div>
    </div>

<?
echo $this->registerJsFile('/js/msg.js', ['depends' => 'yii\web\JqueryAsset']);
?>