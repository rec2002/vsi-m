<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\components\MemberHelper;

?>

<?php $form = ActiveForm::begin(['id' => 'prices', 'options' => ['class'=>'form-ajax'], 'enableAjaxValidation'=>true, 'action' =>['/members/member/pricesave']]); ?>



    <div class="empty-space marg-lg-b35"></div>
<?
if (sizeof($model->prices)) $data = $model->prices; else $data = array();
$price_types = MemberHelper::PRICE_TYPE;



    if (sizeof($model->types))
        $prices = Yii::$app->db->createCommand("SELECT d.id, d.name, d1.name as parent_name, d.parent, d.job_unit, d.job_markup  FROM dict_category d LEFT JOIN dict_category d1 ON d1.id=d.parent AND d1.types=1 WHERE d.active=1 AND d.types=2 AND d.parent IN (".implode(',', $model->types).") ORDER BY d1.priority ASC  ")->queryAll();
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
                    'name' => 'MemberEdit[prices]['.$val['id'].']',
                    'mask' => '9',
                    'value' =>@$data[$val['id']]['price'],
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



<div class="empty-space marg-sm-b30 marg-lg-b35"></div>

<div class="tt-editable-form-btn">
    <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
    <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save_prices']) ?>
</div>
<?php ActiveForm::end(); ?>