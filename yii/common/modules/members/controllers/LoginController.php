<?php

namespace common\modules\members\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\base\InvalidParamException;
use \common\modules\members\models\LoginForm;
use \common\modules\members\models\PasswordResetRequestForm;
use \common\modules\members\models\ResetPasswordForm;

/**
 * Default controller for the `members` module
 */
class LoginController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->can('majster')) $this->redirect(['/members/member/']);
            if (Yii::$app->user->can('zamovnyk')) return $this->redirect(['/members/customer/']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (Yii::$app->user->can('majster')) $this->redirect(['/members/member/']);
            if (Yii::$app->user->can('zamovnyk')) return $this->redirect(['/members/customer/']);

        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/members/login/']);
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Інструкція по відновлюванню паролю надіслана на Email який Ви вказали.');

                return $this->redirect(['/members/login/reset']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('recovery', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetpassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новий пароль збережений.');

            return $this->redirect(['/members/login/']);
        }

        return $this->render('newpasswd', [
            'model' => $model,
        ]);
    }

}
