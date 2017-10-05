<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%dict_price_range}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $budget_to
 * @property integer $price
 */
class Dictpricerange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dict_price_range}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'budget_to', 'price'], 'required'],
            [['budget_to', 'price'], 'integer'],
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
            'budget_to' => 'Бюджет, до (грн.) ',
            'price' => 'Сума момовнення (грн.)',
        ];
    }
}
