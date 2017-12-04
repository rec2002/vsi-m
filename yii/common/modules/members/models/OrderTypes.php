<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%order_types}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $type
 * @property string $created_at
 *
 * @property Orders $order
 * @property DictCategory $type0
 */
class OrderTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'type'], 'required'],
            [['order_id', 'type'], 'integer'],
            [['created_at'], 'safe'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => DictCategory::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(DictCategory::className(), ['id' => 'type']);
    }
}
