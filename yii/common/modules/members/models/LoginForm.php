<?php
namespace common\modules\members\models;

use Yii;
use yii\base\Model;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_member;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required',  'message' => '"{attribute}" обов\'язкове поле'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            [['email'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'rememberMe' => Yii::t('app', 'Запам\'ятати мене')
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getMember();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильний пароль або логін');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getMember(), $this->rememberMe ? 3600 * 24 * 30 * 6 : 0);
        } else {
            return false;
        }
    }

    protected function getMember()
    {
        if ($this->_member === null) {
            $this->_member = \common\modules\members\models\Members::findByUsername($this->email);
        }

        return $this->_member;
    }
}
