<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Публікації';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publish-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати публікацію', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>
    <style>
        td.image_64 img {height:64px;}
    </style>


    <?php
    Modal::begin(['header' => '<h4>Додати/редагувати публікацію </h4>', 'id'=>'modal',  'size' => 'modal-lg']);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'attribute' => 'title',
                'vAlign' => 'middle',
                'contentOptions' => ['style' => 'max-width:200px;white-space: normal;']
            ],
            [
                'attribute' => 'image',
                'format' => 'image',
                'label' => '',
                'value'=>function($data) { return $data->smallImage; },
                'vAlign' => 'middle',
                'filter'=>false,
                'contentOptions' => ['class' => 'image_64'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:64px;']
            ],
            [
                'attribute' => 'date_publish',
                'format' => ['date', 'php:d/m/Y'],
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:10%']
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

                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати публікацію', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити  публікацію', 'class' =>'btn btn-icon-only  bg-red-active',
                    'data' => [
                        'confirm' => 'Ви справді хочете видалити публікацію? ',
                        'method' => 'post',
                        'pjax' => 0
                    ]],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon  glyphicon-question-sign"></i> Групи для "Питтання та відповіді"',
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
