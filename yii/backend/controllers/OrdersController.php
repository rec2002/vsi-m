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
use yii\helpers\Url;

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
            $url = str_replace('/admin//admin/', '/', Url::home(true).Url::toRoute(['/orders/default/detail', 'id' => $model->id]));
            if (Yii::$app->request->post('Orders')['status']==1) \common\components\MemberHelper::GetMailTemplate(6,  $model->attributes, $model->member0->email);
            if (Yii::$app->request->post('Orders')['status']==2) {

                // send to order owner
                \common\components\MemberHelper::GetMailTemplate(7,  array_merge($model->attributes, array('url'=> $url)), $model->member0->email);

                // send to suggested users
                if (!empty($model->suggestions)) {
                    $emails =  explode(',', $model->suggestions);
                    if (sizeof($emails)) foreach ($emails as $email) {
                        \common\components\MemberHelper::GetMailTemplate(9,  array_merge($model->attributes, array('url'=> $url)), $email);
                    }
                }
                $model->suggestions ='';



                $types = Yii::$app->db->createCommand('SELECT GROUP_CONCAT(t.type) as types FROM `order_types` t WHERE t.order_id = "'.$model->id.'" GROUP BY t.order_id')->queryOne()['types'];

                if (!empty($types)) {


                    $members = Yii::$app->db->createCommand('SELECT m.id, if (m.company!=\'\', m.company, CONCAT(m.first_name, \' \', m.surname, \' \', m.last_name)) as name, m.email, m.phone, n.email as notice_email, n.sms as notice_sms
                                                                    FROM `member_types` t
                                                                    LEFT JOIN `members` m ON t.member =  m.id
                                                                    LEFT JOIN `notices_members` n ON n.member = m.id AND n.notice_id=6
                                                                    WHERE t.type IN ('."'".implode("','", explode(',', $types))."'".') AND m.id <> "'.$model->member.'" GROUP BY m.id')->queryAll();

                    if (sizeof($members)) foreach ($members as $member) {
                        if ($member['notice_email']==1){
                            \common\components\MemberHelper::GetMailTemplate(13,  array('url'=> $url, 'name'=>$member['name']), $member['email']);

                        }
                        if ($member['notice_sms']==1){
                            \common\components\MemberHelper::GetSMSTemplate(13, array('url'=> $url, 'name'=>$member['name']), $member['phone']);

                        }

                    }

                }

            }




            $model->save();
            return $this->redirect(['index']);

        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }




}


