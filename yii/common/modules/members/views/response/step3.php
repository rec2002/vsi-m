<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MemberHelper;
use kartik\select2\Select2;

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
                    $model->setScenario('step3');
                    $form = ActiveForm::begin(['id' => 'response-step-3', 'method' => 'post', 'enableClientValidation'=>true, 'options' => ['enctype'=>'multipart/form-data'], 'action' =>Url::toRoute(['/members/response/create', 'id'=>$member->id])]);
                    ?>
                        <ul class="tt-popup-progress">
                            <li class="active done"><span>1</span></li>
                            <li class="active done"><span>2</span></li>
                            <li class="active"><span>3</span></li>
                        </ul>
                        <div class="empty-space marg-lg-b30"></div>

                        <h4 class="h4">2.Робота</h4>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="simple-text size-3 space7">
                            <p><b>На якому етапі Ви знаходитесь?</b></p>
                        </div>
                        <div class="empty-space marg-lg-b20"></div>

                        <div class="tt-radio-switch">
                            <div class="tt-radio-switch-top">

                                <?=$form->field($model, 'stage')->radioList([1 => 'робота в процесі', 2 => 'робота завершена або зупинена'],
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

                                <div class="empty-space marg-lg-b30"></div>
                            </div>
                            <div class="tt-radio-switch-content">
                                <div class="tt-radio-switch-item in_progress <?=($model->stage==1) ? 'active' : ''?>" >
                                    <div class="simple-text size-3 space7">
                                        <p><b>Скільки днів залишилось до завершення?(приблизно)</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="simple-input-vertical">
                                        <?= $form->field($model, 'days', [ 'template' => '
                                        <div class="simple-input-vertical">
                                            {input}
                                            <div class="simple-input-label simple-text size-2">
                                                <p>днів</p>
                                            </div>
                                        </div>{error}'])->widget(\yii\widgets\MaskedInput::className(), [
                                            'mask' => '999',
                                            'clientOptions' => ['repeat' => 3, 'greedy' => true, 'removeMaskOnSubmit'=> true]
                                        ])->textInput(['value'=>($model->days==0) ? '': $model->days, 'class' => 'simple-input single', 'autocomplete'=>"off"])->label(false); ?>
                                    </div>
                                </div>
                                <div class="tt-radio-switch-item finish <?=($model->stage==2) ? 'active' : ''?>" >
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
                                                        <div class="tt-rating-title">Дотримання термінів </div>
                                                        <?=MemberHelper::GetRatingStar($model->terms, 'terms');?>
                                                    </li>
                                                    <li>
                                                        <div class="tt-rating-title">Ціна/Якість</div>
                                                        <?=MemberHelper::GetRatingStar($model->quality, 'quality');?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?=$form->field($model, 'terms')->hiddenInput(['value'=>($model->terms==0) ? '' : $model->terms])->label(false); ?>
                                    <?=$form->field($model, 'quality')->hiddenInput(['value'=>($model->quality==0) ? '' : $model->quality])->label(false); ?>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Загальне враження</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="checkbox-inline">

                                        <?=$form->field($model, 'positive_negative')->radioList([1 => 'Позитивне', 2 => 'негативне'],
                                            [
                                                'item' => function($index, $label, $name, $checked, $value) {
                                                    if ($value==1) {
                                                        $return = '<label class="checkbox-entry radio like">';
                                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . (($checked == 1) ? 'checked' : '') . '>';
                                                        $return .= '<span class="tt-response good"><i class="tt-icon like green"></i><span>' . ucwords($label) . '</span></span>';
                                                    } else if($value==2) {
                                                        $return = '<label class="checkbox-entry radio dislike">';
                                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . (($checked == 1) ? 'checked' : '') . '>';
                                                        $return .= '<span class="tt-response bad"><i class="tt-icon dislike red"></i><span>' . ucwords($label) . '</span></span>';
                                                    }
                                                    $return .= '</label>';
                                                    return $return;
                                                }
                                            ])->label(false);
                                        ?>


                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Замовник особисто був(ла) на об'єкті?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="tt-radio-switch">
                                        <div class="tt-radio-switch-top">
                                            <div class="checkbox-inline">
                                                <?=$form->field($model, 'come_personality')->radioList([1 => 'так', 2 => 'ні'],
                                                    [
                                                        'item' => function($index, $label, $name, $checked, $value) {
                                                            $return = '<label class="checkbox-entry radio switch">';
                                                            $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" '.(($checked==1) ?  'checked' : '').'>';
                                                            $return .= '<span>' . ucwords($label) . '</span>';
                                                            $return .= '</label>';
                                                            return $return;
                                                        }
                                                    ])->label(false);
                                                ?>


                                            </div>
                                        </div>
                                        <div class="tt-radio-switch-content">
                                            <div class="tt-radio-switch-item <?=($model->come_personality==1) ? 'active' : ''?> personally" >
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="empty-space marg-lg-b30"></div>
                                                        <div class="tt-input-wrapper style-2 color-2">
                                                            <div class="tt-input-label">Роль в роботах</div>
                                                            <div class="tt-input-entry">
                                                                <div class="simple-select task-duration">

                                                                <?
                                                                    echo $form->field($model, 'role')->widget(Select2::classname(), [
                                                                    'data' => array('Особисто виконував роботу', 'Керував бригадою'),
                                                                    'language' => 'uk',
                                                                    'hideSearch' => true,
                                                                    'size' => Select2::LARGE,
                                                                    'theme' => Select2::THEME_BOOTSTRAP,
                                                                    'options' => ['placeholder' => 'Вибрати форму роботи'],
                                                                    'pluginOptions' => [
                                                                    'allowClear' => false
                                                                    ],
                                                                    ])->error(false); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-radio-switch-item" data-switch="not_personally">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Ваш відгук (буде опублікований на сторінці майстра і на вашій особистій сторінці)</b></p>
                                        <p>Будь ласка, будьте ввічливі і коректні, інакше відгук буде відхилений без перевірки</p>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Що сподобалось?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <?= $form->field($model, 'positive_note')->textarea(['class' => 'simple-input size-2 height-2'])->label(false);  ?>
                                    <div class="empty-space marg-lg-b10"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Що не сподобалось?</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <?= $form->field($model, 'negative_note')->textarea(['class' => 'simple-input size-2 height-2'])->label(false);  ?>
                                    <div class="empty-space marg-lg-b10"></div>

                                    <div class="simple-text size-3 space7">
                                        <p><b>Загальний висновок</b></p>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <?= $form->field($model, 'conclusion_note')->textarea(['class' => 'simple-input size-2 height-2'])->label(false);  ?>
                                    <div class="empty-space marg-lg-b10"></div>


                                   <div class="tt-project-new-img">
                                        <div class="button-upload tt-icon-hover tt-img-upload">
                                                <span class="tt-icon-entry">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAclBMVEUAAAA7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZeykJCtAAAAJXRSTlMAKNBtnGHm1enbRBn3r6qhcx0T4ZllUj0zLse3k4AHlpJnWFUK0CMq7AAAAKdJREFUGNNNzVcShCAQBNAGFRF1zTlsnPtfcQlK0T9UveoeEGTkRSFqhOlpn6aDqoBiUsgBRe+AlnYVmcKT31TRwmib+xQf6YkxKoFRIunuIWvoAeRyx1pePy6W2ozjIOZasx3mmiL6XkNmWo3gqCkx9KLJUitS3YoMDaTAS3NLk2tBVsBsb3mCexs9rGmAS7dBtzp/y2SkWEUFP82PPoksRHz+0sHLH6CfC0vDb7GcAAAAAElFTkSuQmCC" alt="">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAe1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igC3rmZwAAAAKHRSTlMAbemc5dXRJmUrHRn326+qoXNhQZlSE9/Mx7eTgFpIPDMwB5aSZ1UKZrVu5QAAAKpJREFUGNNNjUcSgzAQBAcBIhgwGZMxTvv/F3olQKU+dk2ARSOTxCtgU9NYrRPllnKpQgxU9LFUdOtFuuAlL5XTM6Jhq33MwqggoIxvBELvKgYx3YGbGNFn52OkVdtJTBTplNrKOJU+4ND3LAYqFQuJgkowb1q1aj2fUw6YkCrIjFWqVAiFyIHt2pqhOQZiLhacOugGcMpsaRpyFyeRu3o0lCLx3P3nh8b8AUc2DFhDAdVcAAAAAElFTkSuQmCC" alt="">
                                                </span>
                                            Додати зображення
                                            <input type="file" data-name="MemberResponse" accept="image/x-png,image/gif,image/jpeg">

                                        </div>
                                        <div class="empty-space marg-lg-b10"></div>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="tt-input-wrapper style-2 color-2">
                                                <div class="tt-input-label">Виконавець робіт по договору</div>
                                                <div class="tt-input-entry">
                                                    <?=$form->field($model, 'performer')->textInput(['class' => 'simple-input', 'placeholder' => "Наприклад ТОВ `Ремонт`"])->label(false); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

                                    <!--<div class="button-upload tt-icon-hover tt-file-upload">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAclBMVEUAAAA7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZeykJCtAAAAJXRSTlMAKNBtnGHm1enbRBn3r6qhcx0T4ZllUj0zLse3k4AHlpJnWFUK0CMq7AAAAKdJREFUGNNNzVcShCAQBNAGFRF1zTlsnPtfcQlK0T9UveoeEGTkRSFqhOlpn6aDqoBiUsgBRe+AlnYVmcKT31TRwmib+xQf6YkxKoFRIunuIWvoAeRyx1pePy6W2ozjIOZasx3mmiL6XkNmWo3gqCkx9KLJUitS3YoMDaTAS3NLk2tBVsBsb3mCexs9rGmAS7dBtzp/y2SkWEUFP82PPoksRHz+0sHLH6CfC0vDb7GcAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAe1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igC3rmZwAAAAKHRSTlMAbemc5dXRJmUrHRn326+qoXNhQZlSE9/Mx7eTgFpIPDMwB5aSZ1UKZrVu5QAAAKpJREFUGNNNjUcSgzAQBAcBIhgwGZMxTvv/F3olQKU+dk2ARSOTxCtgU9NYrRPllnKpQgxU9LFUdOtFuuAlL5XTM6Jhq33MwqggoIxvBELvKgYx3YGbGNFn52OkVdtJTBTplNrKOJU+4ND3LAYqFQuJgkowb1q1aj2fUw6YkCrIjFWqVAiFyIHt2pqhOQZiLhacOugGcMpsaRpyFyeRu3o0lCLx3P3nh8b8AUc2DFhDAdVcAAAAAElFTkSuQmCC" alt="">
                                            </span>
                                        Прикріпити скан договору або розписки (не обов'язково)
                                        <input type="file">
                                    </div>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <div class="simple-text tt-file-info"></div>-->


                                    <?

                                    echo $form->field($model, 'dogovir')->checkbox([
                                        'template' => '<label class="checkbox-entry">{input}<span>Договір не підписували</span></label><div>{error}</div>'
                                    ])?>

                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <?= Html::submitButton((($model->stage==2) ? 'Завершити' : 'Продовжити'), ['class' => 'button type-1 size-3 color-3 uppercase', 'id'=>'submit_response', 'name' => 'step-3', 'value'=>'submit']) ?>
                       &nbsp; <?= Html::submitButton('Дописати відгук потім', ['class' => 'button type-1 size-3  uppercase', 'id'=>'cancel_response', 'name' => 'step-3', 'value'=>'cancel', 'style'=>(($model->stage==2) ? 'display:none;' : 'display:inline;')]) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
<?
echo $this->registerJsFile('/js/response.js', ['depends' => 'yii\web\JqueryAsset']);
?>