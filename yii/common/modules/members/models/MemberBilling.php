<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "member_billing".
 *
 * @property integer $id
 * @property integer $member_id
 * @property double $summa
 * @property integer $budget
 * @property integer $payment_type
 * @property string $created_at
 *
 * @property Members $member
 */
class MemberBilling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_billing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summa', 'budget', 'payment_type'], 'required'],
            [['member_id', 'budget', 'payment_type'], 'integer'],
            [['summa'], 'number'],
            [['created_at'], 'safe'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'id']],
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
            'summa' => 'Summa',
            'budget' => 'Budget',
            'payment_type' => 'Payment Type',
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
}
