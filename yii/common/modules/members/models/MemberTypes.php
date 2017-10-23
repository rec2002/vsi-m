<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MemberTypes extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%member_types}}';
    }

    public function rules()
    {
        return [
            [['type', 'member'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'type' => 'ID виду робіт',
            'member' => 'ID користувача',
        ];
    }
}
