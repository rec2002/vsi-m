<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\components\MemberHelper;


?>

<?php


$form = ActiveForm::begin(['id' => 'edit_portfolio', 'options' => ['class'=>'form-edit-portfolio', 'enctype'=>'multipart/form-data'],

'enableAjaxValidation'=>false, 'validationUrl'=>Url::toRoute($model->isNewRecord ?  '/members/portfolio/validation/' : '/members/portfolio/validation/?id='.$model->id), 'action' =>[$model->isNewRecord ? '/members/portfolio/create/' : '/members/portfolio/update/?id='.$model->id]]); ?>
    <h4 class="h4">Новий проект</h4>
    <div class="empty-space marg-lg-b20"></div>
    <div class="tt-project-new-img">
        <div class="tt-project-pic tt-img-upload">
            <span class="tt-project-pic-entry">
               <span class="tt-project-pic-icon"></span>
               <span class="simple-text size-2">Додати фото</span>
            </span>
            <?= $form->field($model, 'image[]')->fileInput(['data-name'=>"Portfolio", 'accept'=>"image/x-png,image/gif,image/jpeg"]) ?>

        </div>

<? foreach ($images as $val) { ?>
        <div class="tt-project-pic-loaded" data-id="0">
            <span style="background-image:url(/uploads/members/portfolio/thmb150/<?=$val['image']?>);"></span>
            <div class="button-close small"></div>
            <?= $form->field($model, 'images_uploaded[]')->hiddenInput(['value'=>$val['id']])->label(false);?>
        </div>
<? } ?>
    </div>
    <div class="empty-space marg-lg-b10"></div>
    <div class="tt-input-label">Назва робіт</div>
    <?=$form->field($model, 'title')->textInput(['class' => 'simple-input', 'placeholder' => "Наприклад, ремонт квартири під ключ"])->label(false); ?>

    <div class="empty-space marg-lg-b25"></div>
    <div class="tt-input-label">Вартість робіт</div>


    <?=$form->field($model, 'cost')->textInput(['class' => 'simple-input', 'placeholder' => "Наприклад, 2500 грн. за весь ремонт, 100 грн. за м2"])->label(false); ?>
    <div class="empty-space marg-lg-b25"></div>
    <div class="tt-input-label">Терміни та об'єми</div>
        <?=$form->field($model, 'capacity_term')->textInput(['class' => 'simple-input', 'placeholder' => "Наприклад, 32 м/кв за 2 тиждні"])->label(false); ?>
    <div class="empty-space marg-lg-b25"></div>
    <div class="tt-input-label">Опис виконаних робіт</div>
    <?= $form->field($model, 'description')->textarea(['class' => 'simple-input height-4', 'placeholder' => "Додайте загальний опис виконаних робіт", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>

    <div class="empty-space marg-lg-b40"></div>
    <div class="tt-buttons-block m10 text-right">

        <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3']) ?>
        <?= Html::resetButton('Відмінити', ['class' => 'button type-1 tt-project-new-close']) ?>
        <? if(!$model->isNewRecord) echo Html::a('Видалити', '/members/portfolio/delete/?id='.$model->id, ['class' => 'button type-1 color-4 delete-portfolio', 'data-id'=>$model->id, 'style'=>'display: inline-table;']); ?>




    </div>
<?php ActiveForm::end(); ?>


