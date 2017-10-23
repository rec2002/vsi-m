<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\FaqForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $this->GetMailTemplate(1, $model->attributes);
/*
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
*/
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFaqform()
    {
        $model = new Faqform();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $msg = $this->GetMailTemplate(2, $model->attributes);

            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return['status'=>1, 'msg'=>$msg];

        } else {
            return $this->renderAjax('faqform', [
                'model' => $model,
            ]);
        }
    }


    public function GetMailTemplate($id, $data = array()) {

        $template = Yii::$app->db->createCommand("SELECT `subject`, `emails`, `notices`, `mail_content`, `sms_content`, `message` FROM `mail_template` WHERE `id`= '".$id."' ")->queryAll();

        if (!sizeof($template) && !sizeof($data) && empty($id)) {
            Yii::$app->session->setFlash('error', 'Помилка надсилання пошти.');
            return false;
        }

        foreach($data as $key=>$val) {
            $template[0]['mail_content'] = str_replace('{'.strtoupper($key).'}', $val, $template[0]['mail_content']);
        }

        $emails = array();
        $arr = explode(',', $template[0]['emails']);
        if (sizeof($arr)) {
            foreach ($arr as $val) {
                $emails[trim($val)]= '';
            }
        } else $emails[$template[0]['emails']] = '';

        $template[0]['emails'] = $emails;

        Yii::$app->mailer->compose()->setTo($template[0]['emails'])->setFrom(Yii::$app->params['adminEmail'])->setSubject($template[0]['subject'])->setHtmlBody($template[0]['mail_content'])->send();
        Yii::$app->session->setFlash('success', $template[0]['message']);

        return $template[0]['message'];
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
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
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Displays Publish.
     *
     * @return mixed
     */
    public function actionPublish($id=0)
    {



        if ($id>0) {
            $publish = new ActiveDataProvider(['query' => \backend\models\Publish::find()->where(['id' => $id, 'active' => 1])]);

            $publish_last = new ActiveDataProvider(['query' => \backend\models\Publish::find()->where(['active' => 1])->andWhere(['!=', 'id', $id]),
                'pagination' => ['pageSize' => 3],
                'sort' => [
                    'defaultOrder' => [
                        'date_publish' => SORT_DESC,
                        'created_at' => SORT_DESC
                    ]
                ]
            ]);


            return $this->render('publish_detail', ['publish_detail'=>$publish->getModels(), 'publish_last'=>$publish_last]);

        }   else  {
            $publish = new ActiveDataProvider(['query' => \backend\models\Publish::find()->where(['active' => 1]),
                'pagination' => ['pageSize' => 6, 'pageParam' => 'стр', 'pageSizeParam' => 'лім'],
                'sort' => [
                    'defaultOrder' => [
                        'date_publish' => SORT_DESC,
                        'created_at' => SORT_DESC
                    ]
                ]
            ]);

            return $this->render('publish', ['publish_items'=>$publish]);
        }


    }

    /**
     * Displays FAQ page.
     *
     * @return mixed
     */
    public function actionFaq()
    {
        return $this->render('faq');
    }

    /**
     * Displays Privacy page.
     *
     * @return mixed
     */
    public function actionPrivacy()
    {
        return $this->render('privacy');
    }

    /**
     * Displays How itd work page.
     *
     * @return mixed
     */
    public function actionHowitwork()
    {
        return $this->render('howitwork');
    }

    /**
     * Displays How itd work page.
     *
     * @return mixed
     */
    public function actionHowitworkmaster()
    {
        return $this->render('howitworkmaster');
    }

    /**
     * Displays How itd work page.
     *
     * @return mixed
     */
    public function actionCategory()
    {
        return $this->render('category');
    }

    /**
     * Displays Why we.
     *
     * @return mixed
     */
    public function actionWhywe()
    {
        return $this->render('whywe');
    }

}
