<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%members}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property string $first_name
 * @property string $last_name
 * @property string $surname
 * @property string $phone
 * @property string $avatar_image
 * @property string $place
 * @property integer $forma
 * @property integer $brygada
 * @property string $company
 * @property string $about
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MemberRegions[] $memberRegions
 * @property MemberTypes[] $memberTypes
 * @property NoticesMembers[] $noticesMembers
 * @property Orders[] $orders
 */
class MemberEdit extends \yii\db\ActiveRecord
{


    public $types = array();
    public $prices = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%members}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
      /*      [['email', 'auth_key', 'password', 'password_reset_token', 'first_name', 'last_name', 'surname', 'phone', 'place', 'forma', 'brygada', 'company', 'about'], 'required'],*/
            [['forma', 'brygada'], 'integer'],
            [['about'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'password', 'password_reset_token', 'first_name', 'last_name', 'surname', 'phone', 'avatar_image', 'place', 'company'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['types'], 'required',  'message' => 'Прошу вибрати хоча б вид робіт.', 'on' => 'types'],
            [['prices'], 'required', 'on' => 'prices'],
            [['last_name'], 'required', 'on' =>'last_name'],
            [['first_name'], 'required', 'on' =>'first_name'],
            [['first_name'], 'string', 'min' => 3, 'tooShort' => 'Значення "{attribute}" повинно містити мінімум 3 символa.', 'on' => 'first_name'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email'=>'Email',
            'first_name' => 'Iм’я',
            'last_name' => 'Прізвище',
            'surname' => 'По батькові',
            'phone'=>'Контактний телефон',
            'avatar_image' => 'Avatar Image',
            'place' => 'Place',
            'forma' => 'Forma',
            'brygada' => 'Brygada',
            'company' => 'Company',
            'about' => 'About',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberRegions()
    {
        return $this->hasMany(MemberRegions::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberTypes()
    {
        return $this->hasMany(MemberTypes::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticesMembers()
    {
        return $this->hasMany(NoticesMembers::className(), ['member' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['member' => 'id']);
    }


}
