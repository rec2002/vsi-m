<?php

namespace common\modules\members\controllers;

use common\modules\members\models\MemberPrices;
use common\modules\members\models\MemberRegions;
use common\modules\members\models\MemberTypes;
use Yii;
use common\modules\members\models\MemberEdit;
use common\modules\members\models\Members;
use common\modules\members\models\Orders;
use common\modules\members\models\OrderImages;
use common\modules\members\models\MemberPasswordForm;
use common\modules\members\models\Portfolio;
use common\modules\members\models\MemberDocuments;
use common\modules\members\models\MemberBilling;

use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use common\components\MemberHelper;
use yii\helpers\Url;

/**
 * Default controller for the `members` module
 */
class MemberController extends \common\modules\members\controllers\DefaultController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['majster']
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
/*
    public function beforeAction($action)
    {

        if (!Yii::$app->user->can('majster') || Yii::$app->user->isGuest)  return $this->redirect(['/members/login']);
        return parent::beforeAction($action);
    }

    */

    public function actionIndex()
    {
        $member = MemberEdit::find()->where(['id' => Yii::$app->user->identity->getId()])->one();
        $member->regions = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT region FROM member_regions WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'region');
        $member->documents  = ArrayHelper::index(MemberTypes::findBySql('SELECT id, name FROM member_documents WHERE member_id="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'id');
        return $this->render('edit', ['member'=>$member]);
    }


    public function actionValidation($scenario = 'types')
    {
        $model = new MemberEdit(['scenario' => $scenario]);


        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())  )
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }


    public function actionValidations($mode='personal')
    {
        switch($mode){
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

            case 'billing':
                $model = new MemberBilling();
            break;
        }



        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())&& $model->validate())
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }


    public function actionFile($id = '0'){
        \common\components\MemberHelper::GetMemberDoc(Yii::$app->user->identity->getId(), Yii::$app->request->get('id'));
    }

    public function actionSavemember($scenario = 'types')
    {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = MemberEdit::find()->where(['id' => Yii::$app->user->identity->getId()])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            switch ($scenario) {
                case 'documents':
                    $model->documents = UploadedFile::getInstances($model, 'documents');
                    if ($model->documents) {
                        $dir = Yii::getAlias('@user_document');
                        foreach ($model->documents as $key=>$image) if ($key>0) {
                            $memberDoc = new MemberDocuments();
                            $memberDoc->member_id = $model->id;
                            $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                            $image->saveAs($dir.'/'.$filename);
                            $memberDoc->name = $image->name;
                            $memberDoc->file = $filename;
                            $memberDoc->save(false);

                        }
                        \common\components\MemberHelper::GetMailTemplate(8,  $model->attributes, '');
                    }
                    return $this->redirect(['/members/member']);
                break;
                case 'first_name':
                    $model->first_name = Yii::$app->request->post('MemberEdit')['first_name'];
                break;
                case 'busy_to':
                    $model->busy_to = (Yii::$app->request->post('MemberEdit')['busy']==0) ? NULL : date('Y-m-d', strtotime(Yii::$app->request->post('MemberEdit')['busy_to']));
                break;
                case 'surname':
                    $model->surname = Yii::$app->request->post('MemberEdit')['surname'];
                break;
                case 'last_name':
                    $model->last_name = Yii::$app->request->post('MemberEdit')['last_name'];
                break;
                case 'email':
                    $model->last_name = Yii::$app->request->post('MemberEdit')['email'];
                break;
                case 'place':
                    $model->place = Yii::$app->request->post('MemberEdit')['place'];
                    $model->region = Yii::$app->request->post('MemberEdit')['region'];
                break;
                case 'about':
                    $model->about = Yii::$app->request->post('MemberEdit')['about'];
                break;
                case 'budget_min':
                    $model->budget_min = Yii::$app->request->post('MemberEdit')['budget_min'];
                    break;
                case 'regions':


                    $new = (is_array(Yii::$app->request->post('MemberEdit')['regions'])) ? Yii::$app->request->post('MemberEdit')['regions'] : array() ;

                    $old = ArrayHelper::getColumn(MemberRegions::findBySql('SELECT region FROM member_regions WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'region');

                    if (sizeof($old)) foreach ($old as $val) {
                        if (!in_array($val, $new)) {
                            Yii::$app->db->createCommand()->delete('member_regions', ['region' => $val, 'member'=>Yii::$app->user->identity->getId()])->execute();
                        }
                    }
                    if (sizeof($new)) foreach ($new as $val) {
                        if (!in_array($val, $old)) {
                            Yii::$app->db->createCommand()->insert('member_regions', ['region' => $val, 'member'=>Yii::$app->user->identity->getId()])->execute();
                        }
                    }


                break;
                case 'forma':

                    $model->brygada = Yii::$app->request->post('MemberEdit')['brygada'];
                    $model->company = Yii::$app->request->post('MemberEdit')['company'];
                    $model->forma = Yii::$app->request->post('MemberEdit')['forma'];

                    switch ($model->forma){
                        case '1':
                            $model->brygada = null;
                            $model->company = null;
                            break;
                        case '2':
                            $model->company = null;
                            break;
                        case '3':
                            $model->brygada = null;
                            break;
                    }
                break;
            }
            $model->save(true);
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
        $model->prices = ArrayHelper::index( MemberPrices::findBySql('SELECT price_id as id, price, top   FROM member_prices WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'id');
        return $this->renderPartial('prices', ['model'=>$model]);
    }

    public function actionPricesave()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $model = new MemberEdit(['scenario' => 'prices']);
        if ($model->load(Yii::$app->request->post())) {

            $new = Yii::$app->request->post('MemberEdit')['prices'];
            $top = Yii::$app->request->post('MemberEdit')['top'];

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
                    Yii::$app->db->createCommand()->insert('member_prices', ['price_id' => $val, 'price'=>$new[$val], 'top'=>(@$top[$val]==1) ? 1 : 0, 'member'=>Yii::$app->user->identity->getId()])->execute();
                }else {
                    Yii::$app->db->createCommand()->update('member_prices', ['price'=>$new[$val], 'top'=>(@$top[$val]==1) ? 1 : 0], ' `member`='.Yii::$app->user->identity->getId().' AND `price_id` = '.$val )->execute();
                }
            }
            return['status'=>1, 'msg'=>'Вказані ціни збережено.'];
        }
        return['status'=>0];
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


    public function actionProfile()
    {
        $member = MemberEdit::find()->where(['id' => Yii::$app->user->identity->getId()])->one();
        $member->types = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'type');
        $member->prices = ArrayHelper::index( MemberPrices::findBySql('SELECT price_id as id, price  FROM member_prices WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'id');
        $member->regions = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT region FROM member_regions WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'region');

        $portfolio =  Portfolio::findBySql('SELECT  p.id, p.member,	p.title, p.description,	p.cost,	p.work_date, 
                                  (SELECT i.image FROM `member_portfolio_images` i WHERE i.portfolio_id = p.id ORDER BY i.created_at ASC, i.id ASC LIMIT 1) as image	 
                                  FROM `member_porfolio` p 
                                  WHERE p.member="'.Yii::$app->user->identity->getId().'"   ORDER BY p.created_at DESC')->asArray()->all();


       print_r(\common\modules\professionals\controllers\DefaultController::GetRetingsReviews(Yii::$app->user->identity->getId()));

        return $this->render('profile', ['member'=> $member, 'portfolio'=> $portfolio, 'ratings'=>\common\modules\professionals\controllers\DefaultController::GetRetingsReviews(Yii::$app->user->identity->getId())]);
    }

    public function actionPriceslist() {

        $member = MemberEdit::find()->where(['id' => Yii::$app->user->identity->getId()])->one();
        $member->types = ArrayHelper::getColumn(MemberTypes::findBySql('SELECT type FROM member_types WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'type');
        $member->prices = ArrayHelper::index( MemberPrices::findBySql('SELECT price_id as id, price FROM member_prices WHERE member="'.Yii::$app->user->identity->getId().'" ')->asArray()->all(), 'id');

        return $this->renderPartial('prices-list', ['member'=>$member]);

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///
    ///  BILLING BLOCK
    ///
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function actionBilling() {
        $model = new MemberBilling();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->member_id = Yii::$app->user->identity->getId();
            $model->save();
            $balance = MemberHelper::GetBalance(Yii::$app->user->identity->getId());
            Yii::$app->db->createCommand()->update('members', [ 'balance' =>$balance], ' id="'.Yii::$app->user->identity->getId().'"')->execute();

            Yii::$app->session->setFlash('success', 'Баланс поповнено на : '.number_format(Yii::$app->request->post('MemberBilling')['summa'], 2 , ',' , ' ').' грн.');
            header('Location: ' . Url::to(['/members/member/billing']));
            exit();
        }
        return $this->render('billing', ['model'=>$model]);
    }


    public function actionBillinghistory() {
        $models = MemberBilling::find()->where(['member_id' => Yii::$app->user->identity->getId()])->all();
        return $this->render('billing-history', ['models'=>$models]);
    }

    public function actionBillingpayment() {





        $count = Yii::$app->db->createCommand('SELECT COUNT(*)FROM `member_suggestion_approved` a LEFT JOIN `member_suggestion` s ON s.id = a.suggestion_id LEFT JOIN `orders` o ON o.id = s.order_id WHERE s.member_id = "'.Yii::$app->user->identity->getId().'"')->queryScalar();

        $provider = new SqlDataProvider([
            'sql' => 'SELECT a.id, a.price, a.created_at, s.member_id, s.order_id, o.title FROM `member_suggestion_approved` a LEFT JOIN `member_suggestion` s ON s.id = a.suggestion_id LEFT JOIN `orders` o ON o.id = s.order_id WHERE s.member_id = "'.Yii::$app->user->identity->getId().'" ORDER BY a.created_at DESC ',
            'totalCount' => $count,
            'pagination' => ['pageSize' => 10, 'pageParam' => 'стр', 'pageSizeParam' => 'лім'],
        ]);



        return $this->render('payment-history', ['models'=>$provider->getModels(), 'pagination'=>$provider->pagination]);
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///
    ///  RESPONSE BLOCK
    ///
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function actionAddresponse($id)
    {



        $member = \common\modules\members\models\MemberSuggestion::findOne([
            'id' => $id
        ]);



        $model = new \common\modules\members\models\MemberResponse();
        return $this->render('@common/modules/members/views/response/step1', ['model'=>$model, 'member'=>$member]);
    }

    public function actionValidationsresponse($mode='step1')
    {


        switch($mode){
            case 'step1';
                $model = new \common\modules\members\models\MemberResponse(['scenario' => 'step1']);
                break;
            /*
                        case 'location':
                        case 'descriptions':
                        case 'budget':
                        case 'when_start':

                            $model = Orders::findOne([
                                'id' => Yii::$app->request->get('id'),
                                'member'=> Yii::$app->user->identity->getId(),
                            ]);
                            break;

                        case 'billing':
                            $model = new MemberBilling();
                            break;
            */
        }



        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())&& $model->validate())
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }

}
