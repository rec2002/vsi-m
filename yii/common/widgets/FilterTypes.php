<?php
namespace common\widgets;

use Yii;
use yii\helpers\ArrayHelper;

class FilterTypes extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();
        $types_data =  @explode(',', $_SESSION['filter'][':types']);

        if (sizeof($types)) {
            $types_arr = array();

            foreach ($types as $key=>$val) {

                if ($key==0 ) { $types_arr[$val['parent']] = array('name'=> $val['parent_name']); $i=1; }
                elseif($types[$key-1]['parent']!=$val['parent']) { $types_arr[$val['parent']] = array('name'=>  $val['parent_name']); $i=1; }

                $types_arr[$val['parent']]['count'] = $i++;

                if ((in_array($val['id'], $types_data)) && @$types_arr[$val['parent']]['active'] != 1) $types_arr[$val['parent']]['active'] = 1;
                $types_arr[$val['parent']]['list'][] = array('id'=>$val['id'], 'name'=>$val['name'], 'active'=>((in_array($val['id'], $types_data)) ? 1 : 0));
            }
        }

        return $this->render('filtertypes', ['types'=>$types_arr]);
    }
}