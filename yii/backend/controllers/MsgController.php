<?php

namespace backend\controllers;

use Yii;
use common\modules\members\models\MemberMsg;
use backend\models\MsgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MemberHelper;

/**
 * MsgController implements the CRUD actions for MemberMsg model.
 */
class MsgController extends Controller
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
     * Lists all MemberMsg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new MemberMsg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MemberMsg();

        if ($model->load(Yii::$app->request->post())) {


            Yii::$app->db->createCommand()->insert('support_tickets', ['member_id' => Yii::$app->request->post('MemberMsg')['member_id']])->execute();

            $model->ticket_id = Yii::$app->db->getLastInsertID();
            $model->member_id = Yii::$app->request->post('MemberMsg')['member_id'];
            $model->msg = Yii::$app->request->post('MemberMsg')['msg'];
            $model->support = Yii::$app->user->identity->getId();

            if ($model->save(false)) {
                Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                $id_msg = Yii::$app->db->getLastInsertID();
                Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>Yii::$app->request->post('MemberMsg')['member_id'], 'support'=>1])->execute();

                return['status'=>1];
            }

        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MemberMsg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new MemberMsg();

        $param_[':ticket_id'] = $id;
        $messages = Yii::$app->db->createCommand('SELECT *, DATE_FORMAT(created_at, "%d-%m-%Y") as created_at  FROM `member_msg` WHERE ticket_id=:ticket_id ORDER BY `created_at` ASC', $param_)->queryAll();

        Yii::$app->db->createCommand("DELETE u FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON msg.id=u.msg_id WHERE '".$id."'=msg.ticket_id AND u.status=0 AND u.support = 0")->execute();

        $messages_arr = array();
        if (sizeof($messages)) foreach ($messages as $key=>$val) {

            if ($key==0) $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');
            else if($messages[$key-1]['created_at']!=$val['created_at'])  $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');

            $type =  ($val['support']>0) ?  'who' : 'whom';
            if ($val['system']==1)  $type = 'system';

            $messages_arr[] = array('msg'=>$val['msg'], 'type'=>$type);
        }

        return $this->renderAjax('_form', [
            'model' => $model, 'messages'=>$messages_arr
        ]);
    }

    public function actionSavemsg($id) {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = new MemberMsg();

        if ($model->load(Yii::$app->request->post())) {
            $msg = trim(strip_tags(Yii::$app->request->post('MemberMsg')['msg']));
            $param[':suggestion_id'] = $id;
            $model->ticket_id = $id;

            $ticket = Yii::$app->db->createCommand('SELECT member_id  FROM `support_tickets` WHERE id="'.$id.'" ')->queryOne();

            $model->support = Yii::$app->user->identity->getId();
            $model->member_id = $ticket['member_id'];
            $model->msg =  $msg;
            if ($model->save(false)) {
                $id_msg = Yii::$app->db->getLastInsertID();
                Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>$ticket['member_id'], 'support'=>1])->execute();
                return['status'=>1, 'msg'=> nl2br($msg)];
            }
        }
        return['status'=>0, 'msg'=>'Bad request.'];
    }

    /**
     * Deletes an existing MemberMsg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->db->createCommand()->delete('support_tickets', ['id' => $id])->execute();
        return $this->redirect(['index']);
    }

    /**
     * Finds the MemberMsg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MemberMsg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MemberMsg::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
