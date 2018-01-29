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
                        $model->setScenario('step2');
                        $form = ActiveForm::begin(['id' => 'response-step-2', 'method' => 'post', 'enableClientValidation'=>true, 'action' =>Url::toRoute(['/members/response/create', 'id'=>$member->id])]);
                    ?>
                        <ul class="tt-popup-progress">
                            <li class="active done"><span>1</span></li>
                            <li class="active"><span>2</span></li>
                            <li><span>3</span></li>
                        </ul>
                        <div class="empty-space marg-lg-b30"></div>

                        <h4 class="h4">2.Виїзд на об'єкт</h4>
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
                                            <div class="tt-rating-title">Пунктуальність</div>
                                            <?=MemberHelper::GetRatingStar($model->punctuality, 'punctuality');?>
                                        </li>
                                        <li>
                                            <div class="tt-rating-title">Дотримання ціни</div>
                                            <?=MemberHelper::GetRatingStar($model->price, 'price');?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?=$form->field($model, 'punctuality')->hiddenInput()->label(false); ?>
                        <?=$form->field($model, 'price')->hiddenInput()->label(false); ?>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="simple-text size-3">
                            <p><b>За результатами спілкування ми...</b></p>
                        </div>
                        <div class="empty-space marg-lg-b20"></div>

                        <div class="tt-radio-switch">
                            <div class="tt-radio-switch-top">

                                <?=$form->field($model, 'meeting_result')->radioList([3 => 'не будемо починати роботи', 2 => 'відклали початок робіт', 1 => 'домовились і почали роботу'],
                                    [
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            $return = '<label class="checkbox-entry radio switch">';
                                            $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" '.(($checked==1) ?  'checked' : '').'>';
                                            $return .= '<span>' . ucwords($label) . '</span>';
                                            $return .= '</label><div class="empty-space marg-lg-b10"></div>';
                                            return $return;
                                        }
                                    ])->label(false);


                                ?>


                            </div>
                            <div class="tt-radio-switch-content">

                                <div class="tt-radio-switch-item <?=($model->meeting_result==3) ? 'active' : ''?> not_start">
                                    <div class="empty-space marg-lg-b30"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><b>Ваш коментар про зустріч з майстром</b></p>
                                        <p>Майстер не побачить Ваш коментар, його побачить тільки служба якості</p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>

                                    <?= $form->field($model, 'meeting_comment')->textarea(['class' => 'simple-input height-2'])->label(false);  ?>

                                </div>
                                <div class="tt-radio-switch-item dalay <?=($model->meeting_result==2) ? 'active' : ''?>">
                                    <div class="empty-space marg-lg-b30"></div>
                                    <div class="simple-text size-3 space7">
                                        <p><b>Запланована дата початку роботи</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="simple-input-icon">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">

                                                <?= $form->field($model, 'date_continue')->textInput(['value'=>($model->date_continue!='0000-00-00 00:00:00') ? date('d.m.Y', (strtotime($model->date_continue))) : date('d.m.Y'), 'class' => 'simple-input simple-datapicker',  'placeholder' => "Виберіть дату"])->label(false); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-radio-switch-item start" ></div>
                            </div>
                        </div>
                    <div class="empty-space marg-lg-b30"></div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <?= Html::submitButton(($model->meeting_result==3) ? 'Завершити' : 'Продовжити', ['class' => 'button type-1 size-3 color-3 uppercase tt-register-next', 'name' => 'step-2', "id"=>"submit_response", 'value'=>'submit']) ?>

                        </div>
                        <div class="col-sm-6 col-sm-pull-6">
                            <a href="<?=Url::to(['/members/response/create', 'id' => Yii::$app->request->get('id'), 'step'=>1])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад</span></a>
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