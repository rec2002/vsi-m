<?php
namespace common\widgets;

use Yii;


class TopTypes extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        $types = Yii::$app->db->createCommand("SELECT `id`, `name`, `url_tag`, `image` FROM `dict_category` WHERE `active`= 1 AND `types` =1 AND `on_main` = 1 ORDER BY `priority` ASC")->queryAll();
        return $this->render('toptypes', ['TopTypes'=>$types]);
    }
}