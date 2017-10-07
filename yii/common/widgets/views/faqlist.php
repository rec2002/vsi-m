<?

$arr = $groups = array();

if (sizeof($FaqItems)) foreach ($FaqItems as $val){
    $groups[$val['parent']] = $val['group_name'];
    $arr[$val['parent']][] = array('id'=>$val['id'], 'question'=>$val['question'], 'answer'=>$val['answer']);
}


?>

<div class="tabs-block style-3">
    <div class="tab-nav">
<? $start = 0; if (sizeof($groups)) foreach ($groups as $key=>$val) if (sizeof($arr[$key])) { ?>
        <div class="tab-menu <?=($start==0) ? 'active' : ''?>"><span><?=$val?></span></div>
<? $start = 1; } ?>
    </div>


<? $start = 0; if (sizeof($groups)) foreach ($groups as $key=>$val) if (sizeof($arr[$key])) { ?>
    <div class="tab-entry" <?=($start==0) ? 'style="display: block;"' : ''?> >
        <div class="accordeon">

<? foreach ($arr[$key] as $key1=>$item) { ?>
            <div class="accordeon-title <?=($key1==0) ? 'active' : ''?>">
                <div class="accordeon-icon"></div><?=$item['question']?>
            </div>

            <div class="accordeon-toggle" <?=($key1==0) ? 'style="display: block;"' : ''?> >
                <div class="simple-text size-3">
                    <?=$item['answer']?>
                </div>
            </div>
<? } ?>

        </div>
    </div>
<? $start = 1; } ?>

</div>