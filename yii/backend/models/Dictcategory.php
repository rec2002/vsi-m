<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%dict_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $url_tag
 * @property integer $parent
 * @property integer $active
 * @property integer $priority
 * @property string $created_at
 * @property string $updated_at
 */
class Dictcategory extends \yii\db\ActiveRecord
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

            [['name', 'url_tag'], 'trim'],
            [['name', 'url_tag', 'priority'], 'required'],
            [['priority'], 'number'],
            [['parent', 'active', 'priority'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'url_tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Назва категорії',
            'url_tag' => 'URL тег',
            'parent' => 'Категорія',
            'active' => 'Активне',
            'priority' => 'Пріорітет виводу',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
