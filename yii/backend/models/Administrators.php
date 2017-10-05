<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Administrators extends \yii\db\ActiveRecord
{

    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'first_name', 'created_at', 'updated_at'], 'required'],
            [['username', 'auth_key', 'password_hash', 'email', 'first_name', 'created_at', 'updated_at',  'password'], 'required', 'on' => 'create'],
            [['status', 'created_at', 'updated_at', 'role'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'password', 'password_repeat'], 'string', 'max' => 255],
            ['email', 'email'],
            ['password',  'match', 'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat'],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'first_name'=> 'Ім\'я адміністратора',
            'username' => 'Логін',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'password'=>'Пароль',
            'password_repeat'=>'Повторити пароль',
            'role' => 'Роль',
            'status' => 'Статус',
            'created_at' => 'Дата-Час створення',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


}
