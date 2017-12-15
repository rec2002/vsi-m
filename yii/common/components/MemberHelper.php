<?php

namespace common\components;

use Yii;
use yii\web\UrlManager;


class MemberHelper {

    const FORMA = array(1 => 'Приватний майстер', 2 => 'Бригада', 3=>'Компанія');

    const BRYGADA = array(1 => 'до 10 чоловік', 2 => '10-30 чоловік', 3=>'30-60 чоловік');

    const PRICE_TYPE = array(1=>'грн./год.', 2=>'грн./шт.', 3=>'грн./м2', 4=>'грн./м3', 5=>'грн./ м/п', 6=>'грн./місце', 7=>'грн./ось', 8=>'грн./позиція', 9=>'грн./доба', 10=>'грн./квартира',
        11=>'грн./робоче місце',  12=>'грн./точка', 13=>'грн./т', 14=>'грн./послуга', 15=>'грн./секція', 16=>'грн./кг', 17=>'грн./об`ект', 18=>'грн./стик', 19=>'грн/л.', 20=>'грн./стовп',
        /*21=>'грн./стовп',*/ 22=>'грн./свая', 23=>'грн./см.', 24=>'грн./зона', 25=>'грн./см2', 26=>'грн./ар', 27=>'грн./комплект', 28=>'грн./лист', 29=>'грн./місяць', 30=>'грн./га',
        31=>'грн./км', 32=>'грн./цикл');

    const WHEN_START = array(1=>'В період від ... до ...', 2=>'Сьогодні', 3=>'Завтра', 4=>'Будь-коли');

    const BUSY = array(0=>'Вільний для роботи', 1=>'Зайнятий до');

    const STATUS = array(0=>'На перевірці в модератора', 1=>'Скасовані модератором', 2=>'Шукають виконавця', 3=>'Прийняті до виконання', 4=>'Виконано', 5=>'Скасовано');

    const DISREGAST_SUGGESTION = array(1=>'Ні, дякую', 2=>'Надто дорого', 3=>'Мені не підходить');



    public static function PhoneCode($phone='') {
        Yii::$app->response->format = 'json';
        $model = new \common\modules\members\models\PhoneCheck();
        $model->phone=$phone;
        $model->IP = Yii::$app->getRequest()->getUserIP();

        $model->code=strtolower(Yii::$app->getSecurity()->generateRandomString(4));
        if ($model->validate()) {
            \common\modules\members\models\PhoneCheck::deleteAll("phone ='" . $model->phone . "'");
            if ($model->save()){
                // send confirmation sms
                Yii::$app->turbosms->send('Код підтвердження телефону: '.$model->code.' ', $model->phone);
                return json_encode(array('status'=>1));
            }
        }
        return json_encode(array('status'=>0));
    }


    public function GetAllRegions()
    {
        return Yii::$app->db->createCommand("SELECT id, name_short  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();
    }


    public static function GetMailTemplate($id, $data = array(), $client_email='') {

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



    public static function GetBudgetRange()
    {
        $arr =  Yii::$app->db->createCommand("SELECT id, name, budget_to FROM `dict_price_range` ORDER BY id ASC ")->queryAll();
        $arr_ = array();
        foreach ($arr as $key=>$val){
            if ($key==0) {
                $budget = 'до '.number_format($val['budget_to'], 0, ',', ' ').' грн. ('.$val['name'].')';
                $budget_short  = 'до '.number_format($val['budget_to'], 0, ',', ' ').' грн.';
            } else if ($arr[$key]['id']==sizeof($arr)) {
                $budget = number_format($arr[$key-1]['budget_to'], 0, ',', ' ').' - '.number_format($val['budget_to'], 0, ',', ' ').' грн. і більше ('.$val['name'].')';
                $budget_short = number_format($arr[$key-1]['budget_to'], 0, ',', ' ').' - '.number_format($val['budget_to'], 0, ',', ' ').' грн. і більше';
            } else {
                $budget = number_format($arr[$key-1]['budget_to'], 0, ',', ' ').' - '.number_format($val['budget_to'], 0, ',', ' ').' грн. ('.$val['name'].')';
                $budget_short = number_format($arr[$key-1]['budget_to'], 0, ',', ' ').' - '.number_format($val['budget_to'], 0, ',', ' ').' грн.';
            }
            $arr_[$val['id']] = array('name'=>$val['name'], 'budget'=>$budget, 'budget_short'=>$budget_short);
        }
        return $arr_;
    }


    public static function NumberSufix($n, $titles) {
        $cases = array(2, 0, 1, 1, 1, 2);
        return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];

        // how to use - echo NumberSufix(631, array('яблоко', 'яблока', 'яблок'));
    }


    public static function ListDates($dates='') {
        if (empty($dates)) return false;
        $month_name = array (1 => "cічня", 2 => "лютого", 3 => "березня", 4 => "квітня", 5 => "травня", 6 => "червня", 7 => "липня", 8 => "серпня", 9 => "вересня", 10 => "жовтня", 11 => "листопада", 12 => "грудня");
        $dates =  explode(',', $dates);
        $dates_arr = array();

        if(sizeof($dates)) foreach ($dates as $val) {
            $dates_arr[(int)date('m', strtotime($val))][] = array('day'=>date('j', strtotime($val)));
        }
        $periods  = array();
        foreach ($month_name as $key=>$val) {
             if (@sizeof($dates_arr[$key])) {
                 $temp = array();
                 foreach ($dates_arr[$key] as $item) {
                     $temp[] = $item['day'];
                 }
                 $periods[] = implode(',', $temp).' '.$month_name[$key];
             }
        }
        if (sizeof($periods)) return implode('; ', $periods);
        return false;
    }


    public static function GetMemberDoc($member, $id) {

        $ids = Yii::$app->db->createCommand("SELECT id, name, file FROM member_documents WHERE member_id='".$member."' AND id = '".$id."'")->queryOne();
        $dir = Yii::getAlias('@user_document');
        if (!is_file($dir.'/'.$ids['file']) || empty($ids['name']) || empty($ids['file'])) {
            throw new \yii\web\NotFoundHttpException('The file does not exists.');
        }
        return \Yii::$app->response->sendFile($dir.'/'.$ids['file'], $ids['name']);
    }




    public static function isActive($query_str = '', $exactly=false)
    {

        $item['url'][0] = 'members/customer/list';
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
             $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
           //     $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }

            echo ltrim($route, '/');

            echo "<br/>";
            echo Yii::$app->controller->route;
            echo "<br/>";

            if (ltrim($route, '/') !== Yii::$app->controller->route) {
                return false;
            }
echo "good";

            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                $params = $item['url'];
                unset($params[0]);
                foreach ($params as $name => $value) {
                    if ($value !== null && (!isset(Yii::$app->controller->params[$name]) || Yii::$app->controller->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;

        /*
        if (strpos(Yii::$app->controller->route.'/?'.Yii::$app->request->getQueryString(), $query_str) !== false) {
            return 'true';
        } else return 'false';
        */
    }



}