<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Питання та відповіді';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати "Питання відповідь"', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>


    <?php
    Modal::begin(['header' => '<h4>Додати/редагувати "Питання та відповіді" </h4>', 'id'=>'modal',  'size' => 'model-lg']);
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
                'attribute' => 'question',
                'vAlign' => 'middle',
                'contentOptions' => ['style' => 'max-width:150px;white-space: normal;']
            ],
            [
                'attribute' => 'parent',
                'value'=>'parentCat.name',
                'vAlign' => 'middle',
                'filter'=>Html::activeDropDownList($searchModel, 'parent', ArrayHelper::map(backend\models\FaqGroups::findBySql('SELECT id, name FROM `faq_groups` WHERE active=1 ORDER BY priority ASC ')->all(), 'id', 'name'), ['class'=>'form-control', 'prompt'=>'--Вибрати групу--']),

            ],
            [
                'attribute' => 'priority',
                'vAlign' => 'middle',
                'filter'=>false,
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

                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати елемент', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити елемент', 'class' =>'btn btn-icon-only  bg-red-active',
                    'data' => [
                        'confirm' => 'Ви справді хочете видалити елемент? ',
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
