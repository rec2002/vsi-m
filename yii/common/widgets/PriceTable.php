<?php
namespace common\widgets;

use Yii;


class PriceTable extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $items = Yii::$app->db->createCommand("SELECT `id`,	`name`, `budget_to`, `price` FROM `dict_price_range` ORDER BY `id` ASC")->queryAll();
        return $this->render('pricetable', ['PriceTable'=>$items]);
    }
}