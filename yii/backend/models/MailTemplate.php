<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%mail_template}}".
 *
 * @property integer $id
 * @property string $subject
 * @property string $emails
 * @property string $notices
 * @property string $mail_content
 * @property string $sms_content
 * @property string $message
 */
class MailTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mail_template}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'emails', 'notices', 'mail_content', 'sms_content', 'message'], 'required'],
            [['notices', 'mail_content', 'sms_content', 'message'], 'string'],
            [['subject', 'emails'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'subject' => 'Тема листа',
            'emails' => 'Адреси отримувачів (вказувати через кому)',
            'notices' => 'Маркери',
            'mail_content' => 'Тіло листа',
            'sms_content' => 'SMS повідомлення',
            'message' => 'Повідомлення',
        ];
    }
}
