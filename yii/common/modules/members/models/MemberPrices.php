<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_prices}}".
 *
 * @property integer $id
 * @property integer $member
 * @property integer $price_id
 * @property double $price
 * @property string $create_at
 *
 * @property Members $member0
 */
class MemberPrices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_prices}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member', 'price_id', 'price'], 'required'],
            [['member', 'price_id'], 'integer'],
            [['price'], 'number'],
            [['create_at'], 'safe'],
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
            'price_id' => 'Price ID',
            'price' => 'Price',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember0()
    {
        return $this->hasOne(Members::className(), ['id' => 'member']);
    }
}
