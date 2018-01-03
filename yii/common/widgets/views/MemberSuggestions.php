<?
use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(['id' => 'suggestion', 'fieldConfig' => ['options' => ['tag' => false]], 'enableClientValidation'=>true]); ?>
<div class="tt-task-request">
    <div class="tt-fadein-top">
        <a href="javascript:" class="tt-fadein-link button type-1">Надіслати пропозицію</a>

<? if (@Yii::$app->user->identity->balance==0) {?>
        <div class="tt-task-message">
            <div class="simple-text size-3">
                <p>Необхідно <a href="<?=Url::to(['/members/member/billing'])?>">поповнити баланс</a></p>
            </div>
            <div class="tt-info-btn tt-tooltip" data-tooltip="Ваш баланс становить <?=number_format(Yii::$app->user->identity->balance, 2 , ',' , ' ')?> грн">?</div>
        </div>
<? } ?>
    </div>

    <div class="tt-fadein-bottom">
        <!-- TT-PROPOSITION -->
        <div class="row">
            <div class="col-sm-5 col-md-6">
                <h5 class="h5">Ціна за всю роботу</h5>
                <div class="empty-space marg-lg-b10"></div>
                <div class="tt-proposition-dates">
                    від
                    <?=$form->field($model, 'price_from')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9', 'clientOptions' => ['repeat' => 10, 'greedy' => false]
                    ])->textInput(["class" => "simple-input single",  'autocomplete'=>"off"])->label(false)->error(false); ?>
                     до
                    <?=$form->field($model, 'price_to')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9', 'clientOptions' => ['repeat' => 10, 'greedy' => false]
                    ])->textInput(["class" => "simple-input single", 'autocomplete'=>"off"])->label(false)->error(false); ?>
                     грн
                     <p class="help-block help-block-error" id="price_range" ></p>
                </div>
                <div class="empty-space marg-lg-b5"></div>

                <h5 class="h5">Строк виконання роботи</h5>
                <div class="empty-space marg-lg-b10"></div>
                <div class="tt-proposition-dates">
                    від
                    <?=$form->field($model, 'start_from')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9', 'clientOptions' => ['repeat' => 5, 'greedy' => false]
                    ])->textInput(["class" => "simple-input single",  'autocomplete'=>"off"])->label(false)->error(false); ?>
                    до
                   <?=$form->field($model, 'start_to')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9', 'clientOptions' => ['repeat' => 5, 'greedy' => false]
                    ])->textInput(["class" => "simple-input single",  'autocomplete'=>"off"])->label(false)->error(false); ?>
                    днів
                    <p class="help-block help-block-error" id="start_range" ></p>
                </div>
                <div class="empty-space marg-xs-b20"></div>
            </div>
            <div class="col-sm-7 col-md-6">

                <? echo $form->field($model, 'prepayment')->checkbox([
                    'template' => '<label class="checkbox-entry">{input}<span>Починаю роботу без предоплати</span></label><div>{error}</div>'
                ])
                ?>
                <div class="empty-space marg-lg-b5"></div>
                <? echo $form->field($model, 'prepayment_material')->checkbox([
                    'template' => '<label class="checkbox-entry">{input}<span>Не беру предоплату за матеріали</span></label><div>{error}</div>'
                ])
                ?>
                <div class="empty-space marg-lg-b5"></div>
                <div class="checkbox-entry-toggle">
                    <? echo $form->field($model, 'payment_object_checkbox')->checkbox([
                        'template' => '<label class="checkbox-entry toggle">{input}<span></span></label>'
                    ])
                    ?>
                    <span class="checkbox-entry-unchecked">Виїзд на об'єкт платний</span>
                    <span class="checkbox-entry-checked">Виїзд на об'єкт платний
                        <?=$form->field($model, 'payment_object')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9', 'clientOptions' => ['repeat' => 5, 'greedy' => false]
                        ])->textInput(["class" => "simple-input single", 'autocomplete'=>"off"])->label(false)->error(false); ?>
                         грн </span>

                </div>
                <p class="help-block help-block-error" id="payment_object" ></p>
                <div class="empty-space marg-lg-b30"></div>

                <div class="simple-input-icon">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="" style="top: 29px;">
                    <?= $form->field($model, 'dates')->textInput(['class' => 'simple-input simple-datapicker-multi', 'data-min-date'=>0, 'autocomplete'=>'off', 'placeholder' => "Зручні дати виїзду на об'єкт"])->label(false); ?>
                </div>
                <div class="empty-space marg-lg-b15"></div>
                <label class="checkbox-entry">

                    <? echo $form->field($model, 'come_personally')->checkbox([
                        'template' => '<label class="checkbox-entry">{input}<span>Я приїду особисто</span></label><div>{error}</div>'
                    ])
                    ?>
                </label>
            </div>
        </div>
        <div class="empty-space marg-lg-b30"></div>

        <h5 class="h5">Додаткова інформація і питання до замовника</h5>
        <div class="empty-space marg-lg-b10"></div>
        <?= $form->field($model, 'descriptions')->textarea([ 'class' => 'simple-input height-4', 'maxlength'=>'800', 'placeholder' => "Повідомлення", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>
        <div class="empty-space marg-lg-b30"></div>

        <div class="row vertical-middle">
            <div class="col-sm-8">
                <div class="checkbox-entry-toggle">
                    <? echo $form->field($model, 'proposal')->checkbox([
                        'template' => '<label class="checkbox-entry toggle">{input}<span></span></label>'
                    ])
                    ?>

                    <span class="checkbox-entry-unchecked">Встановити термін дії пропозиції</span>
                    <span class="checkbox-entry-checked">
                        Пропозиція діє
                        <?=$form->field($model, 'valid_days')->widget(\yii\widgets\MaskedInput::className(), [
                             'mask' => '9', 'clientOptions' => ['repeat' => 10, 'greedy' => false]
                        ])->textInput(["class" => "simple-input single",  'autocomplete'=>"off"])->label(false)->error(false); ?>
                        днів
                        <?=$form->field($model, 'valid_hours')->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '9', 'clientOptions' => ['repeat' => 10, 'greedy' => false]
                        ])->textInput(["class" => "simple-input single", 'autocomplete'=>"off"])->label(false)->error(false); ?>
                        годин
                        </span>
                </div>
                <p class="help-block help-block-error" id="proposal" ></p>
                <div class="empty-space marg-xs-b30"></div>
            </div>
            <!--<div class="col-sm-4">
                <div class="simple-select">
                    <select>
                        <option selected>+38 (067) 555-4326</option>
                        <option value="">+38 (093) 7541-1543</option>
                        <option data-link="professionals-profile.html" value="">Управління контактами</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="empty-space marg-lg-b30"></div>
      <?= Html::submitButton('Надіслати пропозицію', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'save']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>


<?
$bundle = AppAsset::register(Yii::$app->view);
$bundle->js[] = '/js/swiper.jquery.min.js';
$bundle->js[] = '/js/jquery.sumoselect.min.js';
$bundle->js[] = '/js/jquery-ui.min.js';
$bundle->js[] = '/js/datepicker-uk.js';
$bundle->js[] = '/js/jquery-ui.multidatespicker.js';
$bundle->js[] = '/js/order.js';
?>