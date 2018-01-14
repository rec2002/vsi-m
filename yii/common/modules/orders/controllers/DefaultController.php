<?php

namespace common\modules\orders\controllers;

use yii\web\Controller;

use Yii;
use yii\helpers\Url;

use common\modules\members\models\Orders;
use common\modules\members\models\OrderImages;
use common\modules\orders\models\MemberSuggestion;
use common\modules\orders\models\MemberSuggestionApproved;

use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use common\components\MemberHelper;
use yii\web\Session;
use \yii\web\HttpException;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
use yii\widgets\ActiveForm;

/**
 * Default controller for the `Orders` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($ajax = false)
    {

        $param = [];
        $param[':status'] = 1;

        if (Yii::$app->request->isPost){
            unset($_SESSION['filter']);
            if (!empty(Yii::$app->request->post('types'))) $_SESSION['filter'][':types'] = Yii::$app->request->post('types');
            if (!empty(Yii::$app->request->post('budgets'))) $_SESSION['filter'][':budgets'] = Yii::$app->request->post('budgets');
            if (!empty(Yii::$app->request->post('regions'))) $_SESSION['filter'][':regions'] = Yii::$app->request->post('regions');
        }


        if (sizeof(Yii::$app->session['filter']))  $param = array_merge($param, Yii::$app->session['filter']);



        $filter = $filter_join = array();
        if (sizeof($param)) foreach($param as $key=>$val){
            switch($key){
                case ':member':
                    $filter[] = ' o.member='.$val;
                    break;
                case ':regions':
                    $filter[] = ' o.region IN ('."'".implode("','", explode(',', $val))."'".')';
                    break;
                case ':budgets':
                    $filter[] = ' o.budget IN ('."'".implode("','", explode(',', $val))."'".')';
                    break;
                case ':types':
                    $filter[] = ' ot.type IN ('."'".implode("','", explode(',', $val))."'".')';
                    $filter_join[]= ' type IN ('."'".implode("','", explode(',', $val))."'".')';
                    break;
                case ':status':
                    $filter[] = ' o.status > '.$val;
                    break;
            }
        }

        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM orders o 
                                                    LEFT JOIN (SELECT order_id, type FROM `order_types`  '.((sizeof($filter_join)) ?  'WHERE '.implode(' AND ', $filter_join) : '').' GROUP BY order_id) ot ON o.id = ot.order_id 
                                                    '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : ''))->queryScalar();


        $provider = new SqlDataProvider([
            'sql' => 'SELECT o.id, o.title, o.descriptions, o.location, o.budget as budget_name, DATE_FORMAT(o.created_at, "%d.%m.%Y") as created_at, o.status, (SELECT count(s.id) FROM `member_suggestion` s WHERE o.id = s.order_id) as `suggestions`  FROM `orders` o 
                     LEFT JOIN (SELECT order_id, type FROM `order_types`  '.((sizeof($filter_join)) ?  'WHERE '.implode(' AND ', $filter_join) : '').' GROUP BY order_id) ot ON o.id = ot.order_id
                     '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').' ORDER BY o.status, o.created_at DESC',
            'totalCount' => $count,
            'pagination' => ['pageSize' => 10, 'pageParam' => 'стр', 'pageSizeParam' => 'лім']
        ]);




        $status = MemberHelper::GetBudgetRange();
        // Setter
        $arr = array();
        foreach( $provider->models as $key => $val){
            $arr[$key] = $provider->models[$key];
            $arr[$key]['budget_name'] = $status[$val['budget_name']]['budget'];
        }
        $provider->models =  $arr;

        if ($ajax) {
            return $this->renderAjax('list-partial', ['model'=>$provider]);
        } else  return $this->render('index', ['model'=>$provider]);


    }


    public function actionDetail($id)
    {
        $model = Orders::find()->where(['id'=>$id])->one();
        if (!$model) throw new HttpException(404 ,'Замовлення не знайдено, або знаходиться на модерації');
        $images = OrderImages::findAll(['order_id' => $model->id]);
        $suggestion = MemberSuggestion::findAll(['order_id' => $model->id]);
        return $this->render('order-view', ['model'=>$model, 'images'=>$images, 'suggestions'=>sizeof($suggestion)]);
    }




    public function actionEdit($id)
    {
        $model = Orders::find()->where(['id'=>$id])->one();
        if (!$model) throw new HttpException(404 ,'Замовлення не знайдено, або знаходиться на модерації');
        $images = OrderImages::findAll(['order_id' => $model->id]);
        $suggestion = MemberSuggestion::findAll(['order_id' => $model->id]);

        if (!Yii::$app->user->isGuest) {
            if ($model->member == Yii::$app->user->identity->getId()) {
                 $model = Orders::findOne([
                     'id' => Yii::$app->request->get('id'),
                     'member' => Yii::$app->user->identity->getId(),
                 ]);

                 if ($model->date_from == '0000-00-00') $model->date_from = ''; else $model->date_from = date("d.m.Y", strtotime($model->date_from));
                 if ($model->date_to == '0000-00-00') $model->date_to = ''; else $model->date_to = date("d.m.Y", strtotime($model->date_to));
                 return $this->render('edit', ['model' => $model, 'budget' => MemberHelper::GetBudgetRange(), 'images' => $images, 'suggestions'=>sizeof($suggestion)]);
            }
        } else {
            header('Location: ' . Url::to(['/orders/default/detail', 'id' => $id]));
            exit();
        }
    }


    public function actionValidation($mode='personal')
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
        }



        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())&& $model->validate())
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }




    public function actionMyorders($status='')  {

        $param = [];
        $param[':member'] = Yii::$app->user->identity->getId();

        $count_total = Yii::$app->db->createCommand('select count(member) as total, sum(case when status = \'1\' then 1 else 0 end) status_1, sum(case when status = \'2\' then 1 else 0 end) status_2, sum(case when status = \'3\' then 1 else 0 end) status_3,
        sum(case when status = \'4\' then 1 else 0 end) status_4, sum(case when status = \'5\' then 1 else 0 end) status_5 from `orders` WHERE member=:member group by member', $param)->queryOne();


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
            'sql' => 'SELECT o.id, o.title, o.descriptions, o.location, o.budget as budget_name, DATE_FORMAT(o.created_at, "%d.%m.%Y") as created_at, o.status, 
              (SELECT count(s.id) FROM `member_suggestion` s WHERE o.id = s.order_id) as `suggestions`  FROM `orders` o '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').' ORDER BY o.status, o.created_at DESC',
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

        return $this->render('index', ['model'=>$provider, 'count_total'=>$count_total]);
    }


    public function actionSuggested($status='')  {

     //   $param = [];
        $param[':member'] = Yii::$app->user->identity->getId();
        $count_total = Yii::$app->db->createCommand('select count(s.id) as status_0, 
                                                        sum(case when a.id IS NOT NULL then 1 else 0 end) status_1,
                                                        sum(case when (r.meeting_result=1 AND r.step=2)  then 1  when (r.stage=1 AND r.step=3)  then 1 else 0 end) status_2,
                                                        sum(case when (r.stage=2 AND r.step=5)  then 1 else 0 end) status_3,
                                                        sum(case when (o.status=5)  then 1 else 0 end) status_4 from `member_suggestion` s
                                                        LEFT JOIN `orders` o ON o.id = s.order_id 
                                                        LEFT JOIN `member_suggestion_approved` a ON a.suggestion_id = s.id
                                                        LEFT JOIN `member_response` r ON r.suggestion_id = s.id
                                                        WHERE s.member_id=:member group by s.member_id', $param)->queryOne();

        if ($status != '')  $param[':status'] = $status;
        $filter = array();
        $filter[] = ' s.member_id='.Yii::$app->user->identity->getId();
        switch(Yii::$app->getRequest()->getQueryParam('status')){
            case '1':
                $filter[] = ' a.id IS NOT NULL ';
                break;
            case '2':
                $filter[] = ' ((r.meeting_result=1 AND r.step=2) OR (r.stage=1 AND r.step=3)) ';
                break;
            case '3':
                $filter[] = ' (r.stage=2 AND r.step=5) ';
                break;
            case '4':
                $filter[] = ' (o.status=5) ';
                break;
        }

        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM member_suggestion s
                                                    LEFT JOIN `orders` o ON o.id = s.order_id 
                                                    LEFT JOIN `member_suggestion_approved` a ON a.suggestion_id = s.id
                                                    LEFT JOIN `member_response` r ON r.suggestion_id = s.id
                                                    '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : ''))->queryScalar();


        $provider = new SqlDataProvider([
            'sql' => 'SELECT o.id, o.title, o.descriptions, o.location, o.budget as budget_name, DATE_FORMAT(o.created_at, "%d.%m.%Y") as created_at, o.status, 
              (SELECT count(s.id) FROM `member_suggestion` s WHERE o.id = s.order_id) as `suggestions`  FROM `member_suggestion` s
                                                    LEFT JOIN `orders` o ON o.id = s.order_id 
                                                    LEFT JOIN `member_suggestion_approved` a ON a.suggestion_id = s.id
                                                    LEFT JOIN `member_response` r ON r.suggestion_id = s.id
               
               '.((sizeof($filter)) ?  'WHERE '.implode(' AND ', $filter) : '').' ORDER BY s.created_at DESC',
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

        return $this->render('index', ['model'=>$provider, 'count_total'=>$count_total]);
    }

    public function actionAddorder()  {

        $order = new Orders(['scenario' => 'add-order']);

        if (!sizeof(@$_SESSION['suggested']) || !isset($_SESSION['suggested'])) $_SESSION['suggested'] = array();
        $suggested = ArrayHelper::getColumn($_SESSION['suggested'], 'id');
        $members = array();
        if (sizeof($suggested)) {
            $members = Yii::$app->db->createCommand('SELECT m.id, m.avatar_image, IF(m.forma=3,  m.company, CONCAT(m.first_name, \' \', m.last_name, \' \', m.surname)) as name  FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      WHERE m.id IN ('."'".implode("','", $suggested)."'".') AND a.item_name="majster" ORDER BY FIELD(m.id, '.implode(",", $suggested).')')->queryAll();
        }

        return $this->render('create', ['order'=>$order, 'suggested'=>array('total'=>sizeof($members), 'members'=>$members)]);
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

            if (!sizeof(@$_SESSION['suggested']) || !isset($_SESSION['suggested'])) $_SESSION['suggested'] = array();

            if (sizeof($_SESSION['suggested'])) {
                $emails = array();
                foreach ($_SESSION['suggested'] as $key=>$val) {
                    $member = Yii::$app->db->createCommand('SELECT m.id, m.email, m.avatar_image  FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      WHERE m.id = "' . $val['id'] . '" AND a.item_name="majster" ')->queryOne();
                     $emails[] = $member['email'];
                }
                $model->suggestions = @implode(',', $emails);
                unset($_SESSION['suggested']);
            } else $model->suggestions ='';

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
                    $ordersImages->save(false);
                }
            }




            \common\components\MemberHelper::GetMailTemplate(4,  $model->attributes, Yii::$app->user->identity->email);
            return $this->redirect(['/orders/default/myorders']);
        }

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

    public function actionOrderclose()
    {
        if (Yii::$app->request->isPost) {
            $model = Orders::findOne([
                'id' => Yii::$app->request->post('Orders')['id'],
                'member'=> Yii::$app->user->identity->getId(),
            ]);

            if ($model->load(Yii::$app->request->post())) {

                $model->status = Yii::$app->request->post('Orders')['status'];
                $model->save('false');
            }
            header('Location: ' . Url::to(['/orders/default/detail', 'id' => Yii::$app->request->post('Orders')['id']]));
            exit();
        }
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


    public function actionGallery($id)
    {
        $images = OrderImages::find()->select(['image', 'order_id'])->where(['order_id'=>$id])->orderBy(['created_at'=>SORT_ASC, 'id'=>SORT_ASC])->all();
        return $this->renderAjax('images', ['images'=> $images]);
    }



    public function GetStartVal($model) {
        if ($model->when_start == 1)
            return 'В період від ' . date('d.m.Y', strtotime( $model->date_from)) . ' до ' . date('d.m.Y', strtotime( $model->date_to));
        elseif ($model->when_start == 2 || $model->when_start == 3)
            return date('d.m.Y', strtotime( $model->date_from));
        elseif ($model->when_start == 4) return 'Будь-коли';
    }


    public function actionSuggestionsave($id=0)  {

        $model = new MemberSuggestion();


        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            $model->validate();
        }

     return 1;

    }


    public function actionApproovesuggestion()  {

        if (Yii::$app->request->isPost) {
            $count_total = Yii::$app->db->createCommand('select count(*) as total from `member_suggestion_approved` WHERE suggestion_id="' . Yii::$app->request->post('id') . '"')->queryOne();
            $member = Yii::$app->db->createCommand('select o.member, s.member_id from `member_suggestion` s LEFT JOIN `orders` o ON o.id = s.order_id WHERE s.id="' . Yii::$app->request->post('id') . '"')->queryOne();
            $model = new MemberSuggestionApproved();
            Yii::$app->response->format = 'json';
            if ($count_total['total']==0 && $member['member']==Yii::$app->user->identity->getId()) {
                $model->suggestion_id = Yii::$app->request->post('id');
                $model->price = 0;
                $model->save(false);

                Yii::$app->db->createCommand()->insert('member_msg', ['suggestion_id' => Yii::$app->request->post('id'), 'member_id'=>$member['member_id'], 'msg'=>'Дано дозвіл на відкриття телефону',  'system'=>1])->execute();
                $id_msg = Yii::$app->db->getLastInsertID();
                Yii::$app->db->createCommand()->insert('member_msg_unread', ['msg_id' => $id_msg, 'member_id'=>$member['member_id'],  'support'=>0])->execute();

                return json_encode(array('status'=>'ok'));
            }
        }
        return json_encode(array('status'=>'error'));
    }


    public function actionTest()  {

        if (!sizeof(@$_SESSION['suggested']) || !isset($_SESSION['suggested'])) $_SESSION['suggested'] = array();

        if (sizeof($_SESSION['suggested'])) {
            $emails = array();
            foreach ($_SESSION['suggested'] as $key=>$val) {

                $member = Yii::$app->db->createCommand('SELECT m.id, m.email, m.avatar_image  FROM `members` m
                      LEFT JOIN `auth_assignment` a ON a.user_id = m.id
                      WHERE m.id = "' . $val['id'] . '" AND a.item_name="majster" ')->queryOne();


                $emails[] = $member['email'];


                print_r($member);
            }

            echo implode(',', $emails);
        }




        return 1;

    }

}
