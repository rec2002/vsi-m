<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%faq_items}}".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $parent
 * @property integer $priority
 * @property integer $active
 */
class FaqItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq_items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'parent', 'priority', 'active'], 'required'],
            [['answer'], 'string'],
            [['parent', 'priority', 'active'], 'integer'],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'question' => 'Питання',
            'answer' => 'Відповідь',
            'parent' => 'Група',
            'priority' => 'Пріорітет виводу',
            'active' => 'Статус',
        ];
    }

    public function getParentCat() {
        return $this->hasOne(\backend\models\FaqGroups::className(), ['id'=>'parent'])->where(['active'=>1]);
    }
}
