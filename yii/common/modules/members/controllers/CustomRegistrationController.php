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
use yii\rbac\Permission;
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
                        if ($model->load(Yii::$app->request->post())) {

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
                            $orders->location = Yii::$app->request->post('CustomerRegistration')['location'];
                            $orders->budget = Yii::$app->request->post('CustomerRegistration')['budget'];

                            switch (Yii::$app->request->post('CustomerRegistration')['when_start']){
                                case '1':
                                    $orders->date_from = date("Y-m-d", strtotime(Yii::$app->request->post('CustomerRegistration')['date_from']));
                                    $orders->date_to = date("Y-m-d", strtotime(Yii::$app->request->post('CustomerRegistration')['date_to']));
                                    break;
                                case '2':
                                    $orders->date_from = date("Y-m-d");
                                    break;
                                case '3':
                                    $orders->date_from = date("Y-m-d", strtotime("+1 day"));
                                    break;
                            }

                            $orders->save(false);
                            $order_id = Yii::$app->db->getLastInsertID();
                            $model->image = UploadedFile::getInstances($model, 'image');
                            if ($model->image) {
                                $dir = Yii::getAlias('@type_images').'/members/orders/';
                                foreach ($model->image as $image) {
                                    $ordersImages = new OrderImages();
                                    $ordersImages->order_id = $order_id;
                                    $ordersImages->image = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                                    $image->saveAs($dir.$ordersImages->image);
                                    $ordersImages->image = '/uploads/members/orders/'.strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
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


                            return $this->redirect(['/members/customregistration/success/']);

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
        return $this->render('create', ['model'=>$model]);
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
