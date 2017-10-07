<?php
namespace common\widgets;

use Yii;


class Categories extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        $items = Yii::$app->db->createCommand("SELECT t.id, t.name, t.url_tag, t.parent, c.name as parent_name FROM `dict_category` t 
                                                    LEFT JOIN `dict_category` c ON t.parent=c.id AND c.types = 0 
                                                    WHERE t.active= 1 AND t.types = 1 
                                                    ORDER BY c.priority, t.priority ASC")->queryAll();

        return $this->render('categories', ['Categories'=>$items]);
    }
}