<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Seo;
$seo = new Seo();


?>
    <div class="tt-header-margin"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper padding0" style="height: 684px;">
                <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row row130 vertical-middle">
                            <div class="col-sm-2">
                                <a href="<?=Url::to(['/members/login'])?>" class="button type-1 size-4 btn-simple blue icon-left uppercase"><span>Вхід</span></a>
                            </div>
                            <div class="col-sm-7">
                                <div class="empty-space marg-xs-b10"></div>
                                <div class="tt-devider vertical left"></div>
                                <div class="empty-space marg-xs-b30"></div>


                                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                                    <h3 class="h3">Відновлення паролю</h3>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <div class="simple-text size-3">
                                        <p>Введіть Вашу електронну адресу електронної пошти. Вам буде надіслане посилання для відновлення паролю.</p>
                                    </div>

                                    <div class="empty-space marg-lg-b10"></div>
                                    <div class="simple-text size-3">
                                        <?= Alert::widget() ?>
                                    </div>

                                    <div class="empty-space marg-lg-b15"></div>

                                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'simple-input', 'autocomplete'=>'off', 'placeholder'=>'Введіть Email'])->label(false); ?>

                                    <div class="empty-space marg-lg-b10"></div>
                                    <?= Html::submitButton('<span>Відновити</span>', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'reset-pwd']) ?>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>

