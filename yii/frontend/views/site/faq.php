<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Питання та відповіді';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tt-header-margin"></div>

<div class="tt-pageform-wrapper padding0">
    <div class="tt-bg-grey">
        <div class="empty-space marg-sm-b40 marg-lg-b70"></div>
        <div class="container">
            <h2 class="tt-banner-title h2 small text-center">Питання та відповіді</h2>
            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>



            <?=\common\widgets\faq::widget(array('id' => '0')) ?>


        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
        <div class="tt-devider"></div>
    </div>
    <div class="container">
        <div class="empty-space marg-sm-b30 marg-lg-b60"></div>
        <h2 class="h2 text-center">Не знайшли відповіді?</h2>
        <div class="empty-space marg-lg-b30"></div>
        <div class="text-center">
            <a href="" class="button type-1 size-4 color-3 uppercase open-popup" data-rel="3">Задайте своє питання</a>
        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
    </div>
</div>


<div class="popup-wrapper">
    <div class="bg-layer"></div>
    <div class="popup-content" data-rel="3">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="tt-send-question-form">
                    <form data-rel="4">
                        <h4 class="h4 text-center"><small>Задати питання</small></h4>
                        <div class="empty-space marg-lg-b30"></div>
                        <input class="simple-input" type="text" required="" name="name" placeholder="Ваше ім’я *">
                        <div class="empty-space marg-lg-b10"></div>
                        <input class="simple-input" type="email" required="" name="email" placeholder="Email *">
                        <div class="empty-space marg-lg-b10"></div>
                        <textarea class="simple-input height-2" name="message" placeholder="Яке ваше питання? *"></textarea>
                        <div class="empty-space marg-lg-b20"></div>
                        <div class="text-right">
                            <div class="button type-1 size-3 color-3 uppercase"><span>надіслати</span><input type="submit"></div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>
    <div class="popup-content" data-rel="4">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="empty-space marg-lg-b35"></div>
                <h4 class="h4 text-center">Ваше питання надіслано</h4>
                <div class="empty-space marg-lg-b15"></div>
                <div class="simple-text size-4 text-center">
                    <p>Наші експерти дадуть відповідь якомога швидше</p>
                </div>
                <div class="empty-space marg-lg-b30"></div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>
</div>