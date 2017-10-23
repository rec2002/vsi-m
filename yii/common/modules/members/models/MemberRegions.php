<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MemberRegions extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%member_regions}}';
    }

    public function rules()
    {
        return [
            [['region', 'member'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'region' => 'ID області',
            'member' => 'ID користувача',
        ];
    }
}
