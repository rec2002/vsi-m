<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Button;
use common\components\MemberHelper;
use common\models\Seo;
$seo = new Seo();
?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 646px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/portfolio/list'])?>"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billing'])?>" ><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <div class="tab-entry-box pad2">
                            <div class="tt-fadein-top" style="display: block;">
                                <?php $form = ActiveForm::begin(['id' => 'types', 'options' => ['class'=>'form-ajax'],
                                    'enableAjaxValidation'=>true,
                                    'validationUrl'=>Url::toRoute('/members/member/validation/?scenario=types'),
                                    'action' =>['/members/member/typesave',
                                    ]]); ?>
                                <div class="row vertical-middle">
                                    <div class="col-sm-8">
                                        <h4 class="h4">Виберіть види робіт:</h4>
                                        <div class="simple-text size-3">
                                            <p>Ви зможете підписатися на замовлення, які відносяться до обраних вами видів робіт</p>
                                        </div>
                                        <div class="empty-space marg-lg-b35"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-right">
                                            <a href="javascript:" class="button type-1 size-1 icon-right edit tt-fadein-link"><span>Додати ціни</span></a>
                                        </div>
                                        <div class="empty-space marg-lg-b35"></div>
                                    </div>
                                </div>



                                <?
                                $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 AND d1.active=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();

                                $types_arr=array();
                                if (sizeof($types)) {
                                    foreach ($types as $val) {
                                        $types_arr[$val['id']] = $val['name'];
                                    }
                                }

                                echo "<ul class=\"checkbox-list\">";



                                echo  $form->field($model, 'types', ['enableClientValidation' => false])->checkboxList($types_arr, [
                                    'template' => "\n{input}\n",
                                    'item' => function($index, $label, $name, $checked, $value) {
                                        $types_ = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 AND d1.active=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC ")->queryAll();

                                        $first = '';
                                        if ($index==0) {
                                            $first = "<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='check_all' ><span><b>Вибрати усі</b></span></label></li>";
                                            $header = "<li><div class=\"checkbox-toggle\"><label class=\"checkbox-entry has-child\"><input type=\"checkbox\"><span></span></label><a href=\"javascript:\">".$types_[$index]['parent_name']."</a></div><ul>";
                                        }else if ($types_[$index]['parent']!=$types_[$index-1]['parent']){
                                            $first = "<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='check_all' value='{$value}'><span><b>Вибрати усі</b></span></label></li>";
                                            $header = "</ul></li><li><div class=\"checkbox-toggle\"><label class=\"checkbox-entry has-child\"><input type=\"checkbox\"><span></span></label><a href=\"javascript:\">".$types_[$index]['parent_name']."</a></div><ul>";

                                        } else $header = '';




                                        if ($checked==1) $checked = 'checked';
                                        return $header.$first."<li><label class=\"checkbox-entry\"><input type=\"checkbox\"  {$checked} name='{$name}' value='{$value}' class=\"checkbox-data\" ><span>{$label}</span></label></li>";
                                    }
                                ])->label(false);

                                echo "</ul>";
                                echo "</li>";
                                echo "</ul>";
                                ?>

                                <div class="empty-space marg-lg-b35"></div>
                                <div class="tt-buttons-block m10 text-right">

                                    <?=Button::widget(['label' => 'Відмінити', 'options' => ['class' => 'button type-1 tt-project-new-close']]); ?>
                                    <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="tt-fadein-bottom" style="display: none;">
                                <div class="row vertical-middle">
                                    <div class="col-sm-8">
                                        <h4 class="h4">Вкажіть Ваші ціни на роботи:</h4>
                                        <div class="simple-text size-3">
                                            <p>Після збереження Ваші ціни будуть доступні для перегляду у сторінці профайлу</p>
                                        </div>
                                        <div class="empty-space marg-lg-b35"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-right">
                                            <a href="javascript:" class="button type-1 size-1 icon-right edit tt-fadein-close"><span>Види робіт</span></a>
                                        </div>
                                        <div class="empty-space marg-lg-b35"></div>
                                    </div>
                                </div>
                                <div id="prices_table">
                                    <? echo $this->context->actionPrices(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
    <style>
        p.help-block.help-block-error {margin-top: 20px;}
    </style>

<?
echo $this->registerJs("(function(){
$.each( $(\"div#memberedit-types li ul li label.checkbox-entry input\"), function() {


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

	$('.tt-fadein-link').on('click', function(e){
		$(this).closest('.tt-fadein-top').fadeOut(300, function(){
			$(this).siblings('.tt-fadein-bottom').fadeIn(300);
		});
		e.preventDefault();
	});


	$('.tt-fadein-close').on('click', function(e){
		$(this).closest('.tt-fadein-bottom').fadeOut(300, function(){
			$(this).siblings('.tt-fadein-top').fadeIn(300);
		});
		e.preventDefault();
	});

    $(\"button[name = 'save_prices']\").on('click', function(e){
        var flag = false;
        $('input.simple-input.single').each(function(){
             if($.trim($(this).val())!='') {
                flag = true;
                return true;
             }
        })

        if (!flag) $('p.help-block.help-block-error').text('Необхідно вибрати мінімум один пункт.'); else $('p.help-block.help-block-error').text('');
        return flag;
    });

    $('.checkbox-entry input[name=\"check_all\"]').on('change', function(){

		if ($(this).is(\":checked\"))
        	$(this).closest('ul').find('input[type=\"checkbox\"]').prop('checked', true);
		else
            $(this).closest('ul').find('input[type=\"checkbox\"]').prop('checked', false);

	});



    $('.checkbox-entry input[type=\"checkbox\"]').on('change', function(){
        CheckAllCheckbox($(this).closest('ul'));
    });

	$('.tt-project-new-close').on('click', function(e){
	
	    $(\"div#memberedit-types li ul li label.checkbox-entry input\").prop('checked', false);
	
	    $.post( \"/members/member/getypes\",  function( data ) {
            $.each(data, function( key, value ) {
                $('input[name=\"MemberEdit[types][]\"][value=\"' + value + '\"]').prop('checked', true);
            });
            
            $.each( $(\"div#memberedit-types li ul li label.checkbox-entry input\"), function() {
                if ($(this).is(':checked')) {
                    $(this).closest('ul').closest('li').find('.checkbox-toggle input').prop('checked', true);
                }
            });          
            $('p.help-block.help-block-error').text('');    
        }, \"json\");
	
	
		return false;
	});


    $(document).on(\"click\", \"div.tt-editable-close_\", function(e) {

	    $.post( \"/members/member/prices\",  function( data ) {
            $('div#prices_table').empty().html(data);
        });

		return false;
	});



})();" , \yii\web\View::POS_END );
?>


