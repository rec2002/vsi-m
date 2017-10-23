<?php

namespace common\modules\members\controllers;

use Yii;
use common\modules\members\models\CustomerRegistration;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * Default controller for the `members` module
 */
class CustomregistrationController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */

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

//                            Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
//                            return $this->redirect(['/members/registration/?id=3']);
                        }

                        return $this->render('create', ['model'=>$model]);

                    break;

                }

/*
                return $this->render('master'.$id, [
                    'model' => $model,
                ]);

                */
    }


    public function actionValidation($scenatio='home-page')
    {

        $model = new CustomerRegistration(['scenario' => $scenatio]);
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


}
