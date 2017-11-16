<?php

namespace common\modules\members\models;

use Yii;

/**
 * This is the model class for table "{{%member_portfolio_images}}".
 *
 * @property integer $id
 * @property integer $portfolio_id
 * @property string $image
 * @property string $created_at
 *
 * @property MemberPorfolio $portfolio
 */
class PortfolioImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_portfolio_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id'], 'required'],
            [['portfolio_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => MemberPorfolio::className(), 'targetAttribute' => ['portfolio_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portfolio_id' => 'Portfolio ID',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(MemberPorfolio::className(), ['id' => 'portfolio_id']);
    }
}
