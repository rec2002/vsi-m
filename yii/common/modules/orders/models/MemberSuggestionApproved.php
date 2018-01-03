<?php

namespace common\modules\orders\models;

use Yii;

/**
 * This is the model class for table "{{%member_suggestion_approved}}".
 *
 * @property integer $id
 * @property integer $suggestion_id
 * @property double $price
 * @property string $created_at
 *
 * @property MemberSuggestion $suggestion
 */
class MemberSuggestionApproved extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_suggestion_approved}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suggestion_id', 'price'], 'required'],
            [['suggestion_id'], 'integer'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['suggestion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberSuggestion::className(), 'targetAttribute' => ['suggestion_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'suggestion_id' => 'Suggestion ID',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuggestion()
    {
        return $this->hasOne(MemberSuggestion::className(), ['id' => 'suggestion_id']);
    }
}
