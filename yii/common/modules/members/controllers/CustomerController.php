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
        $Member = new CustomerEdit();

        $notices = Yii::$app->db->createCommand("SELECT n.id as notice_id, n.name, n.email as show_email, n.sms as show_sms, m.id, m.email, m.sms, n.type FROM `notices_settings` n LEFT JOIN `notices_members` m ON n.id=m.notice_id AND m.member = '".Yii::$app->user->identity->getId()."' WHERE n.active=1 AND n.type=1 ORDER BY n.prior ASC ")->queryAll();


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
/*
    public function actionAddorder()  {
        $order = new Orders(['scenario' => 'add-order']);
        return $this->render('create', ['order'=>$order]);
    }

    public function actionOrderadd()
    {
        $model = new Orders();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $model->member = Yii::$app->user->identity->getId();
            switch (Yii::$app->request->post('Orders')['when_start']){
                case '1':
                    $model->date_from = date("Y-m-d", strtotime(Yii::$app->request->post('Orders')['date_from']));
                    $model->date_to = date("Y-m-d", strtotime(Yii::$app->request->post('Orders')['date_to']));
                    break;
                case '2':
                    $model->date_from = date("Y-m-d");
                    $model->date_to = '';
                    break;
                case '3':
                    $model->date_from = date("Y-m-d", strtotime("+1 day"));
                    $model->date_to = '';
                    break;
                case '4':
                    $model->date_from = '';
                    $model->date_to = '';
                    break;
            }
            $model->title = Yii::$app->request->post('Orders')['title'];
            $model->location = Yii::$app->request->post('Orders')['location'];
            $model->descriptions = Yii::$app->request->post('Orders')['descriptions'];
            $model->budget = Yii::$app->request->post('Orders')['budget'];
            $model->region = Yii::$app->request->post('Orders')['region'];
            $model->when_start = Yii::$app->request->post('Orders')['when_start'];

            $model->save(false);
            $order_id = Yii::$app->db->getLastInsertID();
            $model->image = UploadedFile::getInstances($model, 'image');
            if ($model->image) {
                $dir = Yii::getAlias('@type_images').'/members/orders/';
                foreach ($model->image as $image) {
                    $ordersImages = new OrderImages();
                    $ordersImages->order_id = $order_id;
                    $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                    $image->saveAs($dir.$filename);
                    Image::thumbnail($dir.$filename, 208, 156)->save($dir.'thmb/'.$filename, ['quality' => 90]);
                    Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
                    $ordersImages->image = $filename;
                //    $image->saveAs($dir.$ordersImages->image);
                //    $ordersImages->image = '/uploads/members/orders/'.strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                    $ordersImages->save(false);
                }
            }

            return $this->redirect(['/members/customer/list']);
        }

    }

*/
/*
    public function actionList($status='')  {

        $param = [];
        $param[':member'] = Yii::$app->user->identity->getId();

        $count_total = Yii::$app->db->createCommand('select count(member) as total, sum(case when status = \'1\' then 1 else 0 end) status_1, sum(case when status = \'2\' then 1 else 0 end) status_2, sum(case when status = \'3\' then 1 else 0 end) status_3, sum(case when status = \'4\' then 1 else 0 end) status_4 from `orders` WHERE member=:member group by member', $param)->queryOne();

        if ($status != '')  $param[':status'] = $status;


        $filter = array();
        if (sizeof($param)) foreach($param as $key=>$val){
            switch($key){
                case ':member':
                    $filter[] = ' o.member='.$key;
                break;
                case ':status':
                    $filter[] = ' o.status='.$key;
                break;
            }
        }


        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM orders o '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : ''), $param)->queryScalar();
        $provider = new SqlDataProvider([
            'sql' => 'SELECT o.id, o.title, o.descriptions, o.location, o.budget as budget_name, DATE_FORMAT(o.created_at, "%d.%m.%Y") as created_at, o.status  FROM `orders` o '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').' ORDER BY o.status, o.created_at DESC',
            'params' => $param,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $status = MemberHelper::GetBudgetRange();
        // Setter
        $arr = array();
        foreach( $provider->models as $key => $val){
            $arr[$key] = $provider->models[$key];
            $arr[$key]['budget_name'] = $status[$val['budget_name']]['budget'];
        }
        $provider->models =  $arr;

        return $this->render('list', ['model'=>$provider, 'count_total'=>$count_total]);
    }

    public function actionOrder($id=0)  {
        $model = Orders::findOne([
            'id' => Yii::$app->request->get('id'),
            'member'=> Yii::$app->user->identity->getId(),
        ]);

        if ($model->date_from=='0000-00-00') $model->date_from = ''; else $model->date_from = date("d.m.Y", strtotime($model->date_from));
        if ($model->date_to=='0000-00-00') $model->date_to = ''; else $model->date_to = date("d.m.Y", strtotime($model->date_to));

        $images = OrderImages::findAll(['order_id' => $model->id]);
        return $this->render('order', ['model'=> $model, 'budget'=>MemberHelper::GetBudgetRange(), 'images'=>$images]);
    }

    public function actionSaveorder($mode = 'location')
    {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $model = Orders::findOne([
            'id' => Yii::$app->request->get('id'),
            'member'=> Yii::$app->user->identity->getId(),
        ]);



        if ($model->load(Yii::$app->request->post())) {

            switch ($mode) {
                case 'location':
                    $model->location = Yii::$app->request->post('Orders')['location'];
                    $model->region = Yii::$app->request->post('Orders')['region'];
                break;
                case 'budget':
                    $model->budget = Yii::$app->request->post('Orders')['budget'];
                break;
                case 'when_start':
                    switch (Yii::$app->request->post('Orders')['when_start']){
                        case '1':
                            $model->date_from = date("Y-m-d", strtotime(Yii::$app->request->post('Orders')['date_from']));
                            $model->date_to = date("Y-m-d", strtotime(Yii::$app->request->post('Orders')['date_to']));
                            break;
                        case '2':
                            $model->date_from = date("Y-m-d");
                            $model->date_to = '';
                            break;
                        case '3':
                            $model->date_from = date("Y-m-d", strtotime("+1 day"));
                            $model->date_to = '';
                        break;
                        case '4':
                            $model->date_from = '';
                            $model->date_to = '';
                        break;
                    }
                    $model->when_start = Yii::$app->request->post('Orders')['when_start'];
                break;
                case 'descriptions':
                    $model->descriptions = Yii::$app->request->post('Orders')['descriptions'];
                break;
            }
            $model->save();
            return['status'=>1, 'msg'=>'дані збережені'];
        }
        return['status'=>0];

    }

    public function actionImageorder($id=0)  {
        if ($file =  UploadedFile::getInstanceByName('file')) {
            $dir = Yii::getAlias('@type_images').'/members/orders/';
            $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$file->extension;
            $file->saveAs($dir.$filename);
            Image::thumbnail($dir.$filename, 208, 156)->save($dir.'thmb/'.$filename, ['quality' => 90]);
            Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
            Yii::$app->response->format = 'json';
            $ordersImages = new OrderImages();
            $ordersImages->order_id = $id;
            $ordersImages->image = $filename;
            $ordersImages->save(false);
            $id = Yii::$app->db->getLastInsertID();
            return json_encode(array('status'=>1, 'id'=>$id));
        }
    }


    public function actionImagedelete($id=0)  {

        $model = OrderImages::findOne(['id' => $id]);
        $dir = Yii::getAlias('@type_images').'/members/orders/';

        if (file_exists($dir.'thmb/'.$model->image)) {
            @unlink($dir.'thmb/'.$model->image);
        }

        if (file_exists($dir.$model->image)) {
            @unlink($dir.$model->image);
        }

        Yii::$app->db->createCommand("DELETE i FROM order_images i INNER JOIN orders o ON i.order_id = o.id WHERE i.id = '".$id."' AND o.member = '".Yii::$app->user->identity->getId()."' ")->execute();

        Yii::$app->response->format = 'json';
        return json_encode(array('status'=>1));
    }


*/

}
