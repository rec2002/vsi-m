<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_response_images}}".
 *
 * @property int $id
 * @property int $response_id
 * @property string $image
 * @property string $created_at
 *
 * @property MemberResponse $response
 */
class MemberResponseImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_response_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['response_id', 'image'], 'required'],
            [['response_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['response_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberResponse::className(), 'targetAttribute' => ['response_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'response_id' => 'Response ID',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponse()
    {
        return $this->hasOne(MemberResponse::className(), ['response_id' => 'id']);
    }
}
