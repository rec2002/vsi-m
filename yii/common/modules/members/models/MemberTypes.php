<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_types}}".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $member
 * @property string $create_at
 *
 * @property Members $member0
 */
class MemberTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'member'], 'required'],
            [['type', 'member'], 'integer'],
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
            'type' => 'ID виду робіт',
            'member' => 'ID користувача',
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
