<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \backend\models\Dictypes;
use kartik\select2\Select2;
use yii\helpers\Url;
use common\components\MemberHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Dictjobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictjobs-form">

    <?php $form = ActiveForm::begin(['options' => ['class'=>'modal-form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,  'class' => 'form-control ' ]) ?>

    <?
            $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();
            if (sizeof($types)) {
                $data = array();
                foreach ($types as $key=>$val) {
                    $data[$val['parent_name']][$val['id']] =  $val['name'];
                }
            }

        $model->parent =($model->isNewRecord) ? 0 : $model->parent;

    ?>
    <?=$form->field($model, 'parent')->widget(Select2::classname(), [
        'data' =>  $data,
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати `вид робіт` --'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <?=$form->field($model, 'job_unit')->widget(Select2::classname(), [
        'data' => MemberHelper::PRICE_TYPE,
        'language' => 'uk',
        'hideSearch' => true,
        'options' => ['placeholder' => '-- Вибрати тип обрахунку --'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>


    <?= $form->field($model, 'types')->hiddenInput(['value'=>2])->label(false);?>

    <?= $form->field($model, 'active')->hiddenInput(['value'=> $model->isNewRecord ? '0' : $model->active])->label(false); ?>

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true, 'value'=>$model->isNewRecord ?  '0' : $model->priority]) ?>

    <?= $form->field($model, 'job_markup')->widget(kartik\switchinput\SwitchInput::classname(), [
        'pluginOptions'=>[
            'onText'=>'TAK',
            'offText'=>'HI'
        ]])->label('Виділити чорним');

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
