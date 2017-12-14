<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%members}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property string $first_name
 * @property string $last_name
 * @property string $surname
 * @property string $phone
 * @property string $avatar_image
 * @property string $place
 * @property integer $forma
 * @property integer $brygada
 * @property string $company
 * @property string $about
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MemberRegions[] $memberRegions
 * @property MemberTypes[] $memberTypes
 * @property NoticesMembers[] $noticesMembers
 * @property Orders[] $orders
 */
class MemberEdit extends \yii\db\ActiveRecord
{


    public $types = array();
    public $prices = array();
    public $busy;
    public $regions;
    public $confirm_sms;
    public $documents = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%members}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['forma', 'brygada'], 'integer'],
            [['about'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'password', 'password_reset_token', 'first_name', 'last_name', 'surname', 'phone', 'avatar_image', 'place', 'company', 'busy_to'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['types'], 'required',  'message' => 'Прошу вибрати хоча б вид робіт.', 'on' => 'types'],
            [['prices'], 'required', 'on' => 'prices'],
            [['last_name'], 'required', 'on' =>'last_name'],
            [['first_name'], 'required', 'on' =>'first_name'],
            [['first_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'first_name'],
            [['last_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'last_name'],
            [['surname'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'surname'],
            [['surname'], 'required', 'on' =>'surname'],
        //
            [['documents'], 'required', 'on' =>'documents'],
        //
            ['phone', 'checkChangedPhoneCode', 'message'=>'Підтвердіть контактний телефон через SMS.', 'on' => 'phone'],
            [['phone'], 'required', 'on' =>'phone'],
            ['confirm_sms', 'required', 'whenClient' => "function (attribute, value) { if ($('input#memberedit-phone').val() != $('input#memberedit-phone').data('value')) return true; else return false;}", 'message'=>'Введіть код отриманий з SMS.', 'on' => 'phone'],
            ['confirm_sms', 'checkSMSCode',  'on' => 'phone'],
          //  ['confirm_sms', 'checkSMSCodeRequired',  'on' => 'phone'],

            [['busy_to'], 'required', 'whenClient' => "function (attribute, value) {  return $('#memberedit-busy').val() == 1 }", 'message' => 'Прошу вказати дату до якої будете зайняті', 'on' => 'busy_to'],

            ['email', 'email', 'skipOnEmpty' => false, 'on' => 'email'],
            ['email', 'checkMyUniqunessEmail', 'on' => 'email'],
            [['place'], 'required', 'on' =>'place'],
            [['region'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Адресу не визначено. Прошу вибрати адресу зі списку', 'on' => 'place'],
            [['about'], 'string', 'max' => 801, 'on' =>'about'],
            [['regions'], 'required', 'message' => 'Прошу вказати області, де виїзд на об`єкти для Вас можливий ', 'skipOnEmpty' => false, 'on' => 'regions'],
            [['forma'], 'required', 'on' => 'forma'],
            [['brygada'], 'filter', 'filter' => 'trim', 'skipOnArray' => true, 'on' => 'forma'],
            [['company'], 'required', 'when' => function ($model) { return ($model->forma==3); }, 'whenClient' => "function (attribute, value) { return ($('#memberedit-forma').val() == '3'); }", 'on' => 'forma'],
            [['budget_min'], 'integer', 'on' => 'budget_min'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email'=>'Email',
            'first_name' => 'Iм’я',
            'last_name' => 'Прізвище',
            'surname' => 'По батькові',
            'phone'=>'Контактний телефон',
            'avatar_image' => 'Avatar Image',
            'place' => 'Введіть місце знаходження',
            'forma' => 'Форма роботи із замовниками',
            'brygada'=> 'Бригада',
            'company'=>'Назва компанії',
            'about' => 'Про себе',
            'regions' => 'Область',
            'budget_min' => 'Мінімальна вартість замовлення',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberRegions()
    {
        return $this->hasMany(MemberRegions::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberTypes()
    {
        return $this->hasMany(MemberTypes::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticesMembers()
    {
        return $this->hasMany(NoticesMembers::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['member' => 'id']);
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
/*
    public function checkSendPhoneCode($attribute, $params) {
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM  `phone_check` WHERE phone = '".$this->phone."'  ORDER BY id DESC LIMIT 1 ")->queryScalar();
        if($this->phone!=Yii::$app->user->identity->phone && $count==0) {
            $this->addError($attribute, 'Підтвердіть контактний телефон через SMS.');
            return false;
        } return true;
    }
*/
    public function checkSMSCode($attribute, $params) {

        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `phone_check` WHERE code = '".trim($this->confirm_sms)."' AND phone = '".$this->phone."' ORDER BY id DESC LIMIT 1 ")->queryScalar();
        if($count==0) {
            $this->addError($attribute, 'Код з SMS невірний.');
            return false;
        } else return true;
    }
/*
    public function checkSMSCodeRequired($attribute, $params) {

        if(empty($this->confirm_sms) && $this->phone!=Yii::$app->user->identity->phone) {
            $this->addError($attribute, 'Введіть код з SMS.');
            return false;
        } else return true;
    }
*/
}
