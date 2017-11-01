<?php

namespace common\modules\members\controllers;




use common\modules\members\models\MemberPrices;
use common\modules\members\models\MemberTypes;
use Yii;
use common\modules\members\models\MemberEdit;
use common\modules\members\models\Members;
use common\modules\members\models\MemberPasswordForm;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\helpers\ArrayHelper;


/**
 * Default controller for the `members` module
 */
class MemberController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function beforeAction($action)
    {

        if (!Yii::$app->user->can('majster') || Yii::$app->user->isGuest)  return $this->redirect(['/members/login']);
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {


        $member = new MemberEdit();

    //    $regions = new MemberRegions();

/*
        $MemberPassword = new MemberPasswordForm();
        $Member = new CustomerEdit();

SELECT r.id, r.name_short, m.id  FROM `dict_regions` r
LEFT JOIN `member_regions` m ON r.id=m.region AND m.member=9
ORDER BY r.id  ASC


        return $this->render('edit', ['MemberPassword'=>$MemberPassword, 'Member'=>$Member, 'Notices'=>$notices]);
*/

        return $this->render('edit', ['member'=>$member]);
    }


    public function actionValidation($scenario = 'types')
    {


        $model = new MemberEdit(['scenario' => $scenario]);
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }


    public function actionSavemember($scenario = 'types')
    {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = MemberEdit::find()->where(['id' => Yii::$app->user->identity->getId()])->one();





        if ($model->load(Yii::$app->request->post())) {

            switch ($scenario) {
                case 'first_name':
                    $model->first_name = Yii::$app->request->post('MemberEdit')['first_name'];
                break;
            }

            $model->save();
            return['status'=>1, 'msg'=>'дані збережені'];
        }
        return['status'=>0];

    }



    // RESET PASSWORD ACTIONS //

    public function actionResetpwd()
    {
        $MemberPassword = new MemberPasswordForm();
        if ($MemberPassword->load(Yii::$app->request->post()) && $MemberPassword->validate()) {
            $member = Members::findOne([
                'id' => Yii::$app->user->identity->getId(),
            ]);
            $member->setPassword(Yii::$app->request->post('MemberPasswordForm')['password']);
            if ($member->save(false)) {
                Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return['status'=>1, 'msg'=>'Новий пароль збережений.'];
            }
        }
        return $this->render('resetpwd', ['MemberPassword'=>$MemberPassword]);
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

    // NOTICE SETTINGS ACTIONS //
    public function actionNoticesettings()
    {
        $notices = Yii::$app->db->createCommand("SELECT n.id as notice_id, n.name, n.email as show_email, n.sms as show_sms, m.id, m.email, m.sms, n.type FROM `notices_settings` n LEFT JOIN `notices_members` m ON n.id=m.notice_id AND m.member = '".Yii::$app->user->identity->getId()."' WHERE n.active=1 AND n.type=2 ORDER BY n.prior ASC ")->queryAll();
        return $this->render('notices-settings', ['Notices'=>$notices]);
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

    // NOTICE SETTINGS ACTIONS //
    public function actionTypes()
    {
        $model = new MemberEdit(['scenario' => 'types']);
        $model->types = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'type');
        return $this->render('types', ['model'=>$model]);
    }

    public function actionTypesave()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = new MemberEdit(['scenario' => 'types']);
        if ($model->load(Yii::$app->request->post())) {

            $old = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'type');
            $new = (is_array(Yii::$app->request->post('MemberEdit')['types'])) ? Yii::$app->request->post('MemberEdit')['types'] : array() ;
            if (sizeof($old)) foreach ($old as $val) {
                if (!@in_array($val, $new)) {
                    Yii::$app->db->createCommand()->delete('member_types', ['type' => $val, 'member'=>Yii::$app->user->identity->getId()])->execute();
                    $ids = MemberPrices::findBySql('SELECT GROUP_CONCAT(id) as ids FROM `dict_category` WHERE types=2 AND parent = "'.$val.'" ')->asArray()->all();
                    if (!empty($ids[0]['ids'])) {
                        Yii::$app->db->createCommand("DELETE FROM `member_prices` WHERE  price_id IN (".$ids[0]['ids'].") AND member = '".Yii::$app->user->identity->getId()."' ")->execute();
                    }
                }
            }

            if (sizeof($new)) foreach ($new as $val) {
                if (!in_array($val, $old)) {
                    Yii::$app->db->createCommand()->insert('member_types', ['type' => $val, 'member'=>Yii::$app->user->identity->getId()])->execute();
                }
            }
            return['status'=>1, 'msg'=>'Вибрані види робіт збереженні, тепер Ви можете вказати ціни до них відповідно.', 'prices'=>$this->actionPrices()];
        }
        return['status'=>0];
    }

    public function actionPrices() {
        $model = new MemberEdit(['scenario' => 'prices']);
        $model->types = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'type');
        $model->prices = ArrayHelper::index( MemberPrices::findBySql('SELECT price_id as id, price  FROM member_prices WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'id');
        return $this->renderPartial('prices', ['model'=>$model]);
    }

    public function actionPricesave()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = new MemberEdit(['scenario' => 'prices']);
        if ($model->load(Yii::$app->request->post())) {

            $new = Yii::$app->request->post('MemberEdit')['prices'];
            $new_ids = array();
            if (sizeof($new)) foreach ($new as $key=>$val){
                if (empty($val)) { unset($new[$key]); } else { $new_ids[] = $key; }
            }

            $old = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT price_id FROM member_prices WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'price_id');

            if (sizeof($old)) foreach ($old as $val) {
                if (!in_array($val, $new_ids)) {
                    Yii::$app->db->createCommand()->delete('member_prices', ['price_id' => $val, 'member'=>Yii::$app->user->identity->getId()])->execute();
                }
            }
            if (sizeof($new_ids)) foreach ($new_ids as $val) {
                if (!in_array($val, $old)) {
                    Yii::$app->db->createCommand()->insert('member_prices', ['price_id' => $val, 'price'=>$new[$val], 'member'=>Yii::$app->user->identity->getId()])->execute();
                }
            }
            return['status'=>1, 'msg'=>'Вказані ціни збережено.'];
        }
        return['status'=>0];
    }



    /*
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
    */

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


}
