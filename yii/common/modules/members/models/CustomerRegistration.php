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
    public $image = array();
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
     /*       [['title', 'descriptions', 'location'], 'required', 'on' => 'home-page'],*/

            [['confirm_sms'], 'checkSMSCode_', 'skipOnEmpty' => false, 'on' => 'add-order'],
            [['title', 'descriptions', 'location', 'first_name', 'email', 'phone', 'confirm_sms', 'budget'], 'required', 'on' => 'add-order'],
            [['first_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'add-order'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'add-order'],
            ['email', 'email', 'on' => 'add-order'],
            [['image'], 'file'],
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

    public function checkSendPhoneCode($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `phone_check` WHERE phone = '".$this->phone."' LIMIT 1")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } else return true;
    }

    public function checkSMSCode_($attribute, $params) {

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' LIMIT 1")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }




}
