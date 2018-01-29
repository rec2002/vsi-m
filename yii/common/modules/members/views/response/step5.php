<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MemberHelper;
use kartik\select2\Select2;

$this->title = 'Текст відгуку';

?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper">

                <h4 class="h4">Відгук на роботу майстра</h4>
                <div class="empty-space marg-lg-b30"></div>

                <!-- TT-MASTERBOX USER -->
                <div class="tt-masterbox response">
                    <div class="tt-masterbox-top clearfix">
                        <div class="tt-masterbox-img">
                            <img src="<?=!empty($member->member->avatar_image) ? $member->member->avatar_image : '/img/person/person.png';?>" style="width:70px;" alt="">
                        </div>
                        <div class="tt-masterbox-top-right">
                            <div class="tt-masterbox-topinfo">
                                <h5 class="tt-masterbox-title h5"><?=(!empty($member->member->company)) ? $member->member->company : $member->member->first_name.' '.$member->member->last_name.' '.$member->member->surname ?></h5>
                                <div class="tt-masterbox-average simple-text size-2">
                                    <p>по замовленню <a href="<?=Url::toRoute(['/orders/default/detail', 'id' => $member->order->id])?>"><?=$member->order->title?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-lg-b30"></div>

                <div class="tt-pageform full tt-give-response">
                        <h4 class="h4">Текст відгуку</h4>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="empty-space marg-lg-b20"></div>

                            <div class="tt-radio-switch-content">
                                <div class="tt-radio-switch-item " style="display:block;">
                                    <div class="simple-text size-3 space7">
                                        <p><b>Загальні оцінки</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="tt-rating-block">
                                                <ul class="tt-rating">
                                                    <li>
                                                        <div class="tt-rating-title">Вічливість  </div>
                                                        <?=MemberHelper::GetRatingStar($model->devotion, 'devotion', false);?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">На зв'язку  </div>
                                                        <?=MemberHelper::GetRatingStar($model->connected, 'connected',false);?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">Пунктуальність  </div>
                                                        <?=MemberHelper::GetRatingStar($model->punctuality, 'punctuality',false);?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">Дотримання ціни  </div>
                                                        <?=MemberHelper::GetRatingStar($model->punctuality, 'price',false);?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">Дотримання термінів </div>
                                                        <?=MemberHelper::GetRatingStar($model->terms, 'terms',false);?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">Ціна/Якість</div>
                                                        <?=MemberHelper::GetRatingStar($model->quality, 'quality',false);?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Загальне враження</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>


                                    <div>
<? if ($model->positive_negative ==1) { ?>
                                        <label class="like">
                                            <span class="tt-response good"><i class="tt-icon like green"></i><span>Позитивне</span></span>
                                        </label>
<? } else { ?>
                                        <label class=" dislike">
                                            <span class="tt-response bad"><i class="tt-icon dislike red"></i><span>негативне</span></span>
                                        </label>
<? } ?>
                                    </div>


                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Замовник особисто був(ла) на об'єкті?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><?
                                            $role = array (0=>'Особисто виконував роботу', 1=>'Керував бригадою');
                                            echo ($model->come_personality ==1) ? 'Taк. '.$role[$model->role] : 'Ні'?></p>
                                    </div>

                                    <div class="empty-space marg-lg-b30"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><b>Що сподобалось?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>

                                    <div class="simple-text size-2 space7">
                                        <p><?=nl2br($model->positive_note)?></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Що не сподобалось?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-2 space7">
                                        <p><?=nl2br($model->negative_note)?></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><b>Загальний висновок</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-2 space7">
                                        <p><?=nl2br($model->conclusion_note)?></p>
                                    </div>

                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><b>Виконавець робіт по договору</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-text size-2 space7">
                                        <p><?=$model->performer?></p>
                                    </div>

                                    <div class="empty-space marg-lg-b20"></div>

                                    <div class="simple-text size-2 space7">
                                        <p><?=($model->dogovir==1) ? '<b>Договір не підписували</b>' : ''?></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
<?
    $images = Yii::$app->db->createCommand("SELECT * FROM `member_response_images`  WHERE `response_id` = '".$model->id."' ")->queryAll();
?>
                                    <? if (sizeof($images))  { ?>
                                        <h6 class="tt-task-subtitle gallery-response-view">Фото:</h6>
                                        <ul class="tt-task-gal clearfix">
                                            <? foreach ($images as $key=>$val) {?>
                                                <li style="width: auto;">
                                                    <a class="custom-hover open-popup-big" href="javascript:" data-id="<?=$val['response_id']; ?>">
                                                        <img class="img-responsive" src="/uploads/members/responses/thmb/<?=$val['image']; ?>" style="width:80px;" alt="">
                                                    </a>
                                                </li>
                                            <? } ?>
                                        </ul>
                                    <? } ?>
                                    <div class="empty-space marg-lg-b30"></div>
                                    <? if ($model->feedback_approve==2) { ?>
                                        <div class="tt-reply">
                                            <div class="tt-reply-write">
                                                <img class="tt-reply-write-img tt-profile-img" src="<?=!empty($member->member->avatar_image) ? $member->member->avatar_image : '/img/person/person.png';?>" style="width:54px;" alt="">
                                                <div class="tt-editable feedback_text" style="margin-left:75px;">
                                                    <div class="simple-text size-3 small-space bold-style-2"><p><b>Коментар виконавця </b></p></div>
                                                    <div class="empty-space marg-lg-b20"></div>
                                                    <div class="tt-editable-item simple-text size-2"><?=nl2br($model->feedback_text)?></div>
                                                    <div class="empty-space marg-lg-b20"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <? }  ?>


                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <?= Html::a('Перейти до замволення', ['/orders/default/detail', 'id' => $member->order->id], ['class' => 'button type-1 size-3  uppercase']) ?>
                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
<?
echo $this->registerJsFile('/js/response.js', ['depends' => 'yii\web\JqueryAsset']);
?>