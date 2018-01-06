<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Підтримка');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-msg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Створити тікет', ['create'], ['class' => 'btn btn-success modalButton']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?
    Modal::begin(['header' => '<h4>Діалог з користувачом</h4>', 'id'=>'modal', 'size' => 'modal-lg']);
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
                'label'=>'#',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:3%']
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model){
                    return str_replace('/admin/', '/', Html::a($model['name'], ['professionals/default/profile', 'id' => $model['member_id']], ['target' => '_blank', 'data' => ['pjax' => 0]]));
                },
                'filter'=>false,
                'label' => 'Користувач'
            ],
            [
                'attribute' => 'msg',
                'format' => 'raw',
                'label' => 'Повідомлення',
                'filter'=>false
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){ return  date('d/m/Y H:i', strtotime($model['created_at'])); },
                'label' => 'Дата-час',
                'filter'=>false
            ],
            [
                'attribute' => 'update',
                'format' => 'html',
                'value' => function($model){


                     return Html::a('<i class="fa fa-comments-o"></i>',  ['update', 'id' => $model['id']], ['class' =>'btn btn-icon-only modalButton']).(($model['counts']>0) ? '<span class="label label-danger">'.$model['counts'].'</span>' : '');
                },
                'label' => 'Діалог',
                'filter'=>false
            ],

            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',

                'template' => '{delete}',
                'updateOptions' => ['label' => '<i class="fa fa-edit"></i>', 'title' => 'Редагувати елемент', 'class' =>'btn btn-icon-only  btn-primary modalButton'],
                'deleteOptions' => ['label' => '<i class="fa fa-close"></i>', 'title' => 'Видалити', 'class' =>'btn btn-icon-only  bg-red-active',
                    'data' => [
                        'confirm' => 'Ви справді хочете видалити? ',
                        'method' => 'post',
                        'pjax' => 0
                    ]],
            ]

        ],
        'panel' => [
            'heading'=>'<i class="glyphicon  glyphicon-wrench"></i> Замовлення"',
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
    <?php Pjax::end(); ?>
</div>


<?
echo $this->registerJs("(function(){


$(document).on('hide.bs.modal','#modal', function () {
    $.pjax.reload(\"#p1\", {type: \"POST\"})
});
    
})();" , \yii\web\View::POS_END );
?>