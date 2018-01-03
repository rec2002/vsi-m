<?

use common\components\MemberHelper;

?>
<?
if (sizeof($member->prices)) $data = $member->prices; else $data = array();
$price_types = MemberHelper::PRICE_TYPE;



if (sizeof($member->types))
    $prices = Yii::$app->db->createCommand("SELECT d.id, d.name, d1.name as parent_name, d.parent, d.job_unit, d.job_markup  FROM dict_category d LEFT JOIN dict_category d1 ON d1.id=d.parent AND d1.types=1 WHERE d.active=1 AND d.types=2 AND d.parent IN (".implode(',', $member->types).") ORDER BY d1.priority ASC, d1.parent ASC, d.priority ASC  ")->queryAll();
else $prices = array();

$total = sizeof($prices);
if (sizeof($prices)) foreach ($prices as $key=>$val) if (@$data[$val['id']]['price']>0) {
    ?>
    <?
    if ($key==0) {
        echo '<div class="simple-text size-3 bold-title  bold-style-2"><p><b>'.$val['parent_name'].'</b></p></div><div class="empty-space marg-xs-b15 marg-lg-b15"></div>';
    } elseif ($prices[$key-1]['parent']!=$prices[$key]['parent']) {
        echo '<div class="simple-text size-3 bold-title  bold-style-2"><p><b>'.$val['parent_name'].'</b></p></div><div class="empty-space marg-xs-b15 marg-lg-b15"></div>';
    }
    ?>


    <div class="list-dotted-item">
        <div class="list-dotted-left"><span><?=($val['job_markup']==1) ? '<b>'.$val['name'].'</b>' : $val['name'] ?></span></div>
        <div class="list-dotted-right"><span>від <?=@$data[$val['id']]['price']?> <?=$price_types[$val['job_unit']]?></span></div>
    </div>
    <?
    if (($key+1)==$total) {
        echo '<div class="empty-space marg-lg-b30"></div>';
    } elseif ($prices[$key+1]['parent']!=$prices[$key]['parent']) {
        echo '<div class="empty-space marg-lg-b30"></div>';
    } else {
        echo '<div class="empty-space marg-lg-b10"></div>';
    }
    ?>
<?  } ?>