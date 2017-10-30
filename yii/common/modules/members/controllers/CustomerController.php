<?php

namespace common\modules\members\controllers;


use common\modules\members\models\CustomerEdit;
use Yii;
use common\modules\members\models\CustomerRegistration;
use common\modules\members\models\Members;
use common\modules\members\models\Orders;
use common\modules\members\models\OrderImages;
use common\modules\members\models\MemberPasswordForm;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\db\Query;

/**
 * Default controller for the `members` module
 */
class CustomerController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        $MemberPassword = new MemberPasswordForm();
        $Member = new CustomerEdit();

        $notices = Yii::$app->db->createCommand("SELECT n.id as notice_id, n.name, n.email as show_email, n.sms as show_sms, m.id, m.email, m.sms FROM `notices_settings` n LEFT JOIN `notices_members` m ON n.id=m.notice_id AND m.member = '".Yii::$app->user->identity->getId()."' WHERE n.active=1 AND n.type=1 ORDER BY n.prior ASC ")->queryAll();


        return $this->render('edit', ['MemberPassword'=>$MemberPassword, 'Member'=>$Member, 'Notices'=>$notices]);

    }


    public function actionPersonalsave()
    {
        $model = new CustomerEdit();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $member = Members::findOne([
                'id' => Yii::$app->user->identity->getId(),
            ]);

            $member->first_name=Yii::$app->request->post('CustomerEdit')['first_name'];
            $member->last_name=Yii::$app->request->post('CustomerEdit')['last_name'];
            $member->email=Yii::$app->request->post('CustomerEdit')['email'];
            $member->phone=Yii::$app->request->post('CustomerEdit')['phone'];

            if ($member->save(false)) {
                \common\modules\members\models\PhoneCheck::deleteAll("phone ='" . Yii::$app->request->post('CustomerEdit')['phone'] . "'");
                Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return['status'=>1, 'msg'=>'Персональні дані збережені.'];
            }


        }
    }


    public function actionPersonalvalidation()
    {
        $model = new CustomerEdit();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }



    public function actionResetpassword()
    {
        $model = new MemberPasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $member = Members::findOne([
                'id' => Yii::$app->user->identity->getId(),
            ]);
            $member->setPassword(Yii::$app->request->post('MemberPasswordForm')['password']);
            if ($member->save(false)) {
                Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return['status'=>1, 'msg'=>'Новий пароль збережений.'];
            }
        }
    }

    public function actionResetpasswordvalidation()
    {
        $model = new MemberPasswordForm();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }


    public function actionUploadavatar()
    {

        if ($file =  UploadedFile::getInstanceByName('file')) {
            $dir = Yii::getAlias('@type_images').'/members/avatars/';
            $avatar = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$file->extension;
            $file->saveAs($dir.$avatar);
            Image::thumbnail($dir.$avatar, 262, 262)->save($dir.$avatar, ['quality' => 90]);
            Yii::$app->response->format = 'json';


            $member = Members::findOne([
                'id' => Yii::$app->user->identity->getId(),
            ]);

            function endc( $array ) { return end( $array ); }

            if (file_exists($dir.endc(explode("/", $member->avatar_image)))) {
                @unlink($dir.endc(explode("/", $member->avatar_image)));
            }

            $member->avatar_image='/uploads/members/avatars/'.$avatar;
            $member->save(false);

            return json_encode(array('status'=>1, 'avatar_image'=>'/uploads/members/avatars/'.$avatar));
        }
    }

    public function actionNotices()
    {

        if (!empty(Yii::$app->request->get()['name']) && !empty(Yii::$app->request->get()['id'])) {

            $notices = Yii::$app->db->createCommand("SELECT id, notice_id, member, email, sms FROM `notices_members` WHERE `member` = '".Yii::$app->user->identity->getId()."' AND notice_id= '".Yii::$app->request->get()['id']."' LIMIT 1")->queryAll();

            if (sizeof($notices)) {
                Yii::$app->db->createCommand()->update('notices_members', [((Yii::$app->request->get()['name']=='email') ? 'email' : 'sms')=>Yii::$app->request->get()['status']], ' id="'.$notices[0]['id'].'"')->execute();
            } else {
                Yii::$app->db->createCommand()->insert('notices_members', ['notice_id' => Yii::$app->request->get()['id'], 'member' => Yii::$app->user->identity->getId(), 'email'=>(Yii::$app->request->get()['name']=='email') ? '1' : '0', 'sms'=>(Yii::$app->request->get()['name']=='sms') ? '1' : '0'])->execute();
            }

            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return['status'=>1, 'msg'=>'Збережено налаштування отримання сповіщень.'];

        }
        return false;
    }
}