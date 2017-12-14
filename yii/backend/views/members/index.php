<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\editable\Editable;
use yii\bootstrap\Modal;
use kartik\detail\DetailView;
use common\components\MemberHelper;
use common\modules\members\models\OrderTypes;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виконавці/Замовники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?
    Modal::begin(['header' => '<h4>Дозвіл на публікацію замовлення</h4>', 'id'=>'modal', 'size' => 'modal-md']);
    echo "<div id='modalContent'></div>";
    Modal::end();

    ?>

<?php Pjax::begin(); ?>


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
                'filter'=>true,
                'label'=>'#',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center', 'style'=>'width:3%']
            ],


            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {



                    // DetailView Attributes Configuration
                    $attributes = [
                        [
                            'group'=>true,
                            'label'=>'Інформація про користувача',
                            'rowOptions'=>['class'=>'info']
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'id',
                                    'label'=>'#',
                                    'displayOnly'=>true,
                                    'valueColOptions'=>['style'=>'width:30%']
                                ],
                                [
                                    'attribute'=>'status',
                                    'format'=>'raw',
                                    'label'=>'Email',
                                    'value'=>$model->email,
                                    'valueColOptions'=>['style'=>'width:30%'],
                                    'displayOnly'=>true
                                ],
                            ],
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'status',
                                    'format'=>'raw',
                                    'label'=>'ФІО',
                                    'value'=>$model->first_name.' '.$model->last_name.' '.$model->surname,
                                    'valueColOptions'=>['style'=>'width:30%'],
                                    'displayOnly'=>true
                                ],
                                [
                                    'attribute'=>'status',
                                    'format'=>'raw',
                                    'label'=>'Телефон',
                                    'value'=>$model->phone,
                                    'valueColOptions'=>['style'=>'width:30%'],
                                    'displayOnly'=>true
                                ],
                            ],
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'company',
                                    'format'=>'raw',
                                    'label'=>'Назва компанії',
                                    'value'=>$model->company,
                                    'valueColOptions'=>['style'=>'width:30%'],
                                    'displayOnly'=>true
                                ],
                                [
                                    'attribute'=>'created_at',
                                    'format'=>'raw',
                                    'label'=>'Дата-час реєстрації',
                                    'value'=>$model->created_at,
                                    'valueColOptions'=>['style'=>'width:30%'],
                                ],
                            ],
                        ]
                    ];


                    return DetailView::widget([
                        'model' => $model,
                        'attributes' => $attributes,
                        'mode' => 'view',
                        'responsive'=>true,
                        'bordered' => false,
                        'deleteOptions'=>[ // your ajax delete parameters
                            'params' => ['id' => 1000, 'kvdelete'=>true],
                        ],
                        'container' => ['id'=>'kv-'.$model->id],
                        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                    ]);



                    //  return Yii::$app->controller->renderPartial('member', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true
            ],
            'email:email',
            [
                'attribute' => 'member',
                'format' => 'html',
                'value' => function($model){
                    if (!empty($model->company)) {

                        return $model->id.' : '.$model->company;
                    } else {
                        return $model->id.' : '.$model->first_name.' '.$model->last_name.' '.$model->surname;
                    };
                },
                'label' => 'Коритувач'

            ],

            [
                'attribute' => 'approved',
                'format' => 'html',
                'value' => function($model){


                    $mayster = Yii::$app->db->createCommand("SELECT user_id FROM auth_assignment WHERE item_name='majster' AND user_id='".$model->id."' ")->queryOne();


                    if ($mayster['user_id']>0) {

                        if ($model->approved==1)
                            return Html::a('<i class="fa fa-user-circle"></i>',  ['approve', 'id' => $model->id], [
                                'class' =>'btn btn-icon-only  set_action modalButton',
                            ]);

                        else
                            return Html::a('<i class="fa fa-user"></i>',  ['approve', 'id' => $model->id], [
                                'class' =>'btn btn-icon-only  set_action modalButton',
                            ]);


                    } else return '&nbsp;';



                },
                'label' => 'Ідентифікований',
                'filter'=>false
            ],
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign' => 'middle',
                'hAlign' => 'center',

                'template' => '{delete}',
                /*               'template' => '{update}&nbsp;{delete}',
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
                */
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
            'heading'=>'<i class="glyphicon  glyphicon-users"></i> Виконавці/Замовники',
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



<?php Pjax::end(); ?></div>
