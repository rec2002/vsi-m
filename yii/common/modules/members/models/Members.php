<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Members extends \yii\db\ActiveRecord
{
/*
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $place;
    public $forma;
    public $about;
    public $brygada;
    public $company;
    public $avatar_image;
*/
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%members}}';
    }


    public function rules()
    {
        return [

            [['first_name', 'last_name', 'phone', 'email'], 'required'],
/*
            [['first_name', 'last_name', 'phone', 'email', 'password', 'confirm_sms', 'password_repeat'], 'required', 'on' => 'step-1'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'step-1'],
            [['password'],  'match', 'pattern' => '/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/', 'message' => 'Латинські символи і цифри.', 'on' => 'step-1'],
            [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.', 'on' => 'step-1'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'step-1'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 6 символiв.', 'on' => 'step-1'],
            [['password'], 'compare', 'compareAttribute' => 'password_repeat', 'on' => 'step-1'],
            ['email', 'email', 'on' => 'step-1'],
            ['email', 'checkMyUniqunessEmail', 'on' => 'step-1'],
            ['phone', 'checkSendPhoneCode', 'on' => 'step-1'],
            ['confirm_sms', 'checkSMSCode', 'on' => 'step-1'],
            [['place', 'forma'], 'required', 'on' => 'step-2'],
            [['about', 'brygada'], 'filter', 'filter' => 'trim', 'skipOnArray' => true, 'on' => 'step-2'],
            [['company'], 'required', 'when' => function ($model) { if ($model->forma==3)return true; else return false;}, 'on' => 'step-2'],
            [['avatar_image'], 'image'],
            [['regions'], 'required',  'message' => 'Прошу вибрати хоча б одну область.', 'on' => 'step-3'],
            [['types'], 'required',  'message' => 'Прошу вибрати хоча б вид робіт.', 'on' => 'step-4'],
            [['prices'], 'required', 'on' => 'step-5'],
*/
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
            'avatar_image'=>'Ваше фото 262x262px;',
        ];
    }







}
