<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\members\models\MemberResponse */

$this->title = Yii::t('app', 'Create Member Response');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Responses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
