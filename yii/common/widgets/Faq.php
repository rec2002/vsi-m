<?php
namespace common\widgets;

use Yii;


class Faq extends \yii\bootstrap\Widget
{

    public $id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $items = Yii::$app->db->createCommand("SELECT f.id, f.question, f.answer, f.parent, g.name as group_name FROM `faq_items` f 
                                                    LEFT JOIN `faq_groups` g ON f.parent=g.id 
                                                    WHERE f.active = 1 AND g.active=1 ".(($this->id>0) ? " AND f.parent='".$this->id."'" : "")." ORDER BY g.priority, f.priority ASC")->queryAll();

        return $this->render((($this->id>0) ? 'faqone' : 'faqlist'), ['FaqItems'=>$items]);
    }
}