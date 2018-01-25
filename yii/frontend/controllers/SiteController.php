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
        return $this->redirect(['/members/login']);
    }

    public function actionContact()
    {

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $msg = \common\components\MemberHelper::GetMailTemplate(1, $model->attributes, '', true);
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
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            $msg = \common\components\MemberHelper::GetMailTemplate(2, $model->attributes);
            return['status'=>1, 'msg'=>$msg];

        } else   {
            return $this->renderAjax('faqform', [
                'model' => $model,
            ]);
        }
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
                'pagination' => ['pageSize' => 9, 'pageParam' => 'стр', 'pageSizeParam' => 'лім'],
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
        $model = new Faqform();

        return $this->render('faq', ['model'=>$model]);
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

    public function actionSendphonecode()
    {
        Yii::$app->response->format = 'json';
        return \common\components\MemberHelper::PhoneCode(Yii::$app->request->post('phone'));
    }

	
	public function actionSendcheckcode()
    {
	    Yii::$app->response->format = 'json';
	    if (Yii::$app->request->isPost) { 
			$count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim(Yii::$app->request->post('confirm_sms'))."' AND  phone = '".trim(Yii::$app->request->post('phone'))."' LIMIT 1")->queryScalar();
			if($count==1) {
				return json_encode(array('status'=>1));
			} 
		}
		return json_encode(array('status'=>0));
    }
	
}
