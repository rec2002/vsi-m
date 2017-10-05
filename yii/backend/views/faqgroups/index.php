<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Групи для "Питтання та відповіді"';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати групу', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>

    <?php
    Modal::begin(['header' => '<h4>Додати/редагувати групу </h4>', 'id'=>'modal',  'size' => 'model-lg']);
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
                'attribute' => 'name',
                'vAlign' => 'middle',
            ],
            [
                'attribute' => 'priority',
                'vAlign' => 'middle',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:20%']
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',

                'template' => '{active}&nbsp;{update}&nbsp;{delete}',

                'buttons' => [
                    'active' => function ($url, $model, $key) {

                        if ($model->active==1)   return Html::a('<i class="fa fa-eye"></i>', $url, [
                            'class' =>'btn btn-icon-only  btn-success set_action',
                            'data-pjax'=>1
                        ]);
                        else return Html::a('<i class="fa fa-eye-slash"></i>', $url, [
                            'class' =>'btn btn-icon-only  btn-danger set_action',
                            'data-pjax'=>1
                        ]);


                    },
                ],

                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати групу', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити групу', 'class' =>'btn btn-icon-only  bg-red-active',
                    'data' => [
                        'confirm' => 'Ви справді хочете видалити групу? ',
                        'method' => 'post',
                        'pjax' => 0
                    ]],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-align-justify"></i> Групи для "Питтання та відповіді"',
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
