<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\models\Dictpricerange;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вилка бюджету';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictpricerange-index">

    <h1><?= Html::encode($this->title) ?></h1>

 <!--   <p>
        <?= Html::a('Create Dictpricerange', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?php
    Modal::begin([
        'header' => '<h4>Редагування запису</h4>',
        'id'=>'modal',
        'size' => 'model-lg'
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>



    <?

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'id'=>'kv-grid-adm',
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],

        'pjax'=>true,
        'hover' => true,
        'showPageSummary' => false,
        'showFooter' => false,
        'export' => false,
        'resizableColumns'=>true,
        'columns' => [
            [
                'attribute' => 'id',
                'vAlign' => 'middle',
                'filter'=>false,
                'enableSorting' => false,
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:5%']
            ],
            [
                'attribute' => 'name',
                'vAlign' => 'middle',
                'enableSorting' => false,
            ],
            [
                'attribute' => 'budget_to',
                'vAlign' => 'middle',
                'enableSorting' => false,
                'value' => function ($model, $key, $index, $column) {
                    $arr = Dictpricerange::find()->asArray()->all();
                    if ($index==0) return '0 - '.number_format($model->budget_to, 2, ',', ' ');
                    elseif (sizeof($arr)==($index+1)) return number_format($arr[$index-1]['budget_to'], 2, ',', ' ').' - '.number_format($model->budget_to, 2, ',', ' ').' і більше';
                    else {
                        return number_format($arr[$index-1]['budget_to'], 2, ',', ' ').' - '.number_format($model->budget_to, 2, ',', ' ');
                    }
                },
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:20%']
            ],
            [
                'attribute' => 'price',
                'vAlign' => 'middle',
                'format' => ['decimal',2],
                'enableSorting' => false,
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:20%']
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'template' => '{update}',
                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати запис', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-align-justify"></i> Вилка бюджету',
            'type'=>GridView::TYPE_PRIMARY,
            'footer'=>false
        ],

        'persistResize'=>false,
        'toggleDataOptions' => [
            'all' => [
                'icon' => 'resize-full',
                'label' => 'Всі',
                'class' => 'btn btn-default',
                'title' => 'Показати все'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => 'По сторінках',
                'class' => 'btn btn-default',
                'title' => 'Перейти на першу сторінку'
            ],
        ],
        'bootstrap'=>true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>false,
    ]);


    ?>
</div>
