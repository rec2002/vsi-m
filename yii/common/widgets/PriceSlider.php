<?php
namespace common\widgets;

use Yii;


class PriceSlider extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $items = Yii::$app->db->createCommand("SELECT `id`,	`name`, `budget_to`, `price` FROM `dict_price_range` ORDER BY `id` ASC")->queryAll();
        return $this->render('priceslider', ['PriceTable'=>$items]);
    }
}