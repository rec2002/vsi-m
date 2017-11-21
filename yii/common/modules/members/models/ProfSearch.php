<?php

namespace common\modules\members\models;

use Yii;
use yii\base\Model;



class ProfSearch extends Model
{
    public $region;
    public $type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region', 'types'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region' => 'Регіон',
            'types' => 'Категорія',
        ];
    }





}
