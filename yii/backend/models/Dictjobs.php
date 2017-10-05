<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%dict_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $job_unit
 * @property integer $job_markup
 * @property integer $active
 * @property integer $priority
 * @property integer $types
 * @property string $created_at
 * @property string $updated_at
 */
class Dictjobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dict_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent', 'job_unit', 'active', 'priority', 'types'], 'required'],
            [['parent', 'job_unit', 'job_markup', 'active', 'priority', 'types'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Назва',
            'parent' => 'Види робіт',
            'job_unit' => 'Тип',
            'job_markup' => 'Виділити чорним',
            'active' => 'Активне',
            'priority' => 'Пріорітет виводу',
            'types' => 'Types',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getParenTypes() {
        return $this->hasOne(\backend\models\Dictypes::className(), ['id'=>'parent'])->where(['active'=>1, 'types'=>1]);
    }

}
