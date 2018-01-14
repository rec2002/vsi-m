<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\components\MemberHelper;

$this->title = 'Крок 2 - Реєстрація майстра';
?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper" style="height: 827px;">
                <div class="tt-pageform tt-register-2">
                    <h3 class="tt-register-title h3 text-center">Реєстрація нового майстра</h3>
                    <ul class="tt-popup-progress">
                        <li class="active done"><span>1</span></li>
                        <li class="active"><span>2</span></li>
                        <li><span>3</span></li>
                        <li><span>4</span></li>
                        <li><span>5</span></li>
                    </ul>
                    <?php $form = ActiveForm::begin(['id' => 'reg-step-2',
                        'enableAjaxValidation'=>true,
                        'validationUrl'=>Url::toRoute('/members/registration/validation/?id=2'),
                        'action' =>['/members/registration/?id=2',

                        ]]); ?>
                    <?echo $form->field($model, 'step')->hiddenInput(['value'=> 2])->label(false);?>
                    <div class="tt-register-inputs">
                        <div class="tt-input-label">Основне місце розташування (місто або область)</div>
                        <?= $form->field($model, 'place')->textInput(['value'=>@Yii::$app->session['newUserSession']['place'], 'class' => 'simple-input', 'tabindex' => '1', 'autocomplete'=>'off', 'placeholder' => "Наприклад, Львів або Львівська обл.", 'style'=>" margin-bottom: 10px;"])->label(false); ?>
                        <div class="tt-input-label">Форма роботи із замовниками</div>
                        <div class="row vertical-middle">


                            <div class="col-sm-4">
                                <div class="simple-select tt-select-swither">
                                    <?


                                    if (@Yii::$app->session['newUserSession']['forma']>0) $model->forma = @Yii::$app->session['newUserSession']['forma'];

                                    echo $form->field($model, 'forma')->widget(Select2::classname(), [
                                        'data' => MemberHelper::FORMA,
                                        'language' => 'uk',
                                        'hideSearch' => true,
                                        'size' => Select2::LARGE,
                                        'theme' => Select2::THEME_BOOTSTRAP,
                                        'options' => ['placeholder' => 'Вибрати форму роботи'],
                                        'pluginOptions' => [
                                            'allowClear' => false
                                        ],
                                    ]); ?>






                                </div>
                                <div class="empty-space marg-xs-b30"></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="tt-select-swither-content">
                                    <div class="tt-select-swither-item" data-rel="1" <?=(@Yii::$app->session['newUserSession']['forma']==1) ? 'style="display:block;"' : '' ?> ></div>
                                    <div class="tt-select-swither-item" data-rel="2" <?=(@Yii::$app->session['newUserSession']['forma']==2) ? 'style="display:block;"' : '' ?>>
                                        <div class="simple-select">

                                            <?
                                            if (@Yii::$app->session['newUserSession']['brygada']>0) $model->forma = @Yii::$app->session['newUserSession']['brygada'];

                                            echo $form->field($model, 'brygada')->widget(Select2::classname(), [
                                                'data' => MemberHelper::BRYGADA,
                                                'language' => 'uk',
                                                'hideSearch' => true,
                                                'size' => Select2::LARGE,
                                                'theme' => Select2::THEME_BOOTSTRAP,
                                                'pluginOptions' => [
                                                    'allowClear' => false
                                                ],
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="tt-select-swither-item" data-rel="3"  <?=(@Yii::$app->session['newUserSession']['forma']==3) ? 'style="display:block;"' : '' ?>>
                                        <?= $form->field($model, 'company')->textInput(['value'=>@Yii::$app->session['newUserSession']['company'], 'class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Назва компанії"])->label(false); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>
                        <div class="tt-input-label">Про себе</div>


                        <div class="simple-input-max">
                            <?= $form->field($model, 'about')->textarea(['value'=>@Yii::$app->session['newUserSession']['about'], 'class' => 'simple-input height-2', 'tabindex' => '1', 'maxlength'=>'800', 'autocomplete'=>'off', 'placeholder' => "Напишіть про себе", 'style' => 'margin-bottom: -20px;'])->label(false);  ?>
                            <div class="simple-text size-2 simple-input-max-count"></div>
                        </div>
                    </div>

                    <div class="tt-register-info">
                        <div class="tt-input-label">Ваше фото</div>
                        <ul class="simple-list style-2">
                            <li>На фотографії повинна бути людина, яка є власником анкети</li>
                            <li>На фотографії повинно бути чітко видно обличчя</li>
                        </ul>
                    </div>

                    <div class="tt-register-upload-wrapper">
                        <div class="row vertical-middle">
                            <div class="col-sm-7">
                                <div class="tt-register-upload clearfix">
                                    <div class="tt-register-upload-img">
                                        <img class="img-responsive" src="<?=(!empty(@Yii::$app->session['newUserSession']['avatar_image'])) ? @Yii::$app->session['newUserSession']['avatar_image'] : '/img/register/user.jpg' ?>" alt="">
                                    </div>
                                    <div class="tt-register-upload-text">
                                        <h6 class="tt-register-upload-title">Приклад фото</h6>
                                        <div class="empty-space marg-lg-b5"></div>
                                        <div class="simple-text size-2 space7">
                                            <p>Щира посмішка привертає замовників.</p>
                                            <p>Похмурий і злий вигляд їх відлякує.</p>
                                            <p>Формат jpeg, jpg, png і не більше 3мб,</p>
                                            <p>    розміром не менше 262х262 пікселів</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty-space marg-xs-b30"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="tt-register-upload-btn">
                                    <div class="button type-1 full">Вибрати фото на комп’ютері <input type="file" class="upload_avatar" data-source="/members/registration/uploadavatar/" accept="image/x-png,image/gif,image/jpeg"></div>

                                    <div id="progress-wrp">
                                        <div class="progress-bar"></div>
                                        <div class="status">0%</div>
                                    </div>
                                    <!--<a href="#" class="button type-1 full">Знімок веб-камерою</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <?= Html::submitButton('<span>продовжити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 icon-right full uppercase ', 'name' => 'step-1']) ?>
                        </div>
                        <div class="col-sm-6 col-sm-pull-6">
                         <a href="<?=Url::to(['/members/registration'])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад</span></a>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

<?

$gpJsLink= '//maps.googleapis.com/maps/api/js?' . http_build_query(array(
        'libraries' => 'places',
        'sensor' => 'false',
        'key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE',
        'language'=>'uk'
    ));
echo $this->registerJsFile($gpJsLink);

$options = '{"types":["(cities)"],"componentRestrictions":{"country":"ua"}}';
echo $this->registerJs("(function(){
        var input = document.getElementById('masterregistration-place');
        var options = $options;        
        searchbox = new google.maps.places.Autocomplete(input, options);
   //     setupListeners();
   

  
   
   
})();" , \yii\web\View::POS_END );

?>



