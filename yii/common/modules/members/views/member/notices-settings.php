<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = 'Сповіщення користувача  - Кабінет користувача';

?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 646px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect" href="professionals-profile-project.html"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect" href="professionals-profile-orders.html"><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
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
                                        <label class="checkbox-entry" ><input type="checkbox" class="notices_action" data-name="email"  data-type="<?=$val['type']?>" data-id="<?=$val['notice_id']?>" value="1" <?=($val['email']==1) ? 'checked' : ''?>><span></span></label>
                                    <? } ?>
                                </div>
                                <div class="tt-notification-check">
                                    <? if ($val['show_sms']==1) {?>
                                        <label class="checkbox-entry"><input type="checkbox"  class="notices_action" data-name="sms"  data-type="<?=$val['type']?>" data-id="<?=$val['notice_id']?>" value="1" <?=($val['sms']==1) ? 'checked' : ''?>><span></span></label>
                                    <? } ?>
                                </div>
                            </div>
<? } ?>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>

