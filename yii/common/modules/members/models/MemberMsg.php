<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_msg}}".
 *
 * @property int $id
 * @property int $suggestion_id
 * @property int $who_id
 * @property int $whom_id
 * @property string $msg
 * @property int $system
 * @property int $unread
 * @property string $created_at
 *
 * @property MemberSuggestion $suggestion
 * @property Members $who
 * @property Members $whom
 */
class MemberMsg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_msg}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suggestion_id', 'msg'], 'required'],
            [['suggestion_id', 'who_id', 'whom_id'], 'integer'],
            [['msg'], 'string'],
            [['created_at'], 'safe'],
            [['suggestion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberSuggestion::className(), 'targetAttribute' => ['suggestion_id' => 'id']],
            [['who_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['who_id' => 'id']],
            [['whom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['whom_id' => 'id']],
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
            'who_id' => 'Who ID',
            'whom_id' => 'Whom ID',
            'msg' => 'Msg',
            'system' => 'System',
            'unread' => 'Unread',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWho()
    {
        return $this->hasOne(Members::className(), ['id' => 'who_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWhom()
    {
        return $this->hasOne(Members::className(), ['id' => 'whom_id']);
    }
}
