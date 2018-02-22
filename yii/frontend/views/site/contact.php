<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;
use common\models\Seo;
$seo = new Seo();
$this->params['breadcrumbs'][] = $this->title;



?>


<div class="tt-header-margin"></div>

<div class="tt-bg-grey">
    <div class="tt-pageform-wrapper padding0">
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
        <div class="container">
            <h2 class="tt-banner-title h2 small text-center">Контакти</h2>
            <div class="empty-space marg-sm-b40 marg-lg-b70"></div>
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="h4">Наші контакти</h4>
                    <div class="empty-space marg-lg-b20"></div>
                    <!-- tt-contact -->
                    <div class="tt-contact">
                        <p>Багатоканальний телефон: <a href="tel:88005552323" style="white-space: nowrap;">8 800 555 23 23</a></p>
                        <p>Email: <a href="mailto:Office@vsimajstry.com.ua">Office@vsimajstry.com.ua</a></p>
                        <p>Адреса: <b>м. Київ, пр. Незалежності 5 / 16</b></p>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>

                    <div class="tt-footer-social style-2">
                        <div class="tt-footer-social-label">Ми в соцмережах:</div>
                        <ul class="tt-social">
                            <li>
                                <a href="https://www.facebook.com/Виконроб-177988659475902/" target="_blank">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCKuf5iGPRJPfOiFt0mazdjQ" target="_blank">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAMFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkL9SS24AAAAD3RSTlMA8ar2FOsaJ4J2YUbomFmePvt7AAAAWUlEQVQoz2MYBdgAm+J/MBBKQBJ0/Q8FIUiC+jDBT0iC8jDBj0iC9v///+oHCX5GVfmd/T5MJULwNwPLZCyCDI8xBL+z9GCxaCLMIkwnEXI8wpvYA2QUYAEAROhw+W9H9KAAAAAASUVORK5CYII=" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAKlBMVEUAAAD///////////////////////////////////////////////////+Gu8ovAAAADXRSTlMA8ar2FOsaXieCdkaY2mYu3wAAAFlJREFUKM9jGAXYAJviXTAQSkASdL0LBSFIgrowwUtIgrIwwYtIgrZ3716fCxK8jKryBsdZmEqE4G0GlsVYBBmKMQRvsEzFYtFCmEWYTiLkeIQ3sQfIKMACAMW+YqMi/OZzAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>
                </div>
                <div class="col-sm-7">
                    <h4 class="h4">Написати повідомлення</h4>
                    <div class="empty-space marg-lg-b20"></div>
                    <?= Alert::widget() ?>

                    <div class="tt-contact-form">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' =>['site/contact']]); ?>
                            <?= $form->field($model, 'name')->textInput(['class' => 'simple-input', 'placeholder' => "Ваше ім’я *"])->label(false); ?>
                            <div class="row row10">
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'phone')->textInput(['class' => 'simple-input', 'placeholder' => "Контактний телефон"])->label(false); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'email')->textInput(['class' => 'simple-input', 'placeholder' => "Email *"])->label(false); ?>
                                </div>
                            </div>
                            <div class="row row10">
                                <div class="col-sm-12">
                                    <?= $form->field($model, 'subject')->textInput(['class' => 'simple-input', 'placeholder' => "Тема повідомлення *"])->label(false); ?>
                                </div>
                            </div>

                             <?= $form->field($model, 'message')->textarea(['rows' => 6, 'class' => 'simple-input height-3', 'placeholder' => "Повідомлення *"])->label(false); ?>


                            <?= Html::submitButton('Надіслати повідомлення', ['class' => 'button type-1 size-3 color-3', 'name' => 'contact-button']) ?>

                        <?php ActiveForm::end(); ?>


                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
    </div>
</div>
