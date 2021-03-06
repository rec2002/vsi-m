<?php

namespace common\modules\members\controllers;

use Yii;
use yii\helpers\Url;
use common\modules\members\models\MemberResponse;
use common\modules\members\models\MemberResponseImages;
use common\modules\members\models\MemberSuggestion;
use common\modules\members\models\MemberEdit;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
use \yii\web\HttpException;

class ResponseController extends \yii\web\Controller
{

//ALTER TABLE `member_response` ADD `feedback_approve` TINYINT(1) NOT NULL AFTER `message_approve`, ADD `feedback_text` TEXT NOT NULL AFTER `feedback_approve`;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['majster', 'zamovnyk']
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?']
                    ]
                ]
            ]
        ];
    }




    public function actionCreate()
    {
        $member = MemberSuggestion::findOne([
            'id' => Yii::$app->request->get('id')
        ]);

        if (!$member) throw new HttpException(404 ,'Сторінка не знайдена.');

        $model = MemberResponse::findOne(['suggestion_id' => Yii::$app->request->get('id')]);


        $images = array();

        if (!$model)  $model = new MemberResponse(); else {
            $images = MemberResponseImages::findAll(['response_id' => $model->id]);
        }

//print_r ($images);



        if (Yii::$app->request->isPost) {
            if(Yii::$app->request->post('step-1')) {
                $model->suggestion_id =  Yii::$app->request->get('id');
                $model->step = (Yii::$app->request->post('MemberResponse')['meeting']==2) ? 1 : 2;
                $model->devotion =  Yii::$app->request->post('MemberResponse')['devotion'];
                $model->connected =  Yii::$app->request->post('MemberResponse')['connected'];
                $model->meeting =  Yii::$app->request->post('MemberResponse')['meeting'];
                $model->updated_at = date("Y-m-d H:i:s");
                $model->save(false);
            }

            if(Yii::$app->request->post('step-2')) {
                $model->step = (Yii::$app->request->post('MemberResponse')['meeting_result']==3 || Yii::$app->request->post('MemberResponse')['meeting_result']==2) ? 2 : 3;
                $model->punctuality =  Yii::$app->request->post('MemberResponse')['punctuality'];
                $model->price =  Yii::$app->request->post('MemberResponse')['price'];
                $model->meeting_result =  Yii::$app->request->post('MemberResponse')['meeting_result'];
                $model->meeting_comment =  Yii::$app->request->post('MemberResponse')['meeting_comment'];
                $model->date_continue  = date("Y-m-d", strtotime(Yii::$app->request->post('MemberResponse')['date_continue']));
                $model->updated_at = date("Y-m-d H:i:s");
                $model->save(false);
            }


            if(Yii::$app->request->post('step-3')) {

                if(Yii::$app->request->post('MemberResponse')['stage']==1) {
                    $model->step =  3;
                    $model->stage =  Yii::$app->request->post('MemberResponse')['stage'];
                    $model->days =  Yii::$app->request->post('MemberResponse')['days'];
                    $model->updated_at = date("Y-m-d H:i:s");
                    $model->save(false);
                } else {
                    $model->step =  4;
                    $model->stage =  Yii::$app->request->post('MemberResponse')['stage'];
                    $model->terms =  Yii::$app->request->post('MemberResponse')['terms'];
                    $model->quality =  Yii::$app->request->post('MemberResponse')['quality'];
                    $model->positive_negative =  Yii::$app->request->post('MemberResponse')['positive_negative'];
                    $model->come_personality =  Yii::$app->request->post('MemberResponse')['come_personality'];
                    $model->role =  Yii::$app->request->post('MemberResponse')['role'];
                    $model->positive_note =  Yii::$app->request->post('MemberResponse')['positive_note'];
                    $model->negative_note =  Yii::$app->request->post('MemberResponse')['negative_note'];
                    $model->conclusion_note =  Yii::$app->request->post('MemberResponse')['conclusion_note'];

                    $model->performer =  Yii::$app->request->post('MemberResponse')['performer'];
                    $model->dogovir =  Yii::$app->request->post('MemberResponse')['dogovir'];

                    $model->updated_at = date("Y-m-d H:i:s");
                    $model->save(false);
                    $reponse_id = $model->id;

                    $model->images_uploaded = array();
                    if (isset(Yii::$app->request->post('MemberResponse')['images_uploaded']))  $model->images_uploaded = Yii::$app->request->post('MemberResponse')['images_uploaded'];

                    $dir = Yii::getAlias('@type_images').'/members/responses/';
                    if (sizeof($images)) foreach ($images as $val) {
                        if (!in_array( $val['id'], $model->images_uploaded)) {
                            if (file_exists($dir.'thmb/'.$val['image']))  @unlink($dir.'thmb/'.$val['image']);
                            if (file_exists($dir.$val['image'])) @unlink($dir.$val['image']);
                            Yii::$app->db->createCommand()->delete('member_response_images', ['id' => $val['id']])->execute();
                        }
                    }

                    $model->image = UploadedFile::getInstances($model, 'image');
                    if ($model->image) {

                        foreach ($model->image as $image) {
                            $ResponseImages = new MemberResponseImages();
                            $ResponseImages->response_id = $reponse_id;
                            $filename = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$image->extension;
                            $ResponseImages->image = $filename;
                            $image->saveAs($dir.$filename);
                            Image::thumbnail($dir.$filename, 80, 80)->save($dir.'thmb/'.$filename, ['quality' => 90]);
                            Image::thumbnail($dir.$filename, 945, 600, ImageInterface::THUMBNAIL_INSET)->save($dir.$filename, ['quality' => 90]);
                            $ResponseImages->save(false);
                        }
                    }
                }
            }
            header('Location: ' . Url::to(['/members/response/create', 'id' => Yii::$app->request->get('id'), 'step'=>$model->step]));
            exit();
        }

        if (in_array(Yii::$app->request->get('step'), array(1, 2)) && $model->step < 4) {
            $model->step = $_GET['step'];
        }


        switch ($model->step) {
            case '1':
                $template = 'step1';
            break;
            case '2':
                $template = 'step2';
            break;
            case '3':
                $template = 'step3';
                break;
            case '4':
                $template = 'finish';
                break;
            case '5':
                $template = 'step5';
                break;
            default: $template = 'step1';

        }


        return $this->render($template, ['model'=>$model, 'member'=>$member, 'images' => $images]);


    }

    public function actionValidations($mode='step1')
    {

        switch($mode){
            case 'step1';

            break;

            case 'step2';
                $model = new MemberResponse(['scenario' => 'step2']);
                break;

        }

        $model = new MemberResponse(['scenario' => 'step1']);
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())&& $model->validate())
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }


    }

}
