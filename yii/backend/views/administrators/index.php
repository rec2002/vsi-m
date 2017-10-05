<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Адміністратори';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administrators-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити адміністратора/модератора', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>
<?php
    Modal::begin(['header' => '<h4>Редагування/Додавання користувача</h4>', 'id'=>'modal', 'size' => 'model-lg']);
    echo "<div id='modalContent'></div>";
    Modal::end();
?>



<?=GridView::widget([
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
            ['attribute' => 'first_name', 'vAlign' => 'middle'],
            ['attribute' => 'username', 'vAlign' => 'middle'],
            ['attribute' => 'email', 'vAlign' => 'middle'],
            ['attribute' => 'role', 'value' => function($model){ return ($model->role==0) ? 'Адміністратор' : 'Модератор'; }],
            ['attribute' => 'created_at',  'format' => ['date', 'php:d/m/Y H:i']],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'template' => '{update} {delete}',
                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити', 'class' =>'btn btn-icon-only  bg-red-active',
                'data' => [
                    'confirm' => 'Видалити адміністратора?',
                    'method' => 'post',
                    'pjax' => 0
                ]],
            ]
        ],
        'panel' => [
            'heading'=>'<i class="glyphicon glyphicon-user"></i> Список користувачів',
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
