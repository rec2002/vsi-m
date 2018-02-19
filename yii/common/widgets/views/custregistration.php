<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<?php

    $model->setScenario('home-page');
    $form = ActiveForm::begin(['id' => 'reg-customer-home',
    'enableAjaxValidation'=>false,
    'validateOnBlur'=> false,
    'validateOnChange'=> false,
    'validateOnType'=> false,
    'validateOnSubmit'=> true,	
    'validationUrl'=>Url::toRoute('/members/customregistration/validation/?scenario=home-page' ),
    'action' =>[(Yii::$app->user->isGuest) ? '/members/customregistration/?scenario=home-page' : '/orders/default/addorder',
    ]]);
?>

    <h1 class="tt-banner-title h2">Замовте послуги майстрів по ремонту</h1>
    <div class="simple-text size-4 darker">
        <p>Добавте замолення, щоб отримати пропозиції від зацікавлених майстрів</p>
    </div>
    <?= $form->field($model, 'title')->textInput(['class' => 'form-input input-place  simple-input light', 'tabindex' => '1', 'autocomplete'=>'off', 'style' => 'margin-bottom: 0px;'])->label("Напишіть, що потрібно зробити? (Наприклад, ремонт квартири)"); ?>

    <?= $form->field($model, 'descriptions')->textarea(['class' => 'form-input input-place  simple-input height-4 light', 'tabindex' => '2', 'maxlength'=>'800', 'autocomplete'=>'off', 'style' => 'margin-bottom: 10px;'])->label("Опишіть завдання як омога детальніше, все що може бути корисно для майстрів (розміри, об’єм робіт, типи робіт, матеріали ... )");  ?>

    <div class="row row10">
        <div class="col-sm-6 col-lg-7">
            <div class="simple-input-icon">
                <?=$form->field($model, 'location')->textInput(['class' => 'form-input input-place simple-input light', "id"=>"tt-google-single-autocomplete-only", 'tabindex' => '3', 'autocomplete'=>'off', 'placeholder' => "",  'style' => 'margin-bottom: 0px;'])->label("Вкажіть адресу"); ?>
                <?=$form->field($model, 'region')->hiddenInput(['id'=>'tt-google-single-autocomplete-region'])->label(false); ?>
            </div>
        </div>
        <div class="col-sm-6 col-lg-5">
            <?= Html::submitButton('<span></span>Додати замовлення', ['class' => 'button type-1 size-3 full color-3 uppercase button-plus', 'name' => 'reg-customer']) ?>
        </div>
    </div>
<?php ActiveForm::end();


$this->registerCss("

p.help-block.help-block-error{margin-bottom: 5px; margin-top: 10px;}
.form-group {margin-bottom: 10px;}
#tt-google-single-autocomplete-only {
 background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAUCAMAAACzvE1FAAAAV1BMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkLkTjgbAAAAHHRSTlMA3Z2EEHekmIsV1s9Q5KwF9sq5tWhDQTcdCmZiOw521AAAAI1JREFUGBkFwYVhw0AABDA9mJ04TL3956wEPnNJyvwBGJJtmrZkAGqmDktNhSF/AL8M9Iw4huHAOd0c9JKUzpHmtGLMsmTEWmTC9cLlihqZ8Mq25YUapxX2UnZYT1q+AHzT9IwAjOm0vAHeaVACkAKW3IBbFmDPDHN2gJYHjzQAap7PVAA4J2cA4H4H/AMiuQhmojIjvwAAAABJRU5ErkJggg==\");
 background-repeat: no-repeat;
 background-position: 17px center;}
  
.form-group {position: relative;}
.control-label {position: absolute;left: 16px; right: 16px; top: 17px;display: block;color: #6c7076;z-index: 10;-webkit-transition: font-size 150ms ease-out, -webkit-transform 150ms ease-out;transition: font-size 150ms ease-out, -webkit-transform 150ms ease-out;transition: transform 150ms ease-out, font-size 150ms ease-out;transition: transform 150ms ease-out, font-size 150ms ease-out, -webkit-transform 150ms ease-out;}
.focused .control-label {-webkit-transform: translateY(-125%);transform: translateY(-125%);font-size: .75em; white-space: nowrap; overflow: hidden;}
.simple-input-icon img {z-index: 15;}
.simple-input-icon .control-label {left: 44px; top: 20px;}
.control-label {font-size:16px;}

  
  
");
?>

<?

$gpJsLink= '//maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);

?>
