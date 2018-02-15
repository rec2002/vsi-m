<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MasterRegistration extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $password_repeat;
    public $confirm_sms;
    public $agree = false;
    public $place;
    public $forma;
    public $about;
    public $brygada;
    public $company;
    public $avatar;
    public $regions;
    public $types;
    public $prices;
    public $step;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['first_name', 'last_name', 'phone', 'email', 'password', 'confirm_sms', 'password_repeat'], 'required', 'on' => 'step-1'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'step-1'],
            [['password'],  'match', 'pattern' => '/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/', 'message' => 'Латинські символи і цифри.', 'on' => 'step-1'],
            [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.', 'on' => 'step-1'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'step-1'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 6 символiв.', 'on' => 'step-1'],
            [['password'], 'compare', 'compareAttribute' => 'password_repeat', 'on' => 'step-1'],
            ['email', 'email', 'on' => 'step-1'],
            [['email'], 'filter', 'filter' => 'trim', 'on' => 'step-1'],
            ['email', 'checkMyUniqunessEmail', 'on' => 'step-1'],
            ['phone', 'checkSendPhoneCode', 'message'=>'Підтвердіть контактний телефон через SMS.', 'on' => 'step-1'],
            ['confirm_sms', 'checkSMSCode', 'on' => 'step-1'],
     //       [['confirm_sms'], 'required',  'whenClient' => "function (attribute, value) { if ($('input#confirm_sms').val()=='') setTimeout(function(){  $('input.simple-input[type=\"tel\"]').next().html('Підтвердіть контактний телефон через SMS.'); }, 300); } ", 'on' => 'step-1'],
            [['place', 'forma'], 'required', 'on' => 'step-2'],
            [['about', 'brygada'], 'filter', 'filter' => 'trim', 'skipOnArray' => true, 'on' => 'step-2'],
            [['company'], 'required', 'when' => function ($model) { if ($model->forma==3) return true; else return false;}, 'whenClient' => "function (attribute, value) { if ($('#masterregistration-forma').val() == '3') return true; else return false; }", 'on' => 'step-2'],
            [['avatar'], 'image'],
            [['regions'], 'required',  'message' => 'Прошу вибрати хоча б одну область.', 'on' => 'step-3'],
            [['types'], 'required',  'message' => 'Необхідно вибрати мінімум один пункт.', 'on' => 'step-4'],
            [['prices'], 'required', 'on' => 'step-5'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'Iм’я',
            'last_name' => 'Прізвище',
            'email'=>'Email',
            'phone'=>'Контактний телефон',
            'password'=>'Пароль',
            'password_repeat'=>'Повторити пароль',
            'confirm_sms'=>'Kод отриманий по смс',
            'agree'=>'Правила користування',
            'place' => 'Основне місце розташування',
            'forma' => 'Форма роботи із замовниками',
            'brygada'=> 'Бригада',
            'company'=>'Назва компанії',
            'avatar'=>'Ваше фото 262x262px;',
        ];
    }

    public function checkMyUniqunessEmail($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `members` WHERE email = '".$this->email."' LIMIT 1")->queryScalar();
        if($count>0) {
            $this->addError($attribute, 'Користувач з таким Email-лом вже зареєстрований.');
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

    public function checkSMSCode($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' LIMIT 1")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }





}
