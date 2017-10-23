<?php

namespace common\modules\members\controllers;

use Yii;
use common\modules\members\models\MasterRegistration;
use common\modules\members\models\MemberRegions;
use common\modules\members\models\MemberTypes;
use common\modules\members\models\Members;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * Default controller for the `members` module
 */
class RegistrationController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex($id=1)
    {





        switch ($id) {
            case 1:
                $model = new MasterRegistration(['scenario' => 'step-1']);
                if ($model->load(Yii::$app->request->post())) {
                    if (is_array(Yii::$app->session['newUserSession']))
                        Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
                    else Yii::$app->session['newUserSession'] = array_merge(array(), Yii::$app->request->post('MasterRegistration'));

                    return $this->redirect(['/members/registration/?id=2']);
                }
                break;
            case 2:
                $model = new MasterRegistration(['scenario' => 'step-2']);
                if ($model->load(Yii::$app->request->post())) {
                    Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
                    return $this->redirect(['/members/registration/?id=3']);
                }

            break;
            case 3:
                $model = new MasterRegistration(['scenario' => 'step-3']);
                if ($model->load(Yii::$app->request->post())) {
                    Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
                    return $this->redirect(['/members/registration/?id=4']);
                }
                break;
            case 4:
                $model = new MasterRegistration(['scenario' => 'step-4']);
                if ($model->load(Yii::$app->request->post())) {
                    Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
                    return $this->redirect(['/members/registration/?id=5']);
                }

            break;
            case 5:
                $model = new MasterRegistration(['scenario' => 'step-5']);
                if ($model->load(Yii::$app->request->post())) {
                    if (Yii::$app->request->post('final')==1) {
                        Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], array('prices'=>''));
                    } else {
                        Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], Yii::$app->request->post('MasterRegistration'));
                    }
                    return $this->redirect(['/members/registration/?id=6']);
                }
            break;
            case 6:
                $model = new MasterRegistration(['scenario' => 'step-6']);

                $member = new Members();
                $member->first_name = @Yii::$app->session['newUserSession']['first_name'];
                $member->last_name = @Yii::$app->session['newUserSession']['last_name'];
                $member->email = @Yii::$app->session['newUserSession']['email'];
                $member->phone = @Yii::$app->session['newUserSession']['phone'];
                $member->password = @Yii::$app->session['newUserSession']['password'];
                $member->avatar_image = @Yii::$app->session['newUserSession']['avatar_image'];
                $member->place = @Yii::$app->session['newUserSession']['place'];
                $member->company = @Yii::$app->session['newUserSession']['company'];
                $member->about = @Yii::$app->session['newUserSession']['about'];

                switch ($member->forma){
                    case '1':
                        $member->brygada = null;
                        $member->company = null;
                    break;
                    case '2':
                        $member->company = null;
                    break;
                    case '3':
                        $member->brygada = null;
                    break;
                }


                $this->GetMailTemplate(3, $member->attributes, $member->email);
                $member->password = Yii::$app->getSecurity()->generatePasswordHash(@Yii::$app->session['newUserSession']['password']);
                $member->save(false);

                $member_id = Yii::$app->db->getLastInsertID();

                if (sizeof(@Yii::$app->session['newUserSession']['regions'])) foreach(@Yii::$app->session['newUserSession']['regions'] as $val){
                    if (!empty($val)) {
                        $regions = new MemberRegions();
                        $regions->region = $val;
                        $regions->member = $member_id;
                        $regions->save();
                    }
                }

                if (sizeof(@Yii::$app->session['newUserSession']['types'])) foreach(@Yii::$app->session['newUserSession']['types'] as $val){
                    if (!empty($val)) {
                        $regions = new MemberTypes();
                        $regions->type = $val;
                        $regions->member = $member_id;
                        $regions->save();
                    }
                }
                break;

            default:
                $id=1;
        }
/*
        if (empty(@Yii::$app->session['newUserSession']['step'])) {
            Yii::$app->session['newUserSession'] = array_merge(array(), array('step'=>'1'));
            return $this->redirect(['/members/registration/?id=1']);
        }elseif ($id > @Yii::$app->session['newUserSession']['step']){
            return $this->redirect(['/members/registration/?id='.@Yii::$app->session['newUserSession']['step']]);
        }
*/
        return $this->render('master'.$id, [
            'model' => $model,
        ]);
    }


    public function GetMailTemplate($id, $data = array(), $client_email='') {

        $template = Yii::$app->db->createCommand("SELECT `subject`, `emails`, `notices`, `mail_content`, `sms_content`, `message` FROM `mail_template` WHERE `id`= '".$id."' ")->queryAll();

        if (!sizeof($template) && !sizeof($data) && empty($id)) {
            Yii::$app->session->setFlash('error', 'Помилка надсилання пошти.');
            return false;
        }

        foreach($data as $key=>$val) {
            $template[0]['mail_content'] = str_replace('{'.strtoupper($key).'}', $val, $template[0]['mail_content']);
        }

        if (!empty($client_email)) $template[0]['emails'] =  str_replace('{EMAIL}', $client_email, $template[0]['emails']);

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

    public function actionValidation($id=1)
    {
        $model = new MasterRegistration(['scenario' => 'step-'.$id]);
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

    public function actionUploadavatar()
    {

        if ($file =  UploadedFile::getInstanceByName('file')) {
            $dir = Yii::getAlias('@type_images').'/members/avatars/temp/';
            $avatar = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$file->extension;
            $file->saveAs($dir.$avatar);
            Image::thumbnail($dir.$avatar, 262, 262)->save($dir.$avatar, ['quality' => 90]);
            Yii::$app->response->format = 'json';

            $session = Yii::$app->session;
            $session['MasterRegistration'] = [
                'avatar' => $avatar
            ];
            Yii::$app->session['newUserSession'] = array_merge(Yii::$app->session['newUserSession'], array('avatar_image'=>'/uploads/members/avatars/temp/'.$avatar));
            return json_encode(array('status'=>1, 'avatar_image'=>'/uploads/members/avatars/temp/'.$avatar));
        }
    }


    public function actionSendsms()
    {

        Yii::$app->turbosms->send('Марія Богданівно - Вітаємо Вас з виграшем автомобіля Toyota Land Cruiser 200. Прошу звернутися на сайт toyota.ua щодо підтвердження.', '+38 (097) 638-6934');

        return '111';

    }

}
