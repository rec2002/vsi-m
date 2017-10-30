<?php
namespace common\modules\members\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\modules\members\models\Members',
                'message' => 'Користувач з таким емейлом не зареєстрований.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {

        $member = Members::findOne([
            'email' => $this->email,
        ]);

        if (!$member) {
            return false;
        }

        if (!Members::isPasswordResetTokenValid($member->password_reset_token)) {
            $member->generatePasswordResetToken();
            if (!$member->save(false)) {
                return false;
            }
        }

        $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/members/login/resetpassword', 'token' => $member->password_reset_token]);
        $resetLink = Html::a(Html::encode($resetLink), $resetLink);
        \common\components\MemberHelper::GetMailTemplate(5, array_merge($member->attributes, array('url'=>$resetLink)), $member->email);
        return true;
    }
}
