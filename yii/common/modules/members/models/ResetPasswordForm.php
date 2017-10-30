<?php
namespace common\modules\members\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use \common\modules\members\models\Members;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $password_repeat;
    private $_member;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {

        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('`token` - не може бути пустим.');
        }
        $this->_member = Members::findByPasswordResetToken($token);
        if (!$this->_member) {
            throw new InvalidParamException('Невірно вказаний `token`.');
        }


        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_repeat'], 'required'],
            [['password'],  'match', 'pattern' => '/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/', 'message' => 'Латинські символи і цифри.'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 6 символiв.'],
            [['password'], 'compare', 'compareAttribute' => 'password_repeat']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password'=>'Пароль',
            'password_repeat'=>'Повторити пароль'
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $member = $this->_member;
        $member->setPassword($this->password);
        $member->removePasswordResetToken();
        return $member->save(false);
    }
}
