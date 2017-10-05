<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Шаблони листів/SMS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-template-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Mail Template', ['create'], ['class' => 'btn btn-success']) ?>
    </p>




    <?php
    Modal::begin([
        'header' => '<h4>Редагування/Додавання шаблону</h4>',
        'id'=>'modal',
        'size' => 'modal-lg'
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
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:5%']
            ],
            [
                'attribute' => 'subject',
                'vAlign' => 'middle',
            ],
            [
                'attribute' => 'emails',
                'vAlign' => 'middle',
                'filter'=>false,
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:40%']
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',

                'template' => '{update}',
                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати шаблон', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-align-justify"></i> Шаблони листів/SMS',
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
