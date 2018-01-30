<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\MemberHelper;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\modules\members\models\OrderTypes;
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin([

        'class' => 'form-horizontal',
    ]); ?>


    <?= $form->field($model, 'title')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'descriptions')->textarea(['rows' => 3, 'readonly' => true]) ?>
    <?= $form->field($model, 'location')->textInput(['readonly' => true]) ?>

    <?
    $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();
    if (sizeof($types)) {
        $data = array();
        foreach ($types as $key=>$val) {
            $data[$val['parent_name']][$val['id']] =  $val['name'];
        }
    }

    $model->types = ArrayHelper::getColumn( OrderTypes::findBySql('SELECT id, type  FROM order_types WHERE order_id="'.$model->id.'" ')->asArray()->all(), 'type');

    ?>
    <?=$form->field($model, 'types')->widget(Select2::classname(), [
        'data' =>  $data,
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати `вид робіт` --', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <?

    $status = MemberHelper::STATUS;
    foreach ($status as $key=>$val) if ($key>2) unset($status[$key]);

    echo $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => $status,
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати тип обрахунку --'],
        'pluginOptions' => [
            'allowClear' => false,
            'width' => '230px'

        ],
    ])->label('Дозволити публікацію'); ?>




    <?= $form->field($model, 'reason_for_refusal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .select2-selection .select2-selection--single {
        width: auto !important;
    }
</style>