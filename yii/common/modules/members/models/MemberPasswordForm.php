<?php
namespace common\modules\members\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use \common\modules\members\models\Members;

/**
 * Password reset form
 */
class MemberPasswordForm extends Model
{
    public $password;
    public $password_repeat;
    public $password_old;
    private $_member;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_repeat', 'password_old'], 'required'],
            [['password'],  'match', 'pattern' => '/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/', 'message' => 'Латинські символи і цифри.'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 6 символiв.'],
            [['password'], 'compare', 'compareAttribute' => 'password_repeat'],
            ['password_old', 'findPasswords']

        ];
    }

    public function findPasswords($attribute, $params)
    {
        $member = Members::find()->where(['id' => Yii::$app->user->identity->getId()])->one();

        if(!$member->validatePassword($this->password_old)){
            $this->addError($attribute, 'Старий пароль не вірний');
            return false;
        } else return true;
    }

    public function attributeLabels()
    {
        return [
            'password'=>'Пароль',
            'password_repeat'=>'Повторити пароль',
            'password_old'=>'Старий пароль'
        ];
    }

}
