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
            [['first_name', 'email', 'phone'], 'required'],
            [['first_name', 'last_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.'],

            ['email', 'email'],
            ['email', 'checkMyUniqunessEmail'],
            /*['phone', 'checkSendPhoneCode'],*/
            [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/', 'message' => 'Невірний номер мобільного телефону.'],
            ['phone', 'checkChangedPhoneCode'],
            ['confirm_sms', 'checkSMSCode', 'skipOnEmpty' => true],
            ['confirm_sms', 'checkSMSCodeRequired', 'skipOnEmpty' => false],
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

        if($this->phone!=Yii::$app->user->identity->phone && empty($this->confirm_sms)) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } else return true;
    }

    public function checkSendPhoneCode($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `phone_check` WHERE phone = '".$this->phone."'  ORDER BY id DESC LIMIT 1 ")->queryScalar();
        if($this->phone!=Yii::$app->user->identity->phone && $count==0) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } return true;
    }

    public function checkSMSCode($attribute, $params) {

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' AND phone = '".$this->phone."' ORDER BY id DESC LIMIT 1 ")->queryScalar();
        if($count==0 && !empty($this->confirm_sms)) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }

    public function checkSMSCodeRequired($attribute, $params) {

        if(empty($this->confirm_sms) && $this->phone!=Yii::$app->user->identity->phone) {
            $this->addError($attribute, 'Введіть код з SMS.');
            return false;
        } else return true;
    }


}
