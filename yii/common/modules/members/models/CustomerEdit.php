<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;


/**
 * ContactForm is the model behind the contact form.
 */
class CustomerEdit extends Model
{

    public $last_name;
    public $first_name;
    public $email;
    public $phone;
    public $confirm_sms;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            /*
            [['first_name', 'email', 'phone'], 'required'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.'],

            ['email', 'email'],
            ['email', 'checkMyUniqunessEmail'],

            [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.'],
            ['phone', 'checkChangedPhoneCode'],
            ['confirm_sms', 'checkSMSCode', 'skipOnEmpty' => true],
            ['confirm_sms', 'checkSMSCodeRequired', 'skipOnEmpty' => false],


            */


    //        [['confirm_sms'], 'checkSMSCode_', 'skipOnEmpty' => false, 'on' => 'add-order'],
    //        [['confirm_sms'], 'required',  'whenClient' => "function (attribute, value) { if ($('input#confirm_sms').val()=='') setTimeout(function(){  $('input.simple-input[type=\"tel\"]').next().html('Підтвердіть контактний телефон через SMS.'); }, 300); } ", 'on' => 'add-order'],
    //        [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.', 'on' => 'add-order'],
            [['first_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'first_name'],
    //        ['email', 'email', 'on' => 'add-order'],
    //        [['email'], 'filter', 'filter' => 'trim', 'on' => 'add-order'],
     //       ['email', 'checkMyUniqunessEmail', 'on' => 'add-order'],
     //       ['phone', 'checkSendPhoneCode', 'on' => 'add-order'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'Iм’я',
            'email'=>'Email',
            'last_name' => 'Прізвище',
            'phone'=>'Контактний телефон',
            'confirm_sms'=>'Kод отриманий по смс',

        ];
    }

    public function checkMyUniqunessEmail($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `members` WHERE email = '".$this->email."' AND id <> '".Yii::$app->user->identity->getId()."' LIMIT 1")->queryScalar();
        if($count>0) {
            $this->addError($attribute, 'Користувач з таким Email-лом вже зареєстрований.');
            return false;
        } else return true;
    }

    public function checkChangedPhoneCode($attribute, $params) {

        $item = Yii::$app->db->createCommand("SELECT phone FROM  `members` WHERE id = '".Yii::$app->user->identity->getId()."' LIMIT 1")->queryOne();
        if($this->phone!=$item['phone'] && empty($this->confirm_sms)) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } else return true;
    }

    public function checkSMSCode($attribute, $params) {

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' AND phone = '".$this->phone."' ORDER BY id DESC LIMIT 1 ")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }


}
