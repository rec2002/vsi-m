<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;

use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * ContactForm is the model behind the contact form.
 */
class Members extends ActiveRecord implements IdentityInterface
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

    public $types = array();

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


            [['approved'], 'safe'],
            [['types'], 'required',  'message' => 'Необхідно вибрати мінімум один пункт.', 'on' => 'types'],
     //       [['types'], 'exist', 'skipOnError' => true, 'targetClass' => MemberTypes::className(), 'targetAttribute' => ['member' => 'id']],

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
            'approved'=>'Перевірка документів'

        ];
    }
/*
    // relation with MemberTypes

    public function getMemberTypes()
    {
        return $this->hasMany(MemberTypes::className(), ['member' => 'id']);
    }
*/

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }





}
