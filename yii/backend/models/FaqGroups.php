<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%faq_groups}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $priority
 * @property integer $active
 */
class FaqGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'priority', 'active'], 'required'],
            [['priority', 'active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Назва',
            'priority' => 'Пріорітет виводу',
            'active' => 'Статус',
        ];
    }
}
