<?php
namespace common\widgets;

use Yii;
use \backend\models\DictRegions;
use yii\data\ActiveDataProvider;



class RegionList extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $dataProvider = new ActiveDataProvider([
            'query' => DictRegions::find(),
            'pagination' => [
                'pageSize' => 100,
            ]
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_ASC]
        ]);


        return $this->render('regionlist', [
            'dataProvider' => $dataProvider->getModels(),
            'dataTotal' => $dataProvider->getTotalCount()
        ]);


    }

}