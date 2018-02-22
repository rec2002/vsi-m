<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\components\MemberHelper;
use common\models\Seo;
$seo = new Seo([
    'title'=>' Крок 4 - реєстрація нового майстра',
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
                        <li class="active done"><span>3</span></li>
                        <li class="active"><span>4</span></li>
                        <li><span>5</span></li>
                    </ul>

                    <div class="tt-register-desc">
                        <h4 class="tt-register-desc-title h4">Виберіть види робіт:</h4>
                        <div class="simple-text size-3">
                            <p>Ви зможете підписатися на замовлення, які відносяться до обраних вами видів робіт</p>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin(['id' => 'reg-step-4',
                        'enableAjaxValidation'=>true,
                        'validateOnBlur'=> false,
                        'validateOnChange'=> false,
                        'validateOnType'=> false,
                        'validateOnSubmit'=> true,
                        'validationUrl'=>Url::toRoute('/members/registration/validation/?id=4'),
                        'action' =>['/members/registration/?id=4',
                        ]]); ?>
                        <?echo $form->field($model, 'step')->hiddenInput(['value'=> 4])->label(false);?>

<?
                        $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();

                        $types_arr=array();
                        if (sizeof($types)) {
                            foreach ($types as $val) {
                                $types_arr[$val['id']] = $val['name'];
                            }
                        }

                        echo "<ul class=\"checkbox-list\">";
                        if (sizeof(@Yii::$app->session['newUserSession']['types'])) $model->types = @Yii::$app->session['newUserSession']['types'];

                        echo  $form->field($model, 'types', ['enableClientValidation' => false])->checkboxList($types_arr, [
                                'template' => "\n{input}\n",
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $first = '';
                                    $types_ = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC ")->queryAll();
                                    if ($index==0) {
                                        $first = "<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='check_all' value='{$value}'><span><b>Вибрати усі</b></span></label></li>";
                                        $header = "<li><div class=\"checkbox-toggle\"><label class=\"checkbox-entry has-child\"><input type=\"checkbox\"><span></span></label><a href=\"javascript:\">".$types_[$index]['parent_name']."</a></div><ul>";
                                    }else if ($types_[$index]['parent']!=$types_[$index-1]['parent']){
                                        $first = "<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='check_all' value='{$value}'><span><b>Вибрати усі</b></span></label></li>";
                                        $header = "</ul></li><li><div class=\"checkbox-toggle\"><label class=\"checkbox-entry has-child\"><input type=\"checkbox\"><span></span></label><a href=\"javascript:\">".$types_[$index]['parent_name']."</a></div><ul>";
                                    } else $header = '';
                                    if ($checked==1) $checked = 'checked';
                                    return $header.$first."<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='{$name}' value='{$value}' class=\"checkbox-data\"><span>{$label}</span></label></li>";
                                }
                        ])->label(false);

echo "</ul>";
echo "</li>";
echo "</ul>";
                            ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <?= Html::submitButton('<span>продовжити реєстрацію</span>', ['class' => 'button type-1 size-3 color-3 icon-right full uppercase', 'name' => 'step-4']) ?>
                        </div>
                        <div class="col-sm-6 col-sm-pull-6">
                            <a href="<?=Url::to(['/members/registration/?id=3'])?>" class="button type-1 size-3 btn-simple icon-left uppercase"><span>назад</span></a>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<style>
    p.help-block.help-block-error {margin-top: 20px;}
</style>

<?
echo $this->registerJs("(function(){
    $.each( $(\"div#masterregistration-types li ul li label.checkbox-entry input\"), function() {
        if ($(this).is(':checked')) {
            CheckAllCheckbox($(this).closest('ul'));
            $(this).closest('ul').closest('li').find('.checkbox-toggle input').prop('checked', true);
        }
    });

    function CheckAllCheckbox(parent_dom) {

        var total = parent_dom.find('.checkbox-data').length;
        var checked = parent_dom.find('.checkbox-data:checked').length;
        
        if (total==checked) 
            parent_dom.find('input[name=\"check_all\"]').prop('checked', true);
        else 
            parent_dom.find('input[name=\"check_all\"]').prop('checked', false);

    } 


    $('.checkbox-entry input[name=\"check_all\"]').on('change', function(){

		if ($(this).is(\":checked\"))
        	$(this).closest('ul').find('input[type=\"checkbox\"]').prop('checked', true);
		else
            $(this).closest('ul').find('input[type=\"checkbox\"]').prop('checked', false);

	});

    $('.checkbox-entry input[type=\"checkbox\"]').on('change', function(){
        CheckAllCheckbox($(this).closest('ul'));
    });
    
    

})();" , \yii\web\View::POS_END );
?>
