<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MemberHelper;
$this->title = 'Написати відгук';
?>

<div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper">




                <h4 class="h4">Залишити відгук</h4>
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
                    <?php

                    $model->setScenario('step1');
                    $form = ActiveForm::begin(['id' => 'response-step-1', 'method' => 'post',
                   //     'enableAjaxValidation'=>false,
                       'enableClientValidation'=>true,
                      //  'validationUrl'=>Url::toRoute(['/members/response/validations', 'mode' => 'step1']),
                        'action' =>Url::toRoute(['/members/response/create', 'id'=>$member->id])]); ?>
                        <ul class="tt-popup-progress">
                            <li class="active"><span>1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                        </ul>
                        <div class="empty-space marg-lg-b30"></div>

                        <h4 class="h4">1.Спілкування</h4>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="simple-text size-3 space7">
                            <p><b>Оцініть, будь ласка</b></p>
                            <p>Виконавець, не дізнається про ваші оцінки</p>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="tt-rating-block">
                                    <ul class="tt-rating">
                                        <li>
                                            <div class="tt-rating-title">Вічливість</div>
                                            <?=MemberHelper::GetRatingStar($model->devotion, 'devotion');?>
                                        </li>
                                        <li>
                                            <div class="tt-rating-title">На зв'язку</div>
                                            <?=MemberHelper::GetRatingStar($model->connected, 'connected');?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?=$form->field($model, 'connected')->hiddenInput()->label(false); ?>
                        <?=$form->field($model, 'devotion')->hiddenInput()->label(false); ?>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="simple-text size-3">
                            <p><b>За результатами спілкування ми...</b></p>
                        </div>
                        <div class="empty-space marg-lg-b20"></div>

                        <?=$form->field($model, 'meeting')->radioList([2 => 'відмінили зустріч', 1 => 'успішно зустрілися'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {
                                    $return = '<label class="checkbox-entry radio">';
                                    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" '.(($checked==1) ?  'checked' : '').'>';
                                    $return .= '<span>' . ucwords($label) . '</span>';
                                    $return .= '</label><div class="empty-space marg-lg-b10"></div>';
                                    return $return;
                                }
                            ])->label(false);


                        ?>


                        <div class="empty-space marg-lg-b30"></div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-push-6">
                                <?= Html::submitButton(($model->meeting==2) ? 'Зберегти' : 'Продовжити', ['class' => 'button type-1 size-3 color-3 uppercase tt-register-next', 'name' => 'step-1', "id"=>"submit_response", 'value'=>'submit']) ?>

                            </div>
                            <div class="col-sm-6 col-sm-pull-6">
                                <a href="<?=Url::toRoute(['/orders/default/detail', 'id' => $member->order->id])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад до замовлення</span></a>
                            </div>
                        </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
<?


echo $this->registerJsFile('/js/response.js', ['depends' => 'yii\web\JqueryAsset']);




?>
