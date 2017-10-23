<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%phone_check}}".
 *
 * @property integer $id
 * @property string $phone
 * @property string $code
 * @property string $create_at
 */
class PhoneCheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%phone_check}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'code'], 'required'],
            [['create_at'], 'safe'],
            [['phone'], 'string', 'max' => 30],
            [['phone'],  'match', 'pattern' => '/([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/'],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'code' => 'Code',
            'create_at' => 'Create At',
        ];
    }
}
