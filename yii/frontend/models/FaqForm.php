<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FaqForm extends Model
{
    public $name;
    public $email;
    public $message;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'message'], 'required'],
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
            'name'=> 'Ваше ім’я',
            'email' => 'Email',
            'message' => 'Яке ваше питання?'
        ];
    }

}
