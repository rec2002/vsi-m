<?php

namespace common\modules\members\controllers;


use common\components\MemberHelper;
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
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

/**
 * Default controller for the `members` module
 */
class CustomerController extends \common\modules\members\controllers\DefaultController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['zamovnyk']
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?']
                    ]
                ]
            ]
        ];
    }


    /**
     * Renders the index view for the module
     * @return string
     */

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) return $this->redirect(['/members/login']);

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $MemberPassword = new MemberPasswordForm();
        $member = Members::findOne([
            'id' => Yii::$app->user->identity->getId(),
        ]);


        $notices = Yii::$app->db->createCommand("SELECT n.id as notice_id, n.name, n.email as show_email, n.sms as show_sms, m.id, m.email, m.sms, n.type FROM `notices_settings` n LEFT JOIN `notices_members` m ON n.id=m.notice_id AND m.member = '".Yii::$app->user->identity->getId()."' WHERE n.active=1 AND n.type=1 ORDER BY n.prior ASC ")->queryAll();


        return $this->render('edit', ['MemberPassword'=>$MemberPassword, 'member'=>$member, 'Notices'=>$notices]);

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


    public function actionValidation($mode='personal')
    {
        switch($mode){
            case 'personal':
                $model = new CustomerEdit();
            break;
            case 'add-order';
                $model = new Orders(['scenario' => 'add-order']);
            break;
            case 'location':
            case 'descriptions':
            case 'budget':
            case 'when_start':

                $model = Orders::findOne([
                    'id' => Yii::$app->request->get('id'),
                    'member'=> Yii::$app->user->identity->getId(),
                ]);
            break;
        }



        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())&& $model->validate())
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

        if (!empty(Yii::$app->request->post('name')) && !empty(Yii::$app->request->post('id'))) {

            $notices = Yii::$app->db->createCommand("SELECT id, notice_id, member, email, sms FROM `notices_members` WHERE `member` = '".Yii::$app->user->identity->getId()."' AND notice_id= '".Yii::$app->request->post('id')."' LIMIT 1")->queryAll();

            if (sizeof($notices)) {
                Yii::$app->db->createCommand()->update('notices_members', [((Yii::$app->request->post('name')=='email') ? 'email' : 'sms')=>Yii::$app->request->post('status')], ' id="'.$notices[0]['id'].'"')->execute();
            } else {
                Yii::$app->db->createCommand()->insert('notices_members', ['notice_id' => Yii::$app->request->post('id'), 'member' => Yii::$app->user->identity->getId(), 'email'=>(Yii::$app->request->post('name')=='email') ? '1' : '0', 'sms'=>(Yii::$app->request->post('name')=='sms') ? '1' : '0'])->execute();
            }

            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return['status'=>1, 'msg'=>'Збережено налаштування отримання сповіщень.'];

        }
        return false;
    }

}
