<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категорії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::button('Створити категорію', ['value'=>Url::to('/dictcategory/create'),'class' => 'btn btn-success modalButton']) ?>
    </p>





    <?php
    Modal::begin([
        'header' => '<h4>Редагування/Додавання категорій</h4>',
        'id'=>'modal',
        'size' => 'model-lg'
    ]);

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
                'attribute' => 'name',
                'vAlign' => 'middle',
            ],
            [
                'attribute' => 'priority',
                'vAlign' => 'middle',
                'filter'=>false,
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:10%']
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',

                'template' => '{active}&nbsp;{update}',

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

                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати категорію', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-align-justify"></i> Категорії',
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
