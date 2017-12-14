<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_documents}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $file
 * @property string $create_at
 *
 * @property Members $member
 */
class MemberDocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_documents}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'name', 'file', 'create_at'], 'required'],
            [['member_id'], 'integer'],
            [['create_at'], 'safe'],
            [['name', 'file'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'file' => 'File',
            'create_at' => 'Create At',
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
