<?php

namespace common\components;

use Yii;
use yii\web\UrlManager;
use yii\helpers\Html;
use yii\helpers\Url;

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

    const BILLING = array(1000=>'1 000 грн', 1500=>'1 500 грн', 2000=>'2 000 грн', 2500=>'2 500 грн');

    const PAYMENT = array(1=>'Приват24', 2=>'Банківський переказ', 3=>'Квитанція для оплати в банку');







    public static function PhoneCode($phone='') {
        Yii::$app->response->format = 'json';
        $model = new \common\modules\members\models\PhoneCheck();
        $model->phone=$phone;
        $model->IP = Yii::$app->getRequest()->getUserIP();

        $model->code=strtolower(rand(1000, 9999));
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

    public static function GetSMSTemplate($id, $data = array(), $phone='') {

        $template = Yii::$app->db->createCommand("SELECT `subject`, `emails`, `notices`, `sms_content`, `message` FROM `mail_template` WHERE `id`= '".$id."' ")->queryAll();

        if (!sizeof($template) && !sizeof($data) && empty($id) && empty($phone)) {
            return false;
        }

        foreach($data as $key=>$val) {
            $template[0]['sms_content'] = str_replace('{'.strtoupper($key).'}', $val, $template[0]['sms_content']);
        }

        Yii::$app->turbosms->send($template[0]['sms_content'], $phone);

        return $template[0]['sms_content'];
    }

    public static function GetAccessNotification($member, $type) {
        return  Yii::$app->db->createCommand("SELECT `email`, `sms`  FROM `notices_members` WHERE `member` = '".$member."' AND `notice_id`= '".$type."' ")->queryOne();
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

    public static function GetShortDates($dates='') {
        $month_name = array (1 => "січ.", 2 => "лют.", 3 => "бер.", 4 => "квіт.", 5 => "трав.", 6 => "черв.", 7 => "лип.", 8 => "серп.", 9 => "вер.", 10 => "жовт.", 11 => "лист.", 12 => "груд.");
        return  date('j', strtotime($dates)).' '.$month_name[(int)date('m', strtotime($dates))];
    }


    public static function GetMemberDoc($member, $id) {

        $ids = Yii::$app->db->createCommand("SELECT id, name, file FROM member_documents WHERE member_id='".$member."' AND id = '".$id."'")->queryOne();
        $dir = Yii::getAlias('@user_document');
        if (!is_file($dir.'/'.$ids['file']) || empty($ids['name']) || empty($ids['file'])) {
            throw new \yii\web\NotFoundHttpException('The file does not exists.');
        }
        return \Yii::$app->response->sendFile($dir.'/'.$ids['file'], $ids['name']);
    }



    public static function GetBalance($id = '', $string=false) {
        $ids = Yii::$app->db->createCommand("SELECT SUM(summa) as summa FROM `member_billing` WHERE member_id = '".$id."' ")->queryOne();
        if ($string) {
            return number_format($ids['summa'], 2 , ',' , ' ');

        } else return $ids['summa'];
    }


    public static function GetRatingStar($value = '', $field='', $editable=true) {
        $options = '';

        if ($editable==true) {

            for ($i = 1; $i <= 5; $i++) {
                $options .= '<span ' . (($i == $value) ? 'class="active"' : '') . '><i class="tt-icon star-empty"></i><i class="tt-icon star"></i></span>';
            }
            $options = '<div class="tt-rating-stars wth-hover ' . $field . ' ' . (($value > 0) ? 'selected' : '') . '" data-field="' . $field . '">' . $options . '</div>';

        } else {

            for ($i = 1; $i <= 5; $i++) {
                 $options .= '<i class="tt-icon star ' . (($value < $i) ? 'star-empty' : '') . '"></i>';
            }
            $options = '<div class="tt-rating-stars">' . $options . '</div>';

        }


        return $options;
    }

    public static function GetResponseButton($id = '') {

         if (empty($id)) return false;

        $member = \common\modules\members\models\MemberSuggestion::findOne([
            'id' => $id
        ]);

        $model = \common\modules\members\models\MemberResponse::findOne(['suggestion_id' => $id]);
        if (!$model)  {
            return Html::a('Написати відгук', Url::toRoute(['/members/response/create', 'id' => $id]), ['class'=>'button type-1 size-3']);
        }

        if ($model->step < 4) {
            return Html::a('Дописати відгук', Url::toRoute(['/members/response/create', 'id' => $id]), ['class'=>'button type-1 size-3 color-3']);
        }

        if ($model->step == 4) {
            return Html::a('Відгук на перевірці', Url::toRoute(['/members/response/create', 'id' => $id]), ['class'=>'button type-1 size-3 color-4']);
        }

        if ($model->step == 5) {
            return Html::a('Відгук опубліковано', Url::toRoute(['/members/response/create', 'id' => $id]), ['class'=>'button type-1 size-3 color-5']);
        }

    }

    public static function GetRating($id = '') {
        $rating = Yii::$app->db->createCommand("SELECT count(res.id) as total, SUM(res.devotion) as devotion, SUM(res.connected) as connected, SUM(res.punctuality) as punctuality, SUM(res.price) as price, SUM(res.terms) as terms, SUM(res.quality) as quality, 
                                                    (SELECT count(res.id) FROM `member_response` res LEFT JOIN `member_suggestion` s1 ON s1.id = res.suggestion_id WHERE res.step = 5 AND res.positive_negative=1 AND s1.member_id=s.member_id ) as positive, 
                                                    (SELECT count(res.id) FROM `member_response` res LEFT JOIN `member_suggestion` s1 ON s1.id = res.suggestion_id WHERE res.step = 5 AND res.positive_negative=2 AND s1.member_id=s.member_id ) as negative 
                                                    FROM `member_response` res LEFT JOIN `member_suggestion` s ON s.id = res.suggestion_id WHERE res.step = 5 AND s.member_id='".$id."' ")->queryOne();

        if ($rating['total']>0) {
            $rating['devotion'] = round($rating['devotion']/$rating['total']);
            $rating['connected'] = round($rating['connected']/$rating['total']);
            $rating['punctuality'] = round($rating['punctuality']/$rating['total']);
            $rating['price'] = round($rating['price']/$rating['total']);
            $rating['terms'] = round($rating['terms']/$rating['total']);
            $rating['quality'] = round($rating['quality']/$rating['total']);
        }
        return $rating;
    }

    public static function GetCountMessages($member=0)
    {
        return Yii::$app->db->createCommand('SELECT count(*) as count FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON  msg.id=u.msg_id WHERE u.status=0 AND u.member_id="'.$member.'" AND u.support = 0')->queryOne()['count'];
    }




}