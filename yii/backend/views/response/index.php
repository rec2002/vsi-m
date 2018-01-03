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
/* @var $searchModel backend\models\ResponseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Відгуки на майстрів');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-response-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?
    Modal::begin(['header' => '<h4>Дозвіл на публікацію відгуку</h4>', 'id'=>'modal', 'size' => 'modal-lg']);
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
                'filter'=>false,
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




                    if ($model->step==1) {

                     $meeting = array (1=>'успішно зустрілися', 2=>'відмінили зустріч');


                        // DetailView Attributes Configuration
                        $attributes = [
                            [
                                'group'=>true,
                                'label'=>'Інформація про виконавця',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->member->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->member->email,
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
                                        'value'=>$model->suggestion->member->first_name.' '.$model->suggestion->member->last_name.' '.$model->suggestion->member->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->member->phone,
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
                                        'value'=>$model->suggestion->member->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->member->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Інформація про замовника',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->order->member0->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->order->member0->email,
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
                                        'value'=>$model->suggestion->order->member0->first_name.' '.$model->suggestion->order->member0->last_name.' '.$model->suggestion->order->member0->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->order->member0->phone,
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
                                        'value'=>$model->suggestion->order->member0->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->order->member0->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Відгук',
                                'rowOptions'=>['class'=>'info'],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Крок',
                                        'displayOnly'=>true,
                                        'value'=>"Спілкування",
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Результат',
                                        'value'=>$meeting[$model->meeting],
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Оцінки',
                                        'displayOnly'=>true,
                                        'format'=>'raw',
                                        'value'=>'Вічливість : '.$model->devotion.'<br>На зв\'язку : '.$model->connected,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'label'=>'',
                                        'value'=>'',
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ]

                        ];


                     }


                    if ($model->step==2) {

                        $meeting = array (1=>'домовились і почали роботу', 2=>'відклали початок робіт', 3=>'не будемо починати роботи');

                        // DetailView Attributes Configuration
                        $attributes = [
                            [
                                'group'=>true,
                                'label'=>'Інформація про виконавця',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->member->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->member->email,
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
                                        'value'=>$model->suggestion->member->first_name.' '.$model->suggestion->member->last_name.' '.$model->suggestion->member->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->member->phone,
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
                                        'value'=>$model->suggestion->member->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->member->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Інформація про замовника',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->order->member0->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->order->member0->email,
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
                                        'value'=>$model->suggestion->order->member0->first_name.' '.$model->suggestion->order->member0->last_name.' '.$model->suggestion->order->member0->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->order->member0->phone,
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
                                        'value'=>$model->suggestion->order->member0->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->order->member0->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Відгук',
                                'rowOptions'=>['class'=>'info'],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Крок',
                                        'displayOnly'=>true,
                                        'value'=>"Виїзд на об'єкт",
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Результат',
                                        'value'=>$meeting[$model->meeting_result],
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Оцінки',
                                        'displayOnly'=>true,
                                        'format'=>'raw',
                                        'value'=>'Вічливість : '.$model->devotion.'<br>На зв\'язку : '.$model->connected.'<br>Пунктуальність : '.$model->punctuality.'<br>Дотримання ціни : '.$model->price,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>(($model->meeting_result==2) ? 'Запланована дата початку роботи' : '').(($model->meeting_result==3) ? 'Ваш коментар про зустріч з майстром' : ''),
                                        'value'=>(($model->meeting_result==2) ? date('d/m/Y', strtotime($model->date_continue))  : '').(($model->meeting_result==3) ? nl2br($model->meeting_comment) : ''),
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ]

                        ];


                    }


                    if ($model->step==3) {


                        $stage = array (1=>'робота в процесі', 2=>'робота завершена або зупинена');


                        // DetailView Attributes Configuration
                        $attributes = [
                            [
                                'group'=>true,
                                'label'=>'Інформація про виконавця',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->member->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->member->email,
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
                                        'value'=>$model->suggestion->member->first_name.' '.$model->suggestion->member->last_name.' '.$model->suggestion->member->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->member->phone,
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
                                        'value'=>$model->suggestion->member->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->member->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Інформація про замовника',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->order->member0->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->order->member0->email,
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
                                        'value'=>$model->suggestion->order->member0->first_name.' '.$model->suggestion->order->member0->last_name.' '.$model->suggestion->order->member0->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->order->member0->phone,
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
                                        'value'=>$model->suggestion->order->member0->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->order->member0->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Відгук',
                                'rowOptions'=>['class'=>'info'],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Крок',
                                        'displayOnly'=>true,
                                        'value'=>"Робота",
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Результат',
                                        'value'=>$stage[$model->stage],
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Оцінки',
                                        'displayOnly'=>true,
                                        'format'=>'raw',
                                        'value'=>'Вічливість : '.$model->devotion.'<br>На зв\'язку : '.$model->connected.'<br>Пунктуальність : '.$model->punctuality.'<br>Дотримання ціни : '.$model->price,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Днів до завершення?',
                                        'value'=>$model->days,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ]

                        ];

                    }


                    if ($model->step>=4) {


                        $role = array (0=>'Особисто виконував роботу', 1=>'Керував бригадою');

                        $images = Yii::$app->db->createCommand('SELECT * FROM `member_response_images` WHERE  response_id="'.$model->id.'" ORDER BY id')->queryAll();
                        $images_arr = array();
                        if (sizeof($images)) foreach ($images as $val) {
                            $images_arr[] = '<img src="/uploads/members/responses/thmb/'.$val['image'].'" >';
                        }


                        // DetailView Attributes Configuration
                        $attributes = [
                            [
                                'group'=>true,
                                'label'=>'Інформація про виконавця',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->member->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->member->email,
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
                                        'value'=>$model->suggestion->member->first_name.' '.$model->suggestion->member->last_name.' '.$model->suggestion->member->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->member->phone,
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
                                        'value'=>$model->suggestion->member->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->member->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Інформація про замовника',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'#',
                                        'displayOnly'=>true,
                                        'value'=>$model->suggestion->order->member0->id,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Email',
                                        'value'=>$model->suggestion->order->member0->email,
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
                                        'value'=>$model->suggestion->order->member0->first_name.' '.$model->suggestion->order->member0->last_name.' '.$model->suggestion->order->member0->surname,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'status',
                                        'format'=>'raw',
                                        'label'=>'Телефон',
                                        'value'=>$model->suggestion->order->member0->phone,
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
                                        'value'=>$model->suggestion->order->member0->company,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'attribute'=>'created_at',
                                        'format'=>'raw',
                                        'label'=>'Дата-час реєстрації',
                                        'value'=>$model->suggestion->order->member0->created_at,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                    ],
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Відгук',
                                'rowOptions'=>['class'=>'info'],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Крок',
                                        'displayOnly'=>true,
                                        'value'=>"Відгук завршений",
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Загальне враження',
                                        'value'=>($model->positive_negative ==2) ? 'Негативне' : 'Позитивне',
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'label'=>'Оцінки',
                                        'displayOnly'=>true,
                                        'format'=>'raw',
                                        'value'=>'Вічливість : '.$model->devotion.'<br>На зв\'язку : '.$model->connected.'<br>Пунктуальність : '.$model->punctuality.'<br>Дотримання ціни : '.$model->price.'<br>Дотримання термінів : '.$model->terms.'<br>Ціна/Якість :'.$model->quality,
                                        'valueColOptions'=>['style'=>'width:30%']
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Замовник особисто був(ла) на об\'єкті?',
                                        'value'=>($model->come_personality ==2) ? 'Taк. '.$role[$model->role] : 'Ні',
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'format'=>'raw',
                                        'label'=>'Що сподобалось?',
                                        'value'=>nl2br($model->positive_note),
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Виконавець робіт по договору',
                                        'value'=>$model->performer,
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ]
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'format'=>'raw',
                                        'label'=>'Що не сподобалось?',
                                        'value'=>nl2br($model->negative_note),
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Договір не підписували',
                                        'value'=>($model->dogovir ==1) ? 'Taк. ' : 'Ні',
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                            [
                                'columns' => [
                                    [
                                        'format'=>'raw',
                                        'label'=>'Загальний висновок',
                                        'value'=>nl2br($model->conclusion_note),
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                    [
                                        'format'=>'raw',
                                        'label'=>'Фото',
                                        'value'=>@implode('', $images_arr),
                                        'valueColOptions'=>['style'=>'width:30%'],
                                        'displayOnly'=>true
                                    ],
                                ],
                            ],
                        ];

                    }




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

            [
                'attribute' => 'member',
                'format' => 'raw',
                'value' => function($model){
                    if (!empty($model->suggestion->member->company)) {
                        $name = $model->suggestion->member->id.' : '.$model->suggestion->member->company;
                    } else {
                        $name = $model->suggestion->member->id.' : '.$model->suggestion->member->first_name.' '.$model->suggestion->member->last_name.' '.$model->suggestion->member->surname;
                    };
                    return str_replace('/admin/', '/', Html::a($name, ['professionals/default/profile', 'id' => $model->suggestion->member->id], ['target' => '_blank', 'data' => ['pjax' => 0]]));
                },
                'label' => 'Виконавець'

            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($model){
                    return str_replace('/admin/', '/', Html::a($model->suggestion->order->title, ['orders/default/detail', 'id' => $model->suggestion->order->id], ['target' => '_blank', 'data' => ['pjax' => 0]])) ;
                },
                'label' => 'Замовлення'

            ],
            [
                'attribute' => 'step',
                'format' => 'html',
                'label' => 'Статус',
                'value' => function($model){
                    return ($model->step==4 || $model->step==5) ? Html::a( ($model->step==5 ? 'Опубліковано': 'На модерації'), ['approve', 'id' => $model->id], ['class' => 'modalButton']) : 'не завершено';
                },
                'vAlign' => 'middle',
                'filter'=>Html::activeDropDownList($searchModel, 'step', array(4=>'Опубліковано', 5=>'На модерації'), ['class'=>'form-control', 'prompt'=>'-- Вибрати `Статус`--']),

            ],

            [
                'attribute' => 'updated_at',
                'value' => function($model){ return  date('d/m/Y H:i', strtotime($model->updated_at)); },
                'label' => 'Дата-час',
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
            'heading'=>'<i class="glyphicon  glyphicon-wrench"></i> Список відгуків',
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
