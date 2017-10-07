<?

    $arr = $groups = array();
    if (sizeof($FaqItems)) foreach ($FaqItems as $val){
        $groups[$val['parent']] = $val['group_name'];
        $arr[$val['parent']][] = array('id'=>$val['id'], 'question'=>$val['question'], 'answer'=>$val['answer']);
    }

?>

<div class="accordeon">
<? if (sizeof($groups)) foreach ($groups as $key=>$val) if (sizeof($arr[$key])) { ?>
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

<? } ?>
</div>