<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $id
 * @property integer $member
 * @property string $title
 * @property string $descriptions
 * @property string $location
 * @property integer $when_start
 * @property string $date_from
 * @property string $date_to
 * @property string $created_at
 * @property string $updated_at
 *
 * @property OrderImages[] $orderImages
 * @property Members $member0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member', 'title', 'descriptions', 'location', 'when_start', 'date_from', 'date_to'], 'required'],
            [['member', 'when_start'], 'integer'],
            [['descriptions'], 'string'],
            [['date_from', 'date_to', 'created_at', 'updated_at'], 'safe'],
            [['title', 'location'], 'string', 'max' => 255],
            [['member'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member' => 'Member',
            'title' => 'Title',
            'descriptions' => 'Descriptions',
            'location' => 'Location',
            'when_start' => 'When Start',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderImages()
    {
        return $this->hasMany(OrderImages::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember0()
    {
        return $this->hasOne(Members::className(), ['id' => 'member']);
    }
}
