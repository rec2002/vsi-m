<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\LoginForm;


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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $pie = array (1=>array('name'=>'Майстри', 'count'=>Yii::$app->db->createCommand("SELECT count(*) as count FROM `members` m LEFT JOIN `auth_assignment` a ON m.id = a.user_id WHERE a.item_name = 'canMajster'")->queryScalar()),
                      2=>array('name'=>'Замовники', 'count'=>Yii::$app->db->createCommand("SELECT count(*) as count FROM `members` m LEFT JOIN `auth_assignment` a ON m.id = a.user_id WHERE a.item_name = 'canZamovnyk'")->queryScalar()));

        $master = Yii::$app->db->createCommand("select count(*) as count, DATE_FORMAT(m.created_at, \"%e.%m\") as date from `members` m LEFT JOIN `auth_assignment` a ON m.id = a.user_id WHERE a.item_name = 'canMajster' group by DATE_FORMAT(m.created_at, \"%Y-%m-%d\") ORDER BY m.created_at DESC")->queryAll();
        $zamovnyk = Yii::$app->db->createCommand("select count(*) as count, DATE_FORMAT(m.created_at, \"%e.%m\") as date from `members` m LEFT JOIN `auth_assignment` a ON m.id = a.user_id WHERE a.item_name = 'canZamovnyk' group by DATE_FORMAT(m.created_at, \"%Y-%m-%d\") ORDER BY m.created_at DESC")->queryAll();


        $dates_arr = $master_arr = $zamovnyk_arr = array();
        foreach ($master as $val) { $dates_arr[$val['date']] = $val['date']; $master_arr[$val['date']] = $val['count'];}
        foreach ($zamovnyk as $val) { $dates_arr[$val['date']] = $val['date']; $zamovnyk_arr[$val['date']] = $val['count'];}
        foreach ($dates_arr as $key=>$val) {
            if(!isset($master_arr[$key]))  $master_arr1[] = 0; else  $master_arr1[] =  $master_arr[$key];
            if(!isset($zamovnyk_arr[$key]))  $zamovnyk_arr1[] = 0; else  $zamovnyk_arr1[] =  $zamovnyk_arr[$key];
        }

        $chart = array ('time-line'=>implode(',', $dates_arr), 'zamovnyk'=>implode(',', $zamovnyk_arr1), 'master'=>implode(',', $master_arr1));
        return $this->render('index', ['pie'=>$pie, 'chart'=>$chart]);
    }

    /**
     * Login action.
     *
     * @return string
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
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
