<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;


/**
 * ContactForm is the model behind the contact form.
 */
class CustomerRegistration extends Model
{
    public $title;
    public $descriptions;
    public $first_name;
    public $email;
    public $phone;
    public $password;
    public $confirm_sms;
    public $agree = false;
    public $location;
    public $budget;
    public $when_start;
    public $date_from;
    public $date_to;
    public $region;
    public $image = array();
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'descriptions', 'location'], 'required', 'on' => 'home-page'],
            [['region'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Адресу не визначено. Прошу вибрати адресу зі списку', 'on' => 'home-page'],
            ['phone', 'checkMyUniqunessPhone', 'on' => 'add-order'],
            [['confirm_sms'], 'checkSMSCode_', 'skipOnEmpty' => false, 'on' => 'add-order'],
			[['confirm_sms'], 'required',  'whenClient' => "function (attribute, value) { if ($('input#confirm_sms').val()=='') setTimeout(function(){  $('input.simple-input[type=\"tel\"]').next().html('Підтвердіть контактний телефон через SMS.'); }, 300); } ", 'on' => 'add-order'],
			[['phone'], 'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.', 'on' => 'add-order'],
            [['date_from', 'date_to'], 'required', 'skipOnEmpty' => false, 'when' => function ($model) { if ($model->when_start==1) return true; else return false;}, 'whenClient' => "function (attribute, value) { if ($('#customerregistration-when_start').val() == '1') return true; else return false; }", 'message' => 'Обов\'язкове для заповнення', 'on' => 'add-order'],
            [['title', 'descriptions', 'location', 'first_name', 'email', 'phone', 'confirm_sms', 'budget', 'when_start'], 'required', 'on' => 'add-order'],
            [['first_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'add-order'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'add-order'],
            ['email', 'email', 'on' => 'add-order'],
            [['region'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Адресу не визначено. Прошу вибрати адресу зі списку', 'on' => 'add-order'],
            [['image'], 'file'],
            [['email'], 'filter', 'filter' => 'trim', 'on' => 'add-order'],
            ['email', 'checkMyUniqunessEmail', 'on' => 'add-order'],
            ['phone', 'checkSendPhoneCode', 'on' => 'add-order'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'Iм’я',
            'title' => 'Заголовок',
            'descriptions'=>'Опис завдання',
            'location'=>'Місце розташування',
            'when_start'=>'Коли потрібно починати',
            'date_from'=>'Виберіть дату `з`',
            'date_to'=>'Виберіть дату `до`',
            'email'=>'Email',
            'phone'=>'Контактний телефон',
            'confirm_sms'=>'Kод отриманий по смс',
            'agree'=>'Правила користування'
        ];
    }

    public function checkMyUniqunessEmail($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `members` WHERE email = '".$this->email."' LIMIT 1")->queryScalar();
        if($count>0) {
            $this->addError($attribute, 'Користувач з таким Email-лом вже зареєстрований.');
            return false;
        } else return true;
    }

    public function checkMyUniqunessPhone($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `members` WHERE phone = '".$this->phone."' LIMIT 1")->queryScalar();
        if($count>0) {
            $this->addError($attribute, 'Користувач з таким телефоном вже зареєстрований.');
            return false;
        } else return true;
    }

    public function checkSendPhoneCode($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `phone_check` WHERE phone = '".$this->phone."' LIMIT 1")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } else return true;
    }

    public function checkSMSCode_($attribute, $params) {

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' AND  phone = '".$this->phone."' LIMIT 1")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }




}
