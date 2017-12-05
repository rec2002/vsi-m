<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use \backend\models\Dictcategory;
use common\components\MemberHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DictjobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ціни на роботи';
$this->params['breadcrumbs'][] = $this->title;

?>


<?   Pjax::begin(); ?>
<div class="dictjobs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Створити пункт \'Ціни на роботи\'', ['create', 'parent'=>@Yii::$app->request->get('DictjobsSearch')['parent']], ['class' => 'btn btn-success modalButton']) ?>
    </p>
<?




Modal::begin(['header' => '<h4>Додати/Редагувати \'Ціни на роботи\' </h4>', 'id'=>'modal', 'size' => 'moda-lg']);
echo "<div id='modalContent'></div>";
Modal::end();


$types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();
if (sizeof($types)) {
    $data = array();
    foreach ($types as $key=>$val) {
        $data[$val['parent_name']][$val['id']] =  $val['name'];
    }
}



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
            'filter'=>Html::activeDropDownList($searchModel, 'parent', $data, ['class'=>'form-control', 'prompt'=>'-- Вибрати `Вид робіт`--']),

        ],
        [
            'attribute' => 'job_unit',
            'vAlign' => 'middle',
            'filter'=>false,
            'value' => function($model){

                  return  MemberHelper::PRICE_TYPE[$model->job_unit];
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


Pjax::end();


?>

</div>
<?


echo $this->registerJs("(function(){





    $(document).on('submit', 'form.modal-form', function(e) {




        $.post($(this).attr('action'), $(this).serialize()).done(function(data ) {
             var data = JSON.parse(data);
             console.log(data);
            if (data.status == 1) {
              $('#modal').modal('hide');
              $.pjax.reload({container:'#kv-grid-adm'});
            }   else alert('Bad request');

        });

        return false;
        
    });




        
})();" , \yii\web\View::POS_END );





?>