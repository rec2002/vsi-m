<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;

$this->title = 'Відновити пароль - Кабінет користувача';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 646px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/portfolio/list'])?>"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect" href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;"><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <?php $form = ActiveForm::begin(['id' => 'password-reset-form', 'options' => ['class'=>'form-ajax reset-form'], 'enableAjaxValidation'=>true,  'validationUrl'=>Url::toRoute('/members/member/resetpasswordvalidation'), 'action' =>['/members/member/resetpwd']]); ?>
                        <div class="tab-entry-box pad2">
                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Старий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password_old')->passwordInput(['class' => 'simple-input', 'tabindex' => '1', 'autocomplete'=>'off'])->label(false); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-space marg-lg-b30"></div>
                            <div class="row">
                                <div class="col-sm-9 col-md-7">
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Новий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password')->passwordInput([ 'class' => 'simple-input', 'tabindex' => '2', 'autocomplete'=>'off'])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <div class="tt-input-wrapper">
                                        <div class="tt-input-label">Повторіть новий пароль</div>
                                        <div class="tt-input-entry">
                                            <?= $form->field($MemberPassword, 'password_repeat')->passwordInput(['class' => 'simple-input', 'autocomplete'=>'off', 'tabindex' => '3'])->label(false); ?>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b20"></div>
                                    <div class="tt-buttons-block text-right">
                                        <?= Html::resetButton('Відмінити', ['class' => 'button type-1 size-3 uppercase']) ?>
                                        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'save']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>

                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
