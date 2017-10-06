<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%dict_regions}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_short
 */
class DictRegions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dict_regions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_short'], 'required'],
            [['name', 'name_short'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_short' => 'Name Short',
        ];
    }
}
