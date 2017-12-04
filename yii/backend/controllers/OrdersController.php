<?php

namespace backend\controllers;

use Yii;
use common\modules\members\models\Orders;
use backend\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\modules\members\models\OrderTypes;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 /*
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
*/
    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
/*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
*/
    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {


            $model->reason_for_refusal = Yii::$app->request->post('Orders')['reason_for_refusal'];
            $model->status = Yii::$app->request->post('Orders')['status'];
            $old = ArrayHelper::getColumn(OrderTypes::findBySql('SELECT id, type  FROM order_types WHERE order_id="'.$model->id.'" ')->asArray()->all(), 'type');
            $new = (is_array(Yii::$app->request->post('Orders')['types'])) ? Yii::$app->request->post('Orders')['types'] : array() ;
            if (sizeof($old)) foreach ($old as $val) {
                if (!@in_array($val, $new)) {
                    Yii::$app->db->createCommand()->delete('order_types', ['type' => $val, 'order_id'=>$model->id])->execute();
                }
            }

            if (sizeof($new)) foreach ($new as $val) {
                if (!in_array($val, $old)) {
                    Yii::$app->db->createCommand()->insert('order_types', ['type' => $val, 'order_id'=>$model->id])->execute();
                }
            }

            if (Yii::$app->request->post('Orders')['status']==1) \common\components\MemberHelper::GetMailTemplate(6,  $model->attributes, $model->member0->email);
            if (Yii::$app->request->post('Orders')['status']==2) \common\components\MemberHelper::GetMailTemplate(7,  $model->attributes, $model->member0->email);

            $model->save();
            return $this->redirect(['index']);

        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }




}


