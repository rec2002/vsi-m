<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_suggestion}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $order_id
 * @property integer $price_from
 * @property integer $price_to
 * @property integer $start_from
 * @property integer $start_to
 * @property integer $prepayment
 * @property integer $prepayment_material
 * @property integer $payment_object
 * @property integer $come_personally
 * @property string $dates
 * @property string $descriptions
 * @property integer $offer_is_valid
 * @property integer $valid_days
 * @property integer $valid_hours
 * @property string $created_at
 *
 * @property Members $member
 * @property Orders $order
 */
class MemberSuggestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_suggestion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'order_id', 'price_from', 'price_to', 'start_from', 'start_to', 'prepayment', 'prepayment_material', 'payment_object', 'come_personally', 'dates', 'descriptions', 'offer_is_valid', 'valid_days', 'valid_hours'], 'required'],
            [['member_id', 'order_id', 'price_from', 'price_to', 'start_from', 'start_to', 'prepayment', 'prepayment_material', 'payment_object', 'come_personally', 'offer_is_valid', 'valid_days', 'valid_hours'], 'integer'],
            [['descriptions'], 'string'],
            [['created_at'], 'safe'],
            [['dates'], 'string', 'max' => 255],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'id']],
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
            'member_id' => 'Member ID',
            'order_id' => 'Order ID',
            'price_from' => 'Price From',
            'price_to' => 'Price To',
            'start_from' => 'Start From',
            'start_to' => 'Start To',
            'prepayment' => 'Prepayment',
            'prepayment_material' => 'Prepayment Material',
            'payment_object' => 'Payment Object',
            'come_personally' => 'Come Personally',
            'dates' => 'Dates',
            'descriptions' => 'Descriptions',
            'offer_is_valid' => 'Offer Is Valid',
            'valid_days' => 'Valid Days',
            'valid_hours' => 'Valid Hours',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }



}
