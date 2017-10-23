<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use common\components\MemberHelper;

$this->title = 'Реєстрація майстра - Крок 5';
?>
    <div class="tt-header-margin"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper" style="height: 613px;">
                <div class="tt-pageform tt-register-3">
                    <h3 class="tt-register-title h3 text-center">Реєстрація нового майстра</h3>
                    <ul class="tt-popup-progress">
                        <li class="active done"><span>1</span></li>
                        <li class="active done"><span>2</span></li>
                        <li class="active done"><span>3</span></li>
                        <li class="active done"><span>4</span></li>
                        <li class="active"><span>5</span></li>
                    </ul>

                    <?php $form = ActiveForm::begin(['id' => 'reg-step-5',
                        'enableAjaxValidation'=>true,
                        'validationUrl'=>Url::toRoute('/members/registration/validation/?id=5'),
                        'action' =>['/members/registration/?id=5',
                    ]]); ?>
                    <?echo $form->field($model, 'step')->hiddenInput(['value'=> 5])->label(false);?>
                    <div class="tt-register-desc">
                        <h4 class="tt-register-desc-title h4">Вартість робіт:</h4>
                        <div class="simple-text size-3">
                            <p>Напишіть будь ласка вартість ваших робіт, щоб користувачі орієнтувались</p>
                        </div>
                    </div>
<?
                    if (sizeof(@Yii::$app->session['newUserSession']['prices'])) $data = @Yii::$app->session['newUserSession']['prices']; else $data = array();
                    $price_types = MemberHelper::PRICE_TYPE;

                    if (sizeof( @Yii::$app->session['newUserSession']['types'])) $prices = Yii::$app->db->createCommand("SELECT d.id, d.name, d1.name as parent_name, d.parent, d.job_unit, d.job_markup  FROM dict_category d LEFT JOIN dict_category d1 ON d1.id=d.parent AND d1.types=1 WHERE d.active=1 AND d.types=2 AND d.parent IN (".implode(',', @Yii::$app->session['newUserSession']['types']).") ORDER BY d1.priority ASC  ")->queryAll();
                    else $prices = array();

                    $total = sizeof($prices);
                    if (sizeof($prices)) foreach ($prices as $key=>$val) {
?>
<?
                    if ($key==0) {
                            echo '<div class="simple-text size-3 bold-title  bold-style-2"><p><b>'.$val['parent_name'].'</b></p></div><div class="empty-space marg-xs-b15 marg-lg-b5"></div>';
                    } elseif ($prices[$key-1]['parent']!=$prices[$key]['parent']) {
                            echo '<div class="simple-text size-3 bold-title  bold-style-2"><p><b>'.$val['parent_name'].'</b></p></div><div class="empty-space marg-xs-b15 marg-lg-b5"></div>';
                    }
?>


                        <div class="list-dotted-item">
                        <div class="list-dotted-left"><span><?=($val['job_markup']==1) ? '<b>'.$val['name'].'</b>' : $val['name'] ?></span></div>
                        <div class="list-dotted-right"><span>від
                        <?
                                    echo \yii\widgets\MaskedInput::widget([
                                        'name' => 'MasterRegistration[prices]['.$val['id'].']',
                                        'mask' => '9',
                                        'value' =>@$data[$val['id']],
                                        'options' =>["class" => "simple-input single", 'tabindex' => ($key+1), 'autocomplete'=>"off"],
                                        'clientOptions' => ['repeat' => 10, 'greedy' => false]
                                    ]);

                        ?>
                                    <?=$price_types[$val['job_unit']]?></span></div>
                        </div>
<?
                    if (($key+1)==$total) {
                        echo '<div class="empty-space marg-lg-b30"></div>';
                    } elseif ($prices[$key+1]['parent']!=$prices[$key]['parent']) {
                        echo '<div class="empty-space marg-lg-b30"></div>';
                    } else {
                        echo '<div class="empty-space marg-lg-b10"></div>';
                    }
?>
                    <?  } ?>

                    <p class="help-block help-block-error" style="margin-bottom: 20px;"></p>
                    <div class="row">
                        <div class="col-sm-9 col-sm-push-3">
                            <div class="tt-buttons-block">

                                <?= Html::submitButton('<span>пропустити крок</span>', ['class' => 'button type-1 size-3 color-1 uppercase', 'name' => 'final', 'value'=>1]) ?>
                                <?= Html::submitButton('<span>завершити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 uppercase', 'name' => 'step-5']) ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-pull-9">
                            <a href="<?=Url::to(['/members/registration/?id=4'])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад</span></a>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<?


echo $this->registerJs("(function(){

$(\"button[name='step-5']\").on('click', function(e){
    var flag = false;
    $('input.simple-input.single').each(function(){
       if($.trim($(this).val())!='') {
            flag = true;
            return true;
       } 
    })
    
    if (!flag) $('p.help-block.help-block-error').text('Необхідно заповнити хоча б один пункт.'); else $('p.help-block.help-block-error').text('');
    return flag;
});

})();" , \yii\web\View::POS_END );

?>
