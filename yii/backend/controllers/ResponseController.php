<?php

namespace backend\controllers;

use common\components\MemberHelper;
use Yii;
use common\modules\members\models\MemberResponse;
use backend\models\ResponseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

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


            $model->message_approve  = Yii::$app->request->post('MemberResponse')['message_approve'];
            $model->step = Yii::$app->request->post('MemberResponse')['step'];


            if ($model->save('false')) {

                $param[':response'] = $id;

                $members = Yii::$app->db->createCommand('
                   SELECT m2.id as owner_id, if (m2.company!=\'\', m2.company, CONCAT(m2.first_name, \' \', m2.surname, \' \', m2.last_name)) as owmer_name, m2.email as owner_email,
                          m1.id as recipient_id, if (m1.company!=\'\', m1.company, CONCAT(m1.first_name, \' \', m1.surname, \' \', m1.last_name)) as recipient_name, m1.email as recipient_email, m1.phone as recipient_phone,  r.suggestion_id, s.order_id
                   FROM `member_response` r
                   LEFT JOIN `member_suggestion` s ON s.id =  r.suggestion_id
                   LEFT JOIN `members` m1 ON m1.id = s.member_id
                   LEFT JOIN `orders` o ON o.id = s.order_id
                   LEFT JOIN  `members` m2 ON m2.id = o.member
                   WHERE r.id =:response ', $param)->queryOne();


                $url = str_replace('/admin//admin/', '/', Url::home(true) . Url::toRoute(['/members/response/create', 'id' => $members['suggestion_id']]));

                if (Yii::$app->request->post('MemberResponse')['step'] == 5) {

                    \common\components\MemberHelper::GetMailTemplate(10, array_merge($model->attributes, array('url' => $url, 'name' => $members['owmer_name'])), $members['owner_email']);

                    if (MemberHelper::GetAccessNotification($members['recipient_id'], 7)['email'] == 1) {
                        $url1 = str_replace('/admin//admin/', '/', Url::home(true) . Url::toRoute(['/professionals/default/profile', 'id' => $members['recipient_id']]));
                       \common\components\MemberHelper::GetMailTemplate(12, array_merge($model->attributes, array('url' => $url, 'url1' => $url1, 'name' => $members['recipient_name'])), $members['recipient_email']);
                    }

                    if (MemberHelper::GetAccessNotification($members['recipient_id'], 7)['sms'] == 1) {
                        \common\components\MemberHelper::GetSMSTemplate(12, $model->attributes, $members['recipient_phone']);
                    }

					
					Yii::$app->db->createCommand()->update('orders', ['status'=>4], ' id="'.$members['order_id'].'"')->execute();	
					
                    Yii::$app->db->createCommand()->insert('member_msg', ['suggestion_id' => $members['suggestion_id'], 'member_id'=>$members['recipient_id'], 'msg'=>'Додавно відгук про виконавця',  'system'=>1])->execute();
                    $id_msg = Yii::$app->db->getLastInsertID();
                    Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>$members['recipient_id'],  'support'=>0])->execute();

                }

                if (Yii::$app->request->post('MemberResponse')['step'] == 3) {
					Yii::$app->db->createCommand()->update('orders', ['status'=>2], ' id="'.$members['order_id'].'"')->execute();				
                    \common\components\MemberHelper::GetMailTemplate(11, array_merge($model->attributes, array('url' => $url, 'name' => $members['owmer_name'], 'message_approve' => (!empty(Yii::$app->request->post('MemberResponse')['message_approve']) ? 'Причина відмови: <b>' . Yii::$app->request->post('MemberResponse')['message_approve'] . '</b>' : ''))), $members['owner_email']);
                }
            }
            return $this->redirect(['index']);

        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionFeedback($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {


            $model->feedback_text_approve  = Yii::$app->request->post('MemberResponse')['feedback_text_approve'];
            $model->feedback_approve  = Yii::$app->request->post('MemberResponse')['feedback_approve'];


            if ($model->save('false')) {

                $param[':response'] = $id;

                $members = Yii::$app->db->createCommand('
                   SELECT m2.id as owner_id, if (m2.company!=\'\', m2.company, CONCAT(m2.first_name, \' \', m2.surname, \' \', m2.last_name)) as owmer_name, m2.email as owner_email, m2.phone as owner_phone,
                          m1.id as recipient_id, if (m1.company!=\'\', m1.company, CONCAT(m1.first_name, \' \', m1.surname, \' \', m1.last_name)) as recipient_name, m1.email as recipient_email, m1.phone as recipient_phone,  r.suggestion_id
                   FROM `member_response` r
                   LEFT JOIN `member_suggestion` s ON s.id =  r.suggestion_id
                   LEFT JOIN `members` m1 ON m1.id = s.member_id
                   LEFT JOIN `orders` o ON o.id = s.order_id
                   LEFT JOIN  `members` m2 ON m2.id = o.member
                   WHERE r.id =:response ', $param)->queryOne();


                $url = str_replace('/admin//admin/', '/', Url::home(true) . Url::toRoute(['/members/response/create', 'id' => $members['suggestion_id']]));
                $url1 = str_replace('/admin//admin/', '/', Url::home(true) . Url::toRoute(['/professionals/default/profile', 'id' => $members['recipient_id']]));

                if (Yii::$app->request->post('MemberResponse')['feedback_approve'] == 2) {

                    \common\components\MemberHelper::GetMailTemplate(14, array_merge($model->attributes, array('url' => $url, 'url1' => $url1, 'name' => $members['recipient_name'])), $members['recipient_email']);

                    if (MemberHelper::GetAccessNotification($members['owner_id'], 7)['email'] == 1) {

                        \common\components\MemberHelper::GetMailTemplate(16, array_merge($model->attributes, array('url' => $url, 'url1' => $url1, 'name' => $members['owmer_name'])), $members['owner_email']);
                    }

                    if (MemberHelper::GetAccessNotification($members['owner_id'], 7)['sms'] == 1) {
                        \common\components\MemberHelper::GetSMSTemplate(16, $model->attributes, $members['owner_phone']);
                    }

                    Yii::$app->db->createCommand()->insert('member_msg', ['suggestion_id' => $members['suggestion_id'], 'member_id'=>$members['owner_id'], 'msg'=>'Додавно коментар виконавця на відгук замовника',  'system'=>1])->execute();
                    $id_msg = Yii::$app->db->getLastInsertID();
                    Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>$members['owner_id'],  'support'=>0])->execute();

                }

                if (Yii::$app->request->post('MemberResponse')['feedback_approve'] == 0) {
                    \common\components\MemberHelper::GetMailTemplate(15, array_merge($model->attributes, array('url' => $url, 'name' => $members['recipient_name'], 'feedback_text_approve' => (!empty(Yii::$app->request->post('MemberResponse')['feedback_text_approve']) ? 'Причина відмови: <b>' . Yii::$app->request->post('MemberResponse')['feedback_text_approve'] . '</b>' : ''))), $members['recipient_email']);
                }
            }
            return $this->redirect(['index']);

        } else {
            return $this->renderAjax('_formF', [
                'model' => $model,
            ]);
        }
    }


}
