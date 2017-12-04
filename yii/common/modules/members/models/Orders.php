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

    public $agree = false;
    public $image = array();
    public $types = array();
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
            [['title', 'descriptions', 'location', 'budget', 'when_start'], 'required', 'on' => 'add-order'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'add-order'],
            [['date_from', 'date_to'], 'required', 'skipOnEmpty' => false, 'when' => function ($model) { if ($model->when_start==1) return true; else return false;}, 'whenClient' => "function (attribute, value) { if ($('#customerregistration-when_start').val() == '1') return true; else return false; }", 'message' => 'Обов\'язкове для заповнення', 'on' => 'add-order'],
            [['image'], 'file', 'on' => 'add-order'],
            [['region'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Адресу не визначено. Прошу вибрати адресу зі списку', 'on' => 'add-order'],
            ['agree', 'required', 'requiredValue' => 1, 'message' => 'Прочитати `правила користування`.', 'on' => 'add-order'],
            [['location'], 'required', 'on' => 'location'],
            [['region'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number', 'message' => 'Адресу не визначено. Прошу вибрати адресу зі списку', 'on' => 'location'],
            [['title'], 'required', 'on' => 'title'],
            [['budget'], 'required', 'on' => 'budget'],
            [['when_start'], 'required', 'on' => 'when_start'],
            [['date_from', 'date_to'], 'required', 'skipOnEmpty' => false, 'when' => function ($model) { if ($model->when_start==1) return true; else return false;}, 'whenClient' => "function (attribute, value) { if ($('#orders-when_start').val() == '1') return true; else return false; }", 'message' => 'Обов\'язкове для заповнення', 'on' => 'when_start'],
            [['descriptions'], 'required', 'on' => 'descriptions'],
/*
            [['member', 'title', 'descriptions', 'location', 'when_start', 'date_from', 'date_to'], 'required'],
            [['member', 'when_start'], 'integer'],
            [['descriptions'], 'string'],
            [['date_from', 'date_to', 'created_at', 'updated_at'], 'safe'],
            [['title', 'location'], 'string', 'max' => 255],
            */
            [['member'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'location' => 'Введіть місце знаходження',
            'title' => 'Заголовок',
            'descriptions'=>'Опис завдання',
            'location'=>'Місце розташування',
            'when_start'=>'Коли потрібно починати',
            'date_from'=>'Виберіть дату `з`',
            'date_to'=>'Виберіть дату `до`',
            'reason_for_refusal'=>'Причина відмови',
            'types'=>'Види робіт',


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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTypes()
    {
        return $this->hasMany(OrderTypes::className(), ['order_id' => 'id']);
    }

}
