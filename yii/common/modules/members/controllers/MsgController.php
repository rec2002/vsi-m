<?php

namespace common\modules\members\controllers;

use Yii;
use yii\helpers\Url;
use common\components\MemberHelper;
use common\modules\members\models\MemberMsg;
use common\modules\members\models\MemberSuggestion;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;

class MsgController extends \common\modules\members\controllers\DefaultController
{
    public function actionIndex()
    {

        $filter = array();

        if (@$_GET['filter']=='orders'){
            $filter[] = ' m.id=:member ';
        } elseif(@$_GET['filter']=='executors') {
            $filter[] = ' m1.id=:member ';
        } elseif(@$_GET['filter']=='support') {
        } else {
            $filter[] = ' (m.id=:member OR m1.id=:member) ';
        }


        $param[':member'] = Yii::$app->user->identity->getId();


        $data = Yii::$app->db->createCommand('
            SELECT s.id as suggestion_id,
            if (:member=m.id, m1.id, m.id) as member_id,
            if (:member=m.id, m1.first_name, m.first_name) as first_name,
            if (:member=m.id, m1.last_name, m.last_name) as last_name,
            if (:member=m.id, m1.surname, m.surname) as surname,
            if (:member=m.id, m1.company, m.company) as company,
            if (:member=m.id, m1.avatar_image, m.avatar_image) as avatar_image,
            
             s.order_id, o.title, m1.phone as  order_phone, msg.id, if (:member=msg.who_id && msg.system!=1, CONCAT (\'Ви: \', msg.msg), msg.msg) as msg, 
             if (msg.created_at IS NULL, a.created_at, msg.created_at) as created_at
              FROM `member_suggestion` s
            LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id
            LEFT JOIN `members` m ON s.member_id = m.id
            LEFT JOIN `orders` o ON s.order_id = o.id
            LEFT JOIN `members` m1 ON o.member = m1.id
            LEFT JOIN (SELECT  *  FROM `member_msg` msg ORDER BY msg.created_at DESC LIMIT 1) msg ON msg.suggestion_id = s.id
            WHERE a.id IS NOT NULL  '.((sizeof($filter)) ?  ' AND '.implode(' AND ', $filter) : '').' ORDER BY created_at DESC', $param)->queryAll();




        return $this->render('chat', ['members'=>$data, 'msg'=>$this->actionDetail(@$_GET['id'])]);
    }



    public function actionDetail($id='') {

        if (empty($id)) return false;


        $param[':member'] = Yii::$app->user->identity->getId();
        $param[':suggestion_id'] = $id;
        $filter[] = ' s.id=:suggestion_id ';
        $filter[] = ' (m.id=:member OR m1.id=:member) ';

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


        $param_[':suggestion_id'] = $id;

        $messages = Yii::$app->db->createCommand('SELECT *, DATE_FORMAT(created_at, "%d-%m-%Y") as created_at  FROM `member_msg` WHERE  suggestion_id=:suggestion_id ORDER BY `created_at` ASC', $param_)->queryAll();


        $messages_arr = array();
        if (sizeof($messages)) foreach ($messages as $key=>$val) {

            if ($key==0) $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');
            else if($messages[$key-1]['created_at']!=$val['created_at'])  $messages_arr[] = array('msg'=>MemberHelper::ListDates($val['created_at']), 'type'=>'date');

            $type =  ($val['who_id']==Yii::$app->user->identity->getId()) ?  'who' : 'whom';
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
            $data = Yii::$app->db->createCommand('
            SELECT s.id, s.member_id as member1, m1.id as member2  FROM `member_suggestion` s
                LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id
                LEFT JOIN `orders` o ON s.order_id = o.id
                LEFT JOIN `members` m1 ON o.member = m1.id
            WHERE a.id IS NOT NULL AND s.id=:suggestion_id ', $param)->queryOne();


            $model->suggestion_id = $id;
            $model->who_id = Yii::$app->user->identity->getId();
            $model->whom_id = ($data['member1']==Yii::$app->user->identity->getId()) ? $data['member2'] : $data['member1'];
            $model->msg =  $msg;

            if ($model->save(true)) {
                return['status'=>1, 'msg'=> nl2br($msg)];
            }

        }
        return['status'=>0, 'msg'=>'Bad request.'];


    }

}
