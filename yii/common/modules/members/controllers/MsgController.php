<?php

namespace common\modules\members\controllers;

use Yii;
use yii\helpers\Url;
use common\components\MemberHelper;
use common\modules\members\models\MemberMsg;
use common\modules\members\models\MemberSuggestion;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

class MsgController extends \common\modules\members\controllers\DefaultController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['majster', 'zamovnyk']
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?']
                    ]
                ]
            ]
        ];
    }


    public function actionIndex()
    {

        $filter = $filter_= array();

        if (@$_GET['filter']=='orders'){
            $filter[] = ' m.id=:member ';
            $filter_[] = ' member_id IS NOT NULL ';
        } elseif(@$_GET['filter']=='executors') {
            $filter[] = ' m1.id=:member ';
            $filter_[] = ' member_id IS NOT NULL ';
        } elseif(@$_GET['filter']=='support') {
            $filter_[] = ' member_id IS NULL ';
        } else {
            $filter[] = ' (m.id=:member OR m1.id=:member) ';

        }


        $param[':member'] = Yii::$app->user->identity->getId();

        $data = Yii::$app->db->createCommand(' SELECT * FROM (
 SELECT s.id as suggestion_id, 
 if (:member=m.id, m1.id, m.id) as member_id, 
 if (:member=m.id, m1.first_name, m.first_name) as first_name, 
 if (:member=m.id, m1.last_name, m.last_name) as last_name, 
 if (:member=m.id, m1.surname, m.surname) as surname, 
 if (:member=m.id, m1.company, m.company) as company, 
 if (:member=m.id, m1.avatar_image, m.avatar_image) as avatar_image, 
 if (:member=m.id, m1.phone, m.phone) as phone, 
(SELECT msg1.msg FROM `member_msg` msg1 WHERE msg1.suggestion_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as msg,
(SELECT msg1.created_at FROM `member_msg` msg1 WHERE msg1.suggestion_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as created_at,
(SELECT count(*) as count FROM `member_msg_unread` u
LEFT JOIN `member_msg` msg ON  msg.id=u.msg_id 
WHERE msg.suggestion_id = s.id AND u.status=0 AND u.member_id=:member) as counts

 FROM `member_suggestion` s 
 LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id 
 LEFT JOIN `members` m ON s.member_id = m.id 
 LEFT JOIN `orders` o ON s.order_id = o.id 
 LEFT JOIN `members` m1 ON o.member = m1.id 
 WHERE a.id IS NOT NULL '.((sizeof($filter)) ?  ' AND '.implode(' AND ', $filter) : '').'
 
 UNION
 
SELECT s.id as suggestion_id, 
 NULL as member_id, 
 CONCAT (\'Звернення № \', s.id) as first_name, 
 NULL as last_name, 
 NULL as surname, 
 NULL as company, 
 \'/img/masterbox/master_7_small.jpg\' as avatar_image, 
 NULL as phone, 
(SELECT msg1.msg FROM `member_msg` msg1 WHERE msg1.ticket_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as msg,
(SELECT msg1.created_at FROM `member_msg` msg1 WHERE msg1.ticket_id = s.id ORDER BY msg1.created_at DESC LIMIT 1) as created_at,
(SELECT count(*) as count FROM `member_msg_unread` u
LEFT JOIN `member_msg` msg ON  msg.id=u.msg_id 
WHERE msg.ticket_id =s.id AND u.status=0 AND u.member_id=:member AND u.support = 1) as counts

 FROM `support_tickets` s 
 LEFT JOIN `members` m ON s.member_id = m.id 
 WHERE  (m.id=:member)
 
 ) a WHERE 1=1 '.((sizeof($filter_)) ?  ' AND '.implode(' AND ', $filter_) : '').' ORDER BY created_at DESC', $param)->queryAll();




        return $this->render('chat', ['members'=>$data, 'msg'=>$this->actionDetail(@$_GET['id'])]);
    }



    public function actionDetail($id='') {

    //    if (empty($id)) return false;


        $param[':member'] = Yii::$app->user->identity->getId();

        if (isset($_GET['support_id']))  $id = $_GET['support_id'];

        if (empty($id)) return false;

        $param[':suggestion_id'] = $id;
        $filter[] = ' s.id=:suggestion_id ';
        $filter[] = ' (m.id=:member OR m1.id=:member) ';
        $param_[':suggestion_id'] = $id;


        if (@$_GET['support_id']>0) {

            Yii::$app->db->createCommand("DELETE u FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON msg.id=u.msg_id WHERE '".$id."'=msg.ticket_id AND u.status=0 AND u.support = 1")->execute();

            $data = Yii::$app->db->createCommand('SELECT s.id as suggestion_id, 
                 NULL as member_id, 
                 CONCAT (\'Звернення № \', s.id) as first_name, 
                 NULL as last_name, 
                 NULL as surname, 
                 NULL as company, 
                 \'/img/masterbox/master_7_small.jpg\' as avatar_image, 
                 \'\' as phone, 
                 if (msg.support IS NULL && msg.system!=1, CONCAT (\'Ви: \', msg.msg), msg.msg) as msg, 
                 if (msg.created_at IS NULL, s.created_at, msg.created_at) as created_at,
                 NULL as price_from, 
                 NULL as price_to, 
                 NULL as start_from, 
                 NULL as start_to, 
                 NULL as payment_object, NULL as come_personally, NULL as prepayment, NULL as prepayment_material, NULL as descriptions, NULL as dates, NULL as order_id, NULL as title, NULL as budget 
                 FROM `support_tickets` s 
                 LEFT JOIN `members` m ON s.member_id = m.id 
                 LEFT JOIN (SELECT * FROM `member_msg` msg ORDER BY msg.created_at DESC LIMIT 1) msg ON msg.ticket_id = s.id
                 WHERE s.id="'.$id.'"  ', $param)->queryAll();

                 $messages = Yii::$app->db->createCommand('SELECT *, DATE_FORMAT(created_at, "%d-%m-%Y") as created_at  FROM `member_msg` WHERE ticket_id=:suggestion_id ORDER BY `created_at` ASC', $param_)->queryAll();
        } else {


            Yii::$app->db->createCommand("DELETE u FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON msg.id=u.msg_id WHERE '".$id."'=msg.suggestion_id AND u.member_id = '".Yii::$app->user->identity->getId()."' AND u.status=0 AND u.support = 0")->execute();

            $data = Yii::$app->db->createCommand('
                SELECT s.id as suggestion_id,
                if (:member=m.id, m1.id, m.id) as member_id,
                if (:member=m.id, m1.first_name, m.first_name) as first_name,
                if (:member=m.id, m1.last_name, m.last_name) as last_name,
                if (:member=m.id, m1.surname, m.surname) as surname,
                if (:member=m.id, m1.company, m.company) as company,
                if (:member=m.id, m1.avatar_image, m.avatar_image) as avatar_image,
                if (:member=m.id, m1.phone, m.phone) as phone, 
                s.price_from, s.price_to, s.start_from, s.start_to, s.payment_object, s.come_personally, s.prepayment, s.prepayment_material, s.descriptions, s.dates,
                 s.order_id, o.title,  o.budget 
                  FROM `member_suggestion` s
                LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id
                LEFT JOIN `members` m ON s.member_id = m.id
                LEFT JOIN `orders` o ON s.order_id = o.id
                LEFT JOIN `members` m1 ON o.member = m1.id
                WHERE a.id IS NOT NULL  ' . ((sizeof($filter)) ? ' AND ' . implode(' AND ', $filter) : '') . ' ', $param)->queryAll();
                $messages = Yii::$app->db->createCommand('SELECT *, DATE_FORMAT(created_at, "%d-%m-%Y") as created_at  FROM `member_msg` WHERE  suggestion_id=:suggestion_id ORDER BY `created_at` ASC', $param_)->queryAll();
        }

        $messages_arr = array();
        if (sizeof($messages)) foreach ($messages as $key=>$val) {

            if ($key==0) $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');
            else if($messages[$key-1]['created_at']!=$val['created_at'])  $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');

            if (@$_GET['support_id']>0)
                $type =  ($val['member_id']==Yii::$app->user->identity->getId() && $val['support']==0) ?  'who' : 'whom';
            else
                $type =  ($val['member_id']==Yii::$app->user->identity->getId()) ?  'who' : 'whom';

            if ($val['system']==1)  $type = 'system';
            $messages_arr[] = array('msg'=>$val['msg'], 'type'=>$type);
        }
        $model= new MemberMsg();
        return $this->renderPartial('msg-window', ['model'=>$data[0], 'messages'=>$messages_arr, 'message'=>$model]);
    }

    public function actionSavemsg($id) {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = new MemberMsg();

        if ($model->load(Yii::$app->request->post())) {

            $msg = trim(strip_tags(Yii::$app->request->post('MemberMsg')['msg']));

            $param[':suggestion_id'] = $id;


            if (Yii::$app->request->get('support')==0) {

                $data = Yii::$app->db->createCommand('
                SELECT s.id, s.member_id as member1, m1.id as member2  FROM `member_suggestion` s
                    LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id
                    LEFT JOIN `orders` o ON s.order_id = o.id
                    LEFT JOIN `members` m1 ON o.member = m1.id
                WHERE a.id IS NOT NULL AND s.id=:suggestion_id ', $param)->queryOne();


                $member_id = ($data['member1']==Yii::$app->user->identity->getId()) ? $data['member2'] : $data['member1'];
                $model->suggestion_id = $id;
            } else {
                $member_id = Yii::$app->user->identity->getId();
                $model->ticket_id = $id;
                $model->support = 0;
            }

            $model->member_id = Yii::$app->user->identity->getId();
            $model->msg =  $msg;

            if ($model->save(false)) {
                $id_msg = Yii::$app->db->getLastInsertID();
                Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>$member_id,  'support'=>0])->execute();
                $id_unread = Yii::$app->db->getLastInsertID();
                return['status'=>1, 'msg'=> nl2br($msg), 'id_unread'=>$id_unread];
            }

        }
        return['status'=>0, 'msg'=>'Bad request.'];


    }

}
