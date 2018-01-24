<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_porfolio}}".
 *
 * @property integer $id
 * @property integer $member
 * @property string $title
 * @property string $description
 * @property string $cost
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Members $member0
 * @property MemberPorfolioImages[] $memberPorfolioImages
 */
class Portfolio extends \yii\db\ActiveRecord
{

    public $image = array();
    public $images_uploaded = array();

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_porfolio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'work_date', 'description'], 'required'],
            [['member'], 'integer'],
            [['description'], 'string'],
            [['image'], 'required', 'whenClient' => "function (attribute, value) {  if ($(\".tt-project-pic-loaded\").length==0)  return true; else return false;}", 'message' => 'Додати фото'],
            [['image'], 'file'],
            [['work_date', 'created_at', 'updated_at'], 'safe'],
            [['title', 'cost'], 'string', 'max' => 255],
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
            'title' => 'Назва робіт',
            'description' => 'Опис виконаниx робіт',
            'cost' => 'Вартість робіт',
            'work_date' => 'Коли проводились роботи',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember0()
    {
        return $this->hasOne(Members::className(), ['id' => 'member']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberPorfolioImages()
    {
        return $this->hasMany(MemberPorfolioImages::className(), ['portfolio_id' => 'id']);
    }
}
