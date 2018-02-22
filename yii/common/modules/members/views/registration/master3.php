<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\components\MemberHelper;
use common\models\Seo;
$seo = new Seo([
    'title'=>' Крок 3 - реєстрація нового майстра',
]);
$seo->title();

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper" style="height: 228px;">
                <div class="tt-pageform tt-register-3">
                    <h3 class="tt-register-title h3 text-center">Реєстрація нового майстра</h3>
                    <ul class="tt-popup-progress">
                        <li class="active done"><span>1</span></li>
                        <li class="active done"><span>2</span></li>
                        <li class="active"><span>3</span></li>
                        <li><span>4</span></li>
                        <li><span>5</span></li>
                    </ul>

                    <div class="tt-register-desc">
                        <h4 class="tt-register-desc-title h4">Виїзд на об’єкти:</h4>
                        <div class="simple-text size-3">
                            <p>Виберіть області, у яких ви здійснюєте роботу над завданнями</p>
                        </div>
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'reg-step-3',
                        'enableAjaxValidation'=>true,
                        'validateOnBlur'=> false,
                        'validateOnChange'=> false,
                        'validateOnType'=> false,
                        'validateOnSubmit'=> true,
                        'validationUrl'=>Url::toRoute('/members/registration/validation/?id=3'),
                        'action' =>['/members/registration/?id=3',

                        ]]); ?>



                    <?echo $form->field($model, 'step')->hiddenInput(['value'=> 3])->label(false);?>
                    <div class="row row10">
                            <?
                            $regions = Yii::$app->db->createCommand("SELECT id, name_short  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();

                            $regions_arr=array();
                            if (sizeof($regions)) {
                                foreach ($regions as $val) {
                                    $regions_arr[$val['id']] = $val['name_short'];
                                }
                            }
                            if (sizeof(@Yii::$app->session['newUserSession']['regions'])) $model->regions = @Yii::$app->session['newUserSession']['regions'];

                            echo  $form->field($model, 'regions')->checkboxList($regions_arr, [
                                'item' => function($index, $label, $name, $checked, $value) {
                                    if ($checked==1) $checked = 'checked';
                                    return (($index==0) ? "<div class=\"col-xs-6\">" : "").(($index==13) ? "</div><div class=\"col-xs-6\">" : "")."<label class=\"checkbox-entry nowrap\"><input type=\"checkbox\"  {$checked} name='{$name}' value='{$value}'><span><b>{$label}</b></span></label><div class=\"empty-space marg-lg-b15\"></div>".(($index==24) ? "</div>" : "");
                                }
                            ])->label(false);
                            ?>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <?= Html::submitButton('<span>продовжити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 icon-right full uppercase ', 'name' => 'step-3']) ?>
                        </div>
                        <div class="col-sm-6 col-sm-pull-6">
                            <a href="<?=Url::to(['/members/registration/?id=2'])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад</span></a>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<style>
    p.help-block.help-block-error {clear:both;}
</style>