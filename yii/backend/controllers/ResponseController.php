<?php

namespace backend\controllers;

use Yii;
use common\modules\members\models\MemberResponse;
use backend\models\ResponseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResponseController implements the CRUD actions for MemberResponse model.
 */
class ResponseController extends Controller
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
     * Lists all MemberResponse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResponseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MemberResponse model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MemberResponse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MemberResponse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MemberResponse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MemberResponse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MemberResponse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MemberResponse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MemberResponse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

/*
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
            $url = str_replace('/admin//admin/', '/', Url::home(true).Url::toRoute(['/orders/default/detail', 'id' => $model->id]));
            if (Yii::$app->request->post('Orders')['status']==1) \common\components\MemberHelper::GetMailTemplate(6,  $model->attributes, $model->member0->email);
            if (Yii::$app->request->post('Orders')['status']==2) {
                \common\components\MemberHelper::GetMailTemplate(7,  array_merge($model->attributes, array('url'=> $url)), $model->member0->email);
                if (!empty($model->suggestions)) {

                    $emails =  explode(',', $model->suggestions);
                    if (sizeof($emails)) foreach ($emails as $emil) {
                        \common\components\MemberHelper::GetMailTemplate(9,  array_merge($model->attributes, array('url'=> $url)), $emil);
                    }
                }
                $model->suggestions ='';
            }
            $model->save();
*/

            return $this->redirect(['index']);

        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }


}
