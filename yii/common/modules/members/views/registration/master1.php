<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\checkbox\CheckboxX;
$this->title = 'Реєстрація майстра';
?>

    <div class="tt-header-margin"></div>
    <div class="fixed-background" style="background-image:url(/img/bg/bg_4.jpg);">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper middle register" style="height: 827px;">
                <div class="tt-pageform tt-register">
                    <div class="row row60">
                        <div class="col-md-6">
                            <div class="tt-register-column left">
                                <h3 class="tt-register-title h3">Реєстрація нового майстра</h3>
                                <div class="tt-register-desc simple-text size-3">
                                    <p>Після реєстрації ви зможете шукати завдання та заробляти на сервісі “ВсіМайстри”</p>
                                </div>
                                <div class="tt-iconbox-wrapper">
                                    <div class="tt-iconbox clearfix">
                                        <img class="tt-iconbox-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAzCAMAAAAJihAlAAAAkFBMVEUAAAD/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igJ6owLPAAAAL3RSTlMAfgWbDwOmHGxB+BILZuazSCCiecKScxYJ8b88MCvWznBbNibs38ediYNVT7eOOYVtuosAAAIKSURBVEjHzZTJloIwEEVfBwIaRhFxnud2eP//d92AQY0tR3Z9N1mQm6qkikKJ6CxSxfeodNEReGC8JVVkvSdS5HYMjUjI2PVRh+/GZCJuQsqe3l4r9ZiWSsJvfMY3k3yJf5dPSRgDIhwO8Mh69d4YDEOBya/2SIdzvCfmBF3aeMBW7NcYNrsYKYE7YscOahBqBOUgZ1p4csQ2SqQwQIGjwG5xJQ7zs78YoMRTNChL0CX4VfYJ2ZYnHqrwe8dgipyvyoA34ohniRoMAzLjXOAzQ2M0Y62h+b/GMmtoxEyaGWumopHR53aAjwwZFC3rD+nqxuq4z4hnQ7D4sSKuqmAmmZGVd+bR6/GEG3LcNrANA3JBctGsHtdhr2kFxT/uq+aGFA0NEY3qjMOrsTcmve3iEW9iGgFbeDY26fgpT21IFJzowMAieVzfJT0T0+LoKXfSNKaMMjIMqnms9kWIiJGPPkMfJlJF8Nszch6UH+eb8tQlw3hGF69k7Oftfwy5SVZ2/lz+LfqQnOIPPD2+jyQPEldO9Kt0x/iTXShysbXhxc3vrLYS9bS5Bk6Kvb6uQBf1+LQgeH9GMeMV9VgUS555qaoaMqhPbEVLOXJJR2/z5pyt6saUmJGdPP99lVhGMrwELYPFpOrxKF9a7EHjLZ2Qr+gNa5ZuRks+hLY9+xnP05+lfs4WLTQkcH4AfvJDYzpQrMkAAAAASUVORK5CYII=" alt="">
                                        <div class="tt-iconbox-info">
                                            <h4 class="tt-iconbox-title">Більше 800 категорій послуг для роботи</h4>
                                            <div class="simple-text size-2">
                                                <p>Ви зможете працювати як по своїй спеціальності, так і пробувати свої сили в нових напрямках</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-iconbox clearfix">
                                        <img class="tt-iconbox-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAAzCAMAAAANf8AYAAAAnFBMVEUAAAD/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igK5g2YRAAAAM3RSTlMABOAanRKCyDmzW6oH5B4P+O5Lcl+Ff+orCsC5pqL1r3nZxJokjFQ1KE9DMBaVbdPPiWYHGyp/AAACrUlEQVRIx6WV6XqqMBRFCaMISBAKZVbUOmvb/f7vdjNQlWKV+7l+sIGwTDgHQRFMPTCSUOkzq8Dwdr2BEquZOaNz0hshUOPZbAWnN7KY863Ntj0gJlft23OT8XgcqRnf1en3+Dcn6VgBu2qstY4HSgGbr+oIUHShEA7JxMjPZCh8/5BZfLcINN/o4k/kPOczG/m0SOvM+P0kPnGJdfd+Vq5L/KDmlbo4plxVRSk++woJQPniF2zf6ThabJrmW7xX+uxNTqj1nGFcnXiwU1ycr8FO3bROAnUosFsn8I4LfQgLvcpbB2/KUOxOT4dRvFDrF5xTYXNqXaajOyILvRZZnvoOmcPjUIhUIdMDApnqHceS/10fY5HvmIiM4IrU/8MZQ161eGGe151SHKT4ELmEJvKjXdvRu+M0Weq6LtkgdHnuMHI5ITQeaT2/49gIkiDwAlAWgVqhYpl4FAHPAPYdJ6dvjLiEZfK04Yi0cDRZhPL9V96vQXs/m1+1rqvRRkvzXBlat3SbQ/I5rNZEmQLz7cQw3kMVZTrE8UM0S0VCIlTLG0cXZ11sRU5wELmFjZNyRQP1L052njC0Hb5ERvjQeH4B3e+YQc/k2p8/cDqGzyoaXeaZjxjrCCXP/QyhOLbZGq+k/N3hUPJzP0XnedtAE2ll3S+oxofWD+tm4PbT+yEG3SB+6MjHu+UAW2TePHTWMHiB5Ww5fDG2wu/+TNs+GNdwLXzz9o7aNyNtnUadckLUIleIecTYiP7HWI2wkIob5K1TQ0K7+fMQbAHPbXuEiDsM37iDb9isGYJ1865Ipjg8fvfuWb+6pFXz7NuYyWJcqbF85qRV4t8eR+KZRbZfj/5k78BbXn9Bl9XL8ZRi6fIiazsgJKLeE+0JWyCxV2UC2EtlKGRtNqB5dGgL/w+B7m3tqKf2qQAAAABJRU5ErkJggg==" alt="">
                                        <div class="tt-iconbox-info">
                                            <h4 class="tt-iconbox-title">Працюйте в зручний для вас час</h4>
                                            <div class="simple-text size-2">
                                                <p>Складіть свій особистий графік роботи і заробляйте тільки коли вам зручно</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-iconbox clearfix">
                                        <img class="tt-iconbox-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAAXCAMAAACRQoc4AAAAnFBMVEUAAAD/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igL/igK5g2YRAAAAM3RSTlMAAoUHHPKO6SIRdzzT1/dG4DbsgkF/beWtdGELFc/BMcYsD9XLpFdQnJQmvrqJaEq2F7x6wcgJAAAB50lEQVQ4y1WUV5KrMBBFhYnCHlnknDE4jNPc/e/tPWMh4Hz19amu7raqIGuc3UyQ2Ks62Ek82x7JgmLjdDcMY5c8HgHQe8aE5wGxqI17yAAiUX9dSzRn7RGpFE/4RKKx8iBDrsfqVGQPE0AlxQB3kKFB1URzOCJRvgWLR/CczNigDlQRfFRZz8Q2wTw/ZFd6+83kjR5vlf4i0giLul3xPeUv0shEhmeLkyJbDDgOYjEmRa7Bf5rTXdOvYmC5ul6JAfSOSB5aC3sLbFoyJZI7mtU/WVYanfvPyCo4lXvuiRJ+TlEmiHqBJUN26FRCRFRfPPP1q29eR50YQF3/THRlAZTFz5cbB7sV3TcceKwOpjaa2hERQeLsZwY89seZEONinrxK3XfI8pTbJnEdRUKhEomqvxejFnrxDkwa8iY+kSiqD4KagxIJ1Xk/m6LDiV5qGhRV/asQ11clGvJ1j7WYthtOMT2/Gv55PDPVJM6mh/mLsTiMLD5b0f2jIri6wMV2t5XREdLy0vBwUm5DJNl2TrsEpQxvnq8PU/jsZgm0/fYeXxrrGiE94ihUxLgp4Pp6t1ZnkTmjs/8tzqzY5n3oerd89T6Hml2lQhnagvCCP88Q7F44J7NJAkAjEmf9UUk2wdstJKsN/gElrjazV5193AAAAABJRU5ErkJggg==" alt="">
                                        <div class="tt-iconbox-info">
                                            <h4 class="tt-iconbox-title">Заробляйте гідно</h4>
                                            <div class="simple-text size-2">
                                                <p>Сервіс “ВсіМайстри” може бути для вас джерелом як додаткового заробітку, так і основного фінансового доходу</p>
                                            </div>
                                        </div>
                                    </div>
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
                                        <div class="tt-fadein-top">
                                            <div class="row row10">
                                                <div class="col-sm-8">
                                                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38 (099) 999-9999'])->textInput(['value'=>@Yii::$app->session['newUserSession']['phone'], 'type' => 'tel', 'class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '4',  'placeholder' => "+38 (ххх) ххх - хх - хх"])->label(false); ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a class="button type-1 size-3 full color-3 uppercase tt-fadein-link tt-phone-submit disabled" href="javascript:">Підтвердити</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tt-fadein-bottom">
                                            <div class="simple-text size-3"></div>
                                            <div class="row row10">
                                                <div class="col-sm-12">
                                                    <?= $form->field($model, 'confirm_sms')->textInput(['value'=>@Yii::$app->session['newUserSession']['confirm_sms'], 'class' => 'simple-input', 'autocomplete'=>'off', 'placeholder' => "Код отриманий по смс"])->label(false); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="empty-space marg-xs-b10"></div>
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
                                    'template' => '<label class="checkbox-entry blue-links tt-terms-checkbox">{input}<span>Із <a href="'.Url::to(['/site/privacy']).'">"Правилами користування"</a> погоджуюсь</span></label><div>{error}</div>'
                                     ])?>

                                    <div class="tt-register-btn">
                                        <?= Html::submitButton('<span>продовжити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 icon-right full uppercase', 'name' => 'step-1']) ?>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
