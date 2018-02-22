<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;
use kartik\select2\Select2;
use common\components\MemberHelper;
use common\models\Seo;
$seo = new Seo();

?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 445px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/portfolio/list'])?>"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/billing'])?>" ><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <div class="tabs-block style-4">
                            <div class="tab-nav">
                                <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/billing'])?>" >Доступ до замовлень</a>
                                <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billinghistory'])?>" >Рух коштів</a>
                                <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billingpayment'])?>" >Списання коштів</a>
                            </div>
                            <div class="tab-entry" style="display: block;">
                                <?php
                                $form = ActiveForm::begin(['id' => 'add-billing',
                                    'enableAjaxValidation'=>false,
                                    'validationUrl'=>Url::toRoute('/orders/default/validation?mode=billing'),
                                    'action' =>['/members/member/billing']
                                ]);
                                ?>


                                <div class="tab-entry-box nopadding">

                                    <div class="tt-payment">
                                        <div class="row row10 vertical-middle">
                                            <div class="simple-text size-3">
                                                <?= Alert::widget() ?>
                                            </div>
                                            <div class="empty-space marg-lg-b20"></div>
                                        </div>

                                        <div class="row row10 vertical-middle">

                                            <div class="col-sm-3">
                                                <h5 class="tt-input-label">Мені потрібні замовлення</h5>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                            <?=\common\widgets\PriceSlider::widget(['model'=>$model, 'form'=>$form]) ?>
                                        </div>
                                    </div>
                                    <div class="tt-payment">
                                        <div class="row row10 vertical-middle">
                                            <div class="col-sm-3">
                                                <h5 class="tt-input-label">Сума поповнення</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row vertical-middle">
                                                    <div class="col-sm-6">
                                                        <div class="simple-select">
                                                            <?

                                                            echo $form->field($model, 'summa')->widget(Select2::classname(), [
                                                                'data' => MemberHelper::BILLING,
                                                                'language' => 'uk',
                                                                'hideSearch' => true,
                                                                'size' => Select2::LARGE,
                                                                'theme' => Select2::THEME_BOOTSTRAP,
                                                                'pluginOptions' => [
                                                                    'allowClear' => false
                                                                ],
                                                            ])->label(false);

                                                            ?>
                                                        </div>
                                                        <div class="empty-space marg-xs-b20"></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!--<div class="simple-text size-2">
                                                            <p>Виберіть більше і отримайте подарунок</p>
                                                        </div>-->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-payment">
                                        <div class="row row10 vertical-middle">
                                            <div class="col-sm-3">
                                                <h5 class="tt-input-label">Скільки контактів я отримаю</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="simple-text size-2">
                                                    <p><b>20</b> Контактів із б’юджетом до 10 000 грн. (Середній)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-payment">
                                        <div class="row row10 vertical-middle">
                                            <div class="col-sm-3">
                                                <h5 class="tt-input-label">Спосіб оплати</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="checkbox-entry radio">
                                                    <input type="radio" name="MemberBilling[payment_type]" value="1" checked><span><?=MemberHelper::PAYMENT[1]?></span>
                                                </label>
                                                <div class="empty-space marg-lg-b10"></div>
                                                <label class="checkbox-entry radio">
                                                    <input type="radio" name="MemberBilling[payment_type]" value="2"><span><?=MemberHelper::PAYMENT[2]?></span>
                                                </label>
                                                <div class="empty-space marg-lg-b10"></div>
                                                <label class="checkbox-entry radio">
                                                    <input type="radio"name="MemberBilling[payment_type]" value="3"><span><?=MemberHelper::PAYMENT[3]?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-payment">
                                        <div class="row row10 vertical-middle">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <?= Html::submitButton('<span>оплатити 1 000 грн.</span>', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'billing-add']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>

<?
    $this->registerCss(".slider-range.style-2 .slider-range-skew span{background: white;}");
    $this->registerJsFile('/js/billing.js', ['depends' => 'yii\web\JqueryAsset']);
?>