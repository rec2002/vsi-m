﻿<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\components\MemberHelper;
use frontend\assets\AppAsset;
use common\models\Seo;
$seo = new Seo();

?>
    <div class="tt-header-margin" style="height: 55px;"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper padding0" style="height: 469px;">
                <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php

                        $model->setScenario('add-order');
                        $form = ActiveForm::begin(['id' => 'reg-customer',
                            'enableAjaxValidation'=>true,
                            'validateOnBlur'=> false,
                            'validateOnChange'=> false,
                            'validateOnType'=> false,
                            'validationDelay'=>300,
                            'validateOnSubmit'=> true,
                            'validationUrl'=>Url::toRoute('/members/customregistration/validation/?scenario=add-order'),
                            'action' =>['/members/customregistration/?scenario=add-order'],
                            'options' => ['enctype'=>'multipart/form-data']
                        ]);
                        ?>

                            <h3 class="h3">Додати замовлення</h3>
                            <div class="empty-space marg-lg-b30"></div>

<? if (@$suggested['total']>0) { ?>
    <div class="tt-news-task">
        <div class="simple-text size-3">
            <span class="tt-news-task-count">Вибрано <span><?= $suggested['total'] ?> <?=MemberHelper::NumberSufix($suggested['total'], array('майстра', 'майстри', 'майстрів'))?></span></span>
            <a class="tt-news-task-masters tt-icon-hover open-suggest" href="javascript:" data-rel="5">
                            <span class="tt-icon-entry">
                                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAAZlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkKZr9qgAAAAInRSTlMAYKcGQI81zsS3rysXx5+bl/zh18iKhXBWMR0Kv1xaShYBE04zmQAAAGJJREFUCNdNyUUWgDAMANGkWIUKLkXvf0kWkNDZ/TfA1eMJSV5ZvAnZpL2xSHLWiaFQn0Sxtlp0O6neMOiVdElcZM5PYlm9in5IBEczql9ZmLRggemNaTsSzE2vXAnMgEtkPdrDBKj0PuQ6AAAAAElFTkSuQmCC"
                                      alt="">
                                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAMAAAAolt3jAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGnRSTlMABmCnjjSZQMMWzrevK8ef/OHXyIVwW1YdSoUZvnoAAABYSURBVAjXTclXDoAgEADRpa0gvYr3v6iJgQ3z9zJAmfbCEdrACaw79GQWQxRS2iUhZ3aijC2jObp5SOnr1L2Ep2CkZn+t2Z0gga/e57IFT6o2KiAiV4z0AW2MA6Ezq1d1AAAAAElFTkSuQmCC"
                                      alt="">
                            </span>Редагувати</a>
            <div class="empty-space marg-lg-b30"></div>
        </div>
    </div>
<? } ?>






                            <div class="tt-autocomplete type-2">
                                <div class="tt-autocomplete-input">
                                    <?= $form->field($model, 'title')->textInput(['value'=>@Yii::$app->session['newCustomerSession']['title'], 'class' => 'form-input input-place simple-input', 'tabindex' => '1', 'autocomplete'=>'off', 'placeholder' => "Напишіть, що потрібно зробити? (Наприклад, ремонт квартири)", 'style' => 'margin-bottom: 0px;'])->label(false); ?>

                                </div>
                            </div>
                            <?= $form->field($model, 'descriptions')->textarea(['value'=>@Yii::$app->session['newCustomerSession']['descriptions'], 'class' => 'simple-input', 'tabindex' => '2', 'maxlength'=>'800', 'autocomplete'=>'off', 'placeholder' => "Опишіть завдання як омога детальніше, все що може бути корисно для майстрів (розміри, об’єм робіт, типи робіт, матеріали ... )", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>

                            <div class="tt-project-new-img ">
                                <div class="button-upload tt-icon-hover tt-img-upload">
                                        <span class="tt-icon-entry">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAclBMVEUAAAA7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZeykJCtAAAAJXRSTlMAKNBtnGHm1enbRBn3r6qhcx0T4ZllUj0zLse3k4AHlpJnWFUK0CMq7AAAAKdJREFUGNNNzVcShCAQBNAGFRF1zTlsnPtfcQlK0T9UveoeEGTkRSFqhOlpn6aDqoBiUsgBRe+AlnYVmcKT31TRwmib+xQf6YkxKoFRIunuIWvoAeRyx1pePy6W2ozjIOZasx3mmiL6XkNmWo3gqCkx9KLJUitS3YoMDaTAS3NLk2tBVsBsb3mCexs9rGmAS7dBtzp/y2SkWEUFP82PPoksRHz+0sHLH6CfC0vDb7GcAAAAAElFTkSuQmCC" alt="">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAe1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igC3rmZwAAAAKHRSTlMAbemc5dXRJmUrHRn326+qoXNhQZlSE9/Mx7eTgFpIPDMwB5aSZ1UKZrVu5QAAAKpJREFUGNNNjUcSgzAQBAcBIhgwGZMxTvv/F3olQKU+dk2ARSOTxCtgU9NYrRPllnKpQgxU9LFUdOtFuuAlL5XTM6Jhq33MwqggoIxvBELvKgYx3YGbGNFn52OkVdtJTBTplNrKOJU+4ND3LAYqFQuJgkowb1q1aj2fUw6YkCrIjFWqVAiFyIHt2pqhOQZiLhacOugGcMpsaRpyFyeRu3o0lCLx3P3nh8b8AUc2DFhDAdVcAAAAAElFTkSuQmCC" alt="">
                                        </span>
                                    Додати зображення
                                    <input type="file" data-name="CustomerRegistration" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                <div class="empty-space marg-lg-b10"></div>
                            </div>
                            <div class="empty-space marg-lg-b20"></div>

                            <div class="tt-input-label">Коли потрібно починати</div>

                            <div class="simple-input-icon" style="width:170px;">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" style="top: 28px;" alt="">
                                <?= $form->field($model, 'date_from')->textInput(['class' => 'simple-input',  'id'=>"sdate", 'autocomplete'=>'off',  'data-min-date'=>'0',  'placeholder' => "Виберіть дату", 'style' => 'margin-bottom: 0px;'])->label(false); ?>
                            </div>

                            <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-input-label">Виберіть бюджет</div>
                        <!-- SLIDER-RANGE -->

                        <?=\common\widgets\PriceSlider::widget(['model'=>$model, 'form'=>$form]) ?>

                        <div class="tt-input-label">Місцерозташування об`єкту</div>
                            <div class="tt-map-search-form">
                                <div class="row row10">
                                    <div class="col-sm-9">

                                        <?=$form->field($model, 'location')->textInput(['value'=>@Yii::$app->session['newCustomerSession']['location'], 'class' => 'simple-input size-1', "id"=>"tt-google-single-autocomplete-only", 'tabindex' => '4', 'autocomplete'=>'off', 'placeholder' => "Почніть вводити адресу", 'style' => 'margin-bottom: 0px;'])->label(false); ?>
                                        <?=$form->field($model, 'region')->hiddenInput(['value'=>@Yii::$app->session['newCustomerSession']['region'], 'id'=>'tt-google-single-autocomplete-region'])->label(false); ?>
                                        <div class="empty-space marg-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="tt-map-search button type-1 size-3 full color-3 uppercase" href="#">знайти на карті</a>
                                    </div>
                                </div>
                                <div class="simple-text size-2">
                                    <p>Пересуньте мітку у правильне місцерозташування об`єкту</p>
                                </div>
                                <div class="empty-space marg-lg-b15"></div>
                            </div>

                        <div id="map-canvas" class="style-3" data-lat="48.644031" data-lng="30.953243" data-zoom="6" data-draggable="1" data-geolocation="1"></div>
                        <div class="addresses-block">
                            <a class="marker" data-lat="49.507769" data-lng="32.133032" data-marker="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/img/map/marker_3.png"  data-string="<b>Пересуньте мітку у правильне місцерозташування об`єкту"></a>
                        </div>
                        <div class="empty-space marg-sm-b30 marg-lg-b35"></div>

                            <div class="row row130">
                                <div class="col-sm-9">
                                    <div class="tt-input-label">Як до Вас звертатись? (публікується)</div>
                                    <?= $form->field($model, 'first_name')->textInput(['class' => 'simple-input', 'tabindex' => '5', 'autocomplete'=>'off', 'placeholder' => "Введіть своє ім`я"])->label(false); ?>

                                    <div class="tt-input-label">Електронна адреса (не публікується)</div>
                                    <?=$form->field($model, 'email')->textInput(['class' => 'simple-input', 'tabindex' => '6', 'autocomplete'=>'off', 'placeholder' => "Введіть Email"])->label(false); ?>


                                    <div class="tt-input-label">Телефон (не публікується)</div>
                                    <div class="tt-fadein-top phone-reg-block" >
                                        <div class="row">
                                            <div class="col-sm-8 col-md-9">
                                                <?= $form->field($model, 'phone')->textInput(['type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '7',  'placeholder' => "+38 (ххх) ххх - хх - хх", 'data-phone'=>''])->label(false); ?>
                                                <div class="empty-space marg-xs-b20"></div>
                                            </div>
                                            <div class="col-sm-4 col-md-3">
                                                <a class="button type-1 size-3 full color-3 uppercase tt-phone-submit disabled" href="javascript:">Підтвердити</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-fadein-bottom">
                                        <div class="simple-text size-3"><span></span><span class="remove_added_file remove"> [X] </span></div>
                                        <div class="empty-space marg-lg-b15"></div>
                                        <div class="row">
                                            <div class="col-sm-8 col-md-9">
                                                <?= $form->field($model, 'confirm_sms')->textInput(['class' => 'simple-input', "id"=>"confirm_sms", 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>
                                                <div class="empty-space marg-xs-b20"></div>
                                            </div>
                                            <div class="col-sm-4 col-md-3">
                                                <a class="button type-1 size-3 full color-3 uppercase tt-phone-code-submit " href="javascript:">ОК</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="simple-text size-2">
                                        <p>Ніяких зайвих дзвінків! Жоден виконавець не побачить ваш номер, поки ви самі не передасьте його.</p>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <?

                                    if (@Yii::$app->session['newUserSession']['agree']==1) $model->agree = TRUE;
                                    echo $form->field($model, 'agree')->checkbox([
                                    'template' => '<label class="checkbox-entry blue-links tt-terms-checkbox">{input}<span>Із <a href="'.Url::to(['/site/privacy']).'"  target="_blank">"Правилами користування"</a> погоджуюсь</span></label><div>{error}</div>'
                                    ])
                                    ?>


                                    <div class="empty-space marg-lg-b45"></div>
                                    <?= Html::submitButton('<span>Додати завдання</span>', ['class' => 'button type-1 size-3 full color-3 uppercase', 'name' => 'create-order']) ?>
                                </div>
                                <div class="col-sm-3">
                                    <div class="text-center">
                                        <div class="empty-space marg-sm-b30 marg-lg-b40"></div>
                                        <div class="tt-devider vertical left"></div>
                                        <div class="empty-space marg-xs-b30"></div>
                                        <div class="simple-text size-2 bold-style-2 uppercase">
                                            <b>Або ввійти через</b>
                                        </div>
                                        <div class="empty-space marg-lg-b25"></div>
                                        <a href="javascript:" onclick="alert('UNDER CONSTRUCTION');" class="button type-1 btn-social single"><span></span></a>
                                        <div class="empty-space marg-xs-b0 marg-lg-b75"></div>
                                    </div>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>




<?
$gpJsLink= '//maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

echo $this->registerJs("(function(){
    $('body').on('keyup','#customerregistration-confirm_sms', function(event) {
        if ($(this).val()!='') {
            $(\".tt-fadein-link.tt-phone-code-submit\").removeClass('disabled');
		} else {
            $(\".tt-fadein-link.tt-phone-code-submit\").addClass('disabled');
		}
    });

})();" , \yii\web\View::POS_END );

echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);
echo $this->registerJsFile('/js/order.js', ['depends' => 'yii\web\JqueryAsset']);



?>

<? if (@$suggested['total']>0) { ?>
<div class="popup-wrapper">
    <div class="bg-layer"></div>
    <div class="popup-content" data-rel="5">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="empty-space marg-lg-b15"></div>
                <div class="tt-user-card-wrapper">
<? foreach ($suggested['members'] as $val) {?>
                    <div class="tt-user-card clearfix">
                        <img class="tt-user-card-img" src="<?=(!empty($val['avatar_image']) ? $val['avatar_image'] : '/img/person/person.png')?>" alt="">
                        <h5 class="tt-user-card-title h5"><?=$val['name']?></h5>
                        <div class="tt-user-card-remove" data-id="<?=$val['id']?>"></div>
                    </div>
<? } ?>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>
</div>
<? } ?>