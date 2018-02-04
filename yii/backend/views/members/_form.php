<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\switchinput\SwitchInputAsset;

?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>


    <? if (sizeof($documents)) {?>
        <p>
            <? foreach ($documents as $item) {?>
                <a href="<?=Url::toRoute(['/members/file', 'id' => $item['id'], 'member'=>$item['member_id']])?>" target="_blank"><?=$item['name']?></a><br/>
            <? } ?>
        </p>
    <? } else { ?>
        <p>Жодного документа наразі не завантажено</p>
    <?} ?>

    <?= $form->field($model, 'approved')->widget(kartik\switchinput\SwitchInput::classname(), [
        'pluginOptions'=>[
            'onText'=>'TAK',
            'offText'=>'HI',
			'handleWidth'=>'53',
			'labelWidth'=>'53',
			'staticWidth'=>'53'
        ]])->label('Виконавець пройшов перевірку');

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<? SwitchInputAsset::register($this); ?>