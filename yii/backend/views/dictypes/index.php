<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use \backend\models\Dictcategory;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Види робіт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictypes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати вид робіт', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>

    <style>
       td.image_64 img {height:64px;}
    </style>

    <?

    Modal::begin(['header' => '<h4>Додати/Редагувати вид робіт </h4>', 'id'=>'modal', 'size' => 'moda-lg']);
    echo "<div id='modalContent'></div>";
    Modal::end();



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
                'attribute' => 'parent',
                'value'=>'parentCat.name',
                'vAlign' => 'middle',
                'filter'=>Html::activeDropDownList($searchModel, 'parent', ArrayHelper::map(Dictcategory::findBySql('SELECT id, name FROM dict_category WHERE active=1 AND parent=0 AND types=0 ORDER BY priority ASC ')->all(), 'id', 'name'), ['class'=>'form-control', 'prompt'=>'--Вибрати категорію--']),

            ],
            [
                'attribute' => 'image',
                'format' => 'image',
                'label' => 'Іконка',
                'value'=>function($data) { return $data->smallImage; },
                'vAlign' => 'middle',
                'contentOptions' => ['class' => 'image_64'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:64px;']
            ],
            [
                'attribute' => 'on_main',
                'vAlign' => 'middle',
                'label' => 'Вивід на головній',
                'filter'=>false,
                'value' => function($model){ return ($model->on_main==0) ? '' : 'Так'; },
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:10%']
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

                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати категорію', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити', 'class' =>'btn btn-icon-only  bg-red-active',
                    'data' => [
                        'confirm' => 'Ви справді хочете видалити "вид робіт"? Разом з тим видаляться всі пов\'язані з ними "ціни на роботи". Якщо не впевненні краще деактивуйте пункт.',
                        'method' => 'post',
                        'pjax' => 0
                ]],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-align-justify"></i> Види робіт',
            'type'=>GridView::TYPE_PRIMARY,
            'footer'=>true
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
