<?php

namespace common\modules\members\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%order_images}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $image
 * @property string $created_at
 *
 * @property Orders $order
 */
class OrderImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'image'], 'required'],
            [['order_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'file', 'skipOnEmpty' => false],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
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
            'image' => 'Image',
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
}
