<?php

namespace common\components;

use Yii;

class MemberHelper {

    const FORMA = array(1 => 'Приватний майстер', 2 => 'Бригада', 3=>'Компанія');

    const BRYGADA = array(1 => 'до 10 чоловік', 2 => '10-30 чоловік', 3=>'10-30 чоловік');

    const PRICE_TYPE = array(1=>'грн./год.', 2=>'грн./шт.', 3=>'грн./м2', 4=>'грн./м3', 5=>'грн./ м/п', 6=>'грн./місце');

    const WHEN_START = array(1=>'В період від ... до ...', 2=>'Сьогодні', 3=>'Завтра');

    public function PhoneCode($phone='') {
        Yii::$app->response->format = 'json';
        $model = new \common\modules\members\models\PhoneCheck();
        $model->phone=$phone;
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

}