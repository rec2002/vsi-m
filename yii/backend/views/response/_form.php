<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\members\models\MemberResponse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-response-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'suggestion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
