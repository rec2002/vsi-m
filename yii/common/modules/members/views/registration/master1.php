<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\checkbox\CheckboxX;
use frontend\assets\AppAsset;
$this->title = 'Реєстрація майстра';
?>

    <div class="tt-header-margin"></div>
    <div class="fixed-background" style="background-image:url(/img/bg/bg_4.jpg);">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper middle register" style="height: 827px;">
                <div class="tt-pageform tt-register">
                    <div class="row row60">
                        <div class="col-md-6 registration_mob">
                            <div class="tt-register-column left">
                                <h3 class="tt-register-title h3">Реєстрація нового майстра</h3>
                                <div class="tt-register-desc simple-text size-3">
                                    <p><b>Сайт «vykonrob.com.ua»</b> являється засобом для надійного пошуку замовлень по всій території  України.</p>

  <p>                                  <p>Реєстрація на сайті відкриває для виконавців замовлень наступні можливості:</p>
<ul class="list-item type-3">
    <li>доступний  широкий вибір категорій послуг для пошуку своєї ніші;</li>
    <li>відсутність оплати на протязі перших двох років за користування сайтом;</li>
    <li>робота в зручний для виконавця час, (Ви маєте змогу самостійно планувати свій робочий графік);</li>
    <li>швидкий контакт з замовником, (можливість вести переговори на рахунок поставленого завдання, термінів його виконання та регулювання цін за надання послуг).</li>
</ul>
    </p>  <p>Ви можете використовувати наш сайт для пошуку замовлень, як основне чи додаткове джерело доходу.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tt-register-column right">


                                <?php $form = ActiveForm::begin(['id' => 'reg-step-1',
                                    'enableAjaxValidation'=>true,
                                    'validationUrl'=>Url::toRoute('/members/registration/validation'),
                                    'action' =>['/members/registration',

                                    ]]); ?>
                                    <?echo $form->field($model, 'step')->hiddenInput(['value'=> 1])->label(false);?>
                                    <a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;" class="button type-1 btn-social"><span>реєстрація через facebook</span></a>
                                    <div class="tt-popup-devider">
                                        <span>або</span>
                                    </div>
                                    <div class="tt-register-inputs">
                                        <div class="row row10">
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'first_name')->textInput(['value'=>@Yii::$app->session['newUserSession']['first_name'], 'class' => 'simple-input', 'tabindex' => '1', 'autocomplete'=>'off', 'placeholder' => "Ваше ім’я"])->label(false); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'last_name')->textInput(['value'=>@Yii::$app->session['newUserSession']['last_name'], 'class' => 'simple-input', 'tabindex' => '2', 'autocomplete'=>'off', 'placeholder' => "Прізвище"])->label(false); ?>
                                            </div>
                                        </div>
                                        <?= $form->field($model, 'email')->textInput(['value'=>@Yii::$app->session['newUserSession']['email'], 'class' => 'simple-input', 'tabindex' => '3', 'autocomplete'=>'off', 'placeholder' => "Введіть email"])->label(false); ?>




<? if (@Yii::$app->session['newUserSession']['phone']=='') {?>
                                        <div class="tt-input-label"></div>
<? }else { ?>
                                        <div class="tt-input-label" style="color: rgb(92, 202, 71);">Телефон підтверджено</div>
<? } ?>
                                        <div class="tt-fadein-top phone-reg-block" >
                                            <div class="row">
<? if (@Yii::$app->session['newUserSession']['phone']=='') {?>
                                                <div class="col-sm-7 col-md-8">
<? }else { ?>
                                                <div class="col-md-12">
<? } ?>
                                                    <?= $form->field($model, 'phone')->textInput(['value'=>@Yii::$app->session['newUserSession']['phone'], 'type' => 'tel', 'class' => 'simple-input '.((@Yii::$app->session['newUserSession']['phone']!='')? 'disabled' : ''), 'style'=>((@Yii::$app->session['newUserSession']['phone']!='')? 'background-color: rgb(227, 230, 232);' : ''),  'autocomplete'=>'off', 'tabindex' => '4',  'placeholder' => "+38 (ххх) ххх - хх - хх", 'data-phone'=>''])->label(false); ?>
                                                </div>
<? if (@Yii::$app->session['newUserSession']['phone']=='') {?>
                                                <div class="col-sm-5 col-md-4">
                                                    <a class="button type-1 size-3 full color-3 uppercase tt-phone-submit disabled" href="javascript:">Підтвердити</a>
                                                </div>
<? } ?>
                                                <div class="empty-space marg-xs-b20"></div>
                                            </div>
                                        </div>
                                        <div class="tt-fadein-bottom">
                                            <div class="simple-text size-3"><span></span><span class="remove_added_file remove"> [X] </span></div>
                                            <div class="empty-space marg-lg-b15"></div>
                                            <div class="row">
                                                <div class="col-sm-8 col-md-9">
                                                    <?= $form->field($model, 'confirm_sms')->textInput(['value'=>@Yii::$app->session['newUserSession']['confirm_sms'], 'class' => 'simple-input', "id"=>"confirm_sms", 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>
                                                    <div class="empty-space marg-xs-b20"></div>
                                                </div>
                                                <div class="col-sm-4 col-md-3">
                                                    <a class="button type-1 size-3 full color-3 uppercase tt-phone-code-submit " href="javascript:">ОК</a>
                                                </div>
                                            </div>
                                        </div>


                                       <div class="row row10">
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'password')->passwordInput(['value'=>@Yii::$app->session['newUserSession']['password'], 'class' => 'simple-input', 'tabindex' => '5', 'autocomplete'=>'off',  'placeholder' => "Введіть пароль"])->label(false); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'password_repeat')->passwordInput(['value'=>@Yii::$app->session['newUserSession']['password_repeat'], 'class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '6', 'placeholder' => "Повторіть пароль"])->label(false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?
                                    if (@Yii::$app->session['newUserSession']['agree']==1) $model->agree = TRUE;
                                    echo $form->field($model, 'agree')->checkbox([
                                    'template' => '<label class="checkbox-entry blue-links tt-terms-checkbox">{input}<span>Із <a href="'.Url::to(['/site/privacy']).'" target="_blank">"Правилами користування"</a> погоджуюсь</span></label><div>{error}</div>'
                                     ])?>

                                    <div class="tt-register-btn">
                                        <?= Html::submitButton('<span>продовжити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 icon-right full uppercase', 'name' => 'step-1']) ?>
<? if (@Yii::$app->session['newUserSession']['phone']!='') {?>
                                        <div class="empty-space marg-lg-b20"></div>
                                        <?= Html::submitButton('Відмінити реєстрацію', ['id'=>'reset_regisrtartion', 'class' => 'button type-1 size-3 full uppercase', 'name' => 'registration-reset', 'value'=>1]) ?>
<style>
    #reset_regisrtartion:hover{background:#e5e7eb;color:#000;border-color:#000}
<style>
<? } ?>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
