<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\members\models\MemberResponse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member Responses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-response-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'suggestion_id',
            'step',
            'active',
            'devotion',
            'connected',
            'punctuality',
            'price',
            'terms',
            'quality',
            'meeting',
            'meeting_result',
            'meeting_comment:ntext',
            'date_continue',
            'stage',
            'days',
            'positive_negative',
            'come_personality',
            'role',
            'positive_note:ntext',
            'negative_note:ntext',
            'performer',
            'dogovir',
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
