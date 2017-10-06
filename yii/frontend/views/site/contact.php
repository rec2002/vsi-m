<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакти';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'description', 'content' => 'Description 1',], 'description');


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
                        <p>Багатоканальний телефон: <a href="tel:88005552323">8 800 555 23 23</a></p>
                        <p>Email: <a href="mailto:Office@vsimajstry.com.ua">Office@vsimajstry.com.ua</a></p>
                        <p>Адреса: <b>м. Київ, пр. Незалежності 5 / 16</b></p>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>

                    <div class="tt-footer-social style-2">
                        <div class="tt-footer-social-label">Ми в соцмережах:</div>
                        <ul class="tt-social">
                            <li>
                                <a href="#">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
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
                    <div class="tt-contact-form">
                        <form data-rel="4">
                            <input class="simple-input" type="text" name="name"  required="" placeholder="Ваше ім’я *">
                            <div class="row row10">
                                <div class="col-sm-6">
                                    <input class="simple-input" type="tel" name="phone" placeholder="Контактний телефон">
                                </div>
                                <div class="col-sm-6">
                                    <input class="simple-input" type="email" name="email" required="" placeholder="Email *">
                                </div>
                            </div>
                            <div class="row row10">
                                <div class="col-sm-6">
                                    <div class="simple-select">
                                        <select name="department">
                                            <option selected disabled>Відділ</option>
                                            <option value="">Відділ №1</option>
                                            <option value="">Відділ №2</option>
                                            <option value="">Відділ №3</option>
                                            <option value="">Відділ №4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input class="simple-input" type="text" name="subject" required="" placeholder="Тема повідомлення *">
                                </div>
                            </div>
                            <textarea class="simple-input height-3" name="message" required="" placeholder="Повідомлення *"></textarea>
                            <div class="button type-1 size-3 color-3">Надіслати повідомлення <input type="submit"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
    </div>
</div>
