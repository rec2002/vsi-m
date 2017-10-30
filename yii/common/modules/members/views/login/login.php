<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;
$this->title = 'Вхід на сайт';
?>
    <div class="tt-header-margin"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper padding0" style="height: 626px;">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
                        <div class="row row130">
                            <div class="col-sm-6">
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                    <h4 class="h3">Вхід на сайт</h4>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <?= Alert::widget() ?>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <?= $form->field($model, 'email')->textInput(['class' =>'simple-input', 'placeholder'=>'Введіть email'])->label(false); ?>
                                    <?= $form->field($model, 'password')->passwordInput(['class' => 'simple-input',   'placeholder' => "Введіть пароль"])->label(false); ?>
                                    <div class="row vertical-middle">
                                        <div class="col-sm-12">
                                            <?= Html::submitButton('<span>вхід в кабінет</span>', ['class' => 'button type-1 size-3 color-3 full uppercase', 'name' => 'login']) ?>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b25"></div>
                                    <div class="simple-text size-3 grey-links">
                                        <p><a href="<?=Url::to(['/members/login/reset'])?>">Забули пароль?</a></p>
                                    </div>
                                    <div class="empty-space marg-xs-b30 marg-lg-b35"></div>
                                    <div class="tt-popup-devider">
                                        <span>або</span>
                                    </div>
                                    <div class="empty-space marg-xs-b30 marg-lg-b35"></div>
                                    <a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;" class="button type-1 btn-social"><span>вхід через facebook</span></a>
                                <?php ActiveForm::end(); ?>
                                <div class="empty-space marg-xs-b30"></div>
                                <div class="tt-devider vertical"></div>
                                <div class="empty-space marg-xs-b30"></div>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="h5">Вперше на ВсіМайстри</h5>
                                <div class="empty-space marg-lg-b30"></div>
                                <div class="simple-text size-2 blue-links small-space">
                                    <p><a href="<?=Url::to(['/members/customregistration/create'])?>">Додати замовлення</a> - якщо шукаєте виконавця робіт</p>
                                    <p><a href="<?=Url::to(['/members/registration'])?>">Зареєструватись як майстер</a> - якщо шукаєте замовлення</p>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
<?php
 $this->registerCss('p.help-block.help-block-error {margin-top: 10px;}');
?>
