<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use \backend\models\Dictcategory;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictjobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ціни на роботи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictjobs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Створити пункт \'Ціни на роботи\'', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>
<?

Modal::begin(['header' => '<h4>Додати/Редагувати \'Ціни на роботи\' </h4>', 'id'=>'modal', 'size' => 'moda-lg']);
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
            'contentOptions' => function($model)  {

                return ['style' => '' . (($model->job_markup==0) ? '' : 'font-weight:Bold')];
            },
        ],
        [
            'attribute' => 'parent',
            'value'=>'parenTypes.name',
            'vAlign' => 'middle',
            'filter'=>Html::activeDropDownList($searchModel, 'parent', ArrayHelper::map(Dictcategory::findBySql('SELECT id, name FROM dict_category WHERE active=1 AND types=1 ORDER BY name ASC ')->all(), 'id', 'name'), ['class'=>'form-control', 'prompt'=>'-- Вибрати `Вид робіт`--']),

        ],
        [
            'attribute' => 'job_unit',
            'vAlign' => 'middle',
            'filter'=>false,
            'value' => function($model){
                  $types =  array(1=>'грн. / год', 2=>'грн. / шт.', 3=>'грн. / м2', 4=>'грн. / м3', 5=>'грн. / м/п', 6=>'грн. / місце');
                  return  $types[$model->job_unit];
            },
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
                    'confirm' => 'Ви справді хочете видалити цей елемент? ',
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
