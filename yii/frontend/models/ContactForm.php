<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $phone;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['phone'], 'string'],
            [['name', 'email', 'subject', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Контактний телефон',
            'name'=> 'Ваше ім’я',
            'email' => 'Email',
            'subject' => 'Тема повідомлення',
            'message' => 'Повідомлення'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    /*
    public function sendEmail($email)
    {

        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->message)
            ->send();



    }

    */
}
