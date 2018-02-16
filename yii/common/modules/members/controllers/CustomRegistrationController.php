<?php

namespace common\modules\members\controllers;


use Yii;
use common\modules\members\models\CustomerRegistration;
use common\modules\members\models\Members;
use common\modules\members\models\Orders;
use common\modules\members\models\OrderImages;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
use yii\rbac\Permission;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;

/**
 * Default controller for the `members` module
 */
class CustomregistrationController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function beforeAction($action)
    {
        if ((!Yii::$app->user->isGuest))  return $this->redirect(['/members/login']);
        return parent::beforeAction($action);
    }

    public function actionIndex($scenario='home-page')
    {



                switch ($scenario) {

                    case 'home-page':



                        $model = new CustomerRegistration(['scenario' => $scenario]);
                        if ($model->load(Yii::$app->request->post())) {
                            if (is_array(Yii::$app->session['newCustomerSession']))
                                Yii::$app->session['newCustomerSession'] = array_merge(Yii::$app->session['newCustomerSession'], Yii::$app->request->post('CustomerRegistration'));
                            else Yii::$app->session['newCustomerSession'] = array_merge(array(), Yii::$app->request->post('CustomerRegistration'));
                            return $this->redirect(['/members/customregistration/create']);


                        }
                    break;
                    case 'add-order':


                        $model = new CustomerRegistration(['scenario' => $scenario]);
                        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                            $password = Yii::$app->getSecurity()->generateRandomString(6);

                            $member = new Members();
                            $member->first_name = Yii::$app->request->post('CustomerRegistration')['first_name'];
                            $member->email = Yii::$app->request->post('CustomerRegistration')['email'];
                            $member->phone = Yii::$app->request->post('CustomerRegistration')['phone'];
                            $member->password = $password;
                            \common\components\MemberHelper::GetMailTemplate(4, $member->attributes, $member->email);
                            \common\components\MemberHelper::GetMailTemplate(3, $member->attributes, $member->email);



                            $member->setPassword($password);
                            $member->generateAuthKey();


                            $member->save(false);

                            $member_id = Yii::$app->db->getLastInsertID();

                            $orders = new Orders();
                            $orders->member = $member_id;
                            $orders->title = Yii::$app->request->post('CustomerRegistration')['title'];
                            $orders->descriptions = Yii::$app->request->post('CustomerRegistration')['descriptions'];
                            $orders->location = Yii::$app->request->post('CustomerRegistration')['location'];
                            $orders->budget = Yii::$app->request->post('CustomerRegistration')['budget'];
                            $orders->region = Yii::$app->request->post('CustomerRegistration')['region'];
                            $orders->date_from = date("Y-m-d", strtotime(Yii::$app->request->post('CustomerRegistration')['date_from']));


                            $orders->save(false);
                            $order_id = Yii::$app->db->getLastInsertID();
                            $model->image = UploadedFile::getInstances($model, 'image');
                            if ($model->image) {
                                $dir = Yii::getAlias('@type_images').'/members/orders/';
                                foreach ($model->image as $image) {
                                    $ordersImages = new OrderImages();
                                    $ordersImages->order_id = $order_id;

                                    $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                                    $ordersImages->image = $filename;


                                    $image->saveAs($dir.$filename);
                                    Image::thumbnail($dir.$filename, 208, 156)->save($dir.'thmb/'.$filename, ['quality' => 90]);
                                    Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
                                    $ordersImages->save(false);
                                }
                            }

                            if (is_array(Yii::$app->session['newCustomerSession']))
                                Yii::$app->session['newCustomerSession'] = array_merge(Yii::$app->session['newCustomerSession'], Yii::$app->request->post('CustomerRegistration'));
                            else Yii::$app->session['newCustomerSession'] = array_merge(array(), Yii::$app->request->post('CustomerRegistration'));

                            $userRole = Yii::$app->authManager->getRole('zamovnyk');
                            Yii::$app->authManager->assign($userRole, $member_id);

                            $permit = Yii::$app->authManager->getPermission('canZamovnyk');
                            Yii::$app->authManager->assign($permit,$member_id);

                            \common\modules\members\models\PhoneCheck::deleteAll("phone ='" . Yii::$app->request->post('CustomerRegistration')['phone'] . "'");

                            //default notices settings
                            Yii::$app->db->createCommand()->insert('notices_members', ['notice_id' => 2, 'member' => $member_id, 'email'=>1, 'sms'=> 0])->execute();

                            \Yii::$app->user->login($member);
                            return $this->redirect(['/orders/default/myorders']);

                        }
                        return $this->render('create', ['model'=>$model]);
                    break;
                }
    }


    public function actionValidation($scenario='home-page')
    {

        $model = new CustomerRegistration(['scenario' => $scenario]);
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

    }

    public function actionSendphonecode()
    {
        Yii::$app->response->format = 'json';
        return \common\components\MemberHelper::PhoneCode(Yii::$app->request->post('phone'));
    }


	
	
    public function actionCreate()    {
        $model = new CustomerRegistration(['scenario' => 'add-order']);

        if (!sizeof(@$_SESSION['suggested']) || !isset($_SESSION['suggested'])) $_SESSION['suggested'] = array();
        $suggested = ArrayHelper::getColumn($_SESSION['suggested'], 'id');
        $members = array();
        if (sizeof($suggested)) {
            $members = Yii::$app->db->createCommand('SELECT m.id, m.avatar_image, IF(m.forma=3,  m.company, CONCAT(m.first_name, \' \', m.last_name, \' \', m.surname)) as name  FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      WHERE m.id IN ('."'".implode("','", $suggested)."'".') AND a.item_name="majster" ORDER BY FIELD(m.id, '.implode(",", $suggested).')')->queryAll();
        }

        return $this->render('create', ['model'=>$model, 'suggested'=>array('total'=>sizeof($members), 'members'=>$members)]);
    }


    public function actionSuccess()    {
        if (!empty(@Yii::$app->session['newCustomerSession']['email'])) {
            $email = @Yii::$app->session['newCustomerSession']['email'];
            $session = Yii::$app->session;
            $session->destroy();
            return $this->render('success',  ['email'=>$email]);
        } else {
            return $this->redirect(['/members/customregistration/create/']);
        }
    }



}
