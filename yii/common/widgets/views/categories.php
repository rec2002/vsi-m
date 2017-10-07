<?

use yii\helpers\Url;

    $arr = $arr_temp = $groups = array();

    if (sizeof($Categories)) foreach ($Categories as $val){
        $groups[$val['parent']] = $val['parent_name'];
        $arr_temp[$val['parent']][] = array('id'=>$val['id'], 'name'=>$val['name'], 'url_tag'=>$val['url_tag']);
    }

    if (sizeof($arr_temp)) foreach ($arr_temp as $key=>$val){
        $j = 1;
        foreach ($val as $key1=>$val1){
            $arr[$key][$j][] = array('id'=>$val1['id'], 'name'=>$val1['name'], 'url_tag'=>$val1['url_tag']);
            if ($j==4) $j=1; else $j++;
        }
    }

?>


<div class="container">
    <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
    <h3 class="h3 text-center">Всі майстри</h3>
    <div class="empty-space marg-sm-b40 marg-lg-b60"></div>

<?  if (sizeof($groups)) foreach ($groups as $key=>$val) if (sizeof($arr[$key])) { ?>
    <h5 class="h5"><?=$val?>:</h5>
    <div class="empty-space marg-lg-b25"></div>
    <div class="row">
        <div class="col-sm-3">
            <ul class="simple-list">
                <? if (sizeof($arr[$key][1])) foreach($arr[$key][1] as $val) { ?>
                    <li><a href="<?=Url::to(['site/category'])?>"><?=$val['name']?></a></li>
                <? } ?>
            </ul>
            <div class="empty-space marg-sm-b10"></div>
        </div>
        <div class="col-sm-3">
            <ul class="simple-list">
                <? if (sizeof($arr[$key][2])) foreach($arr[$key][2] as $val) { ?>
                    <li><a href="<?=Url::to(['site/category'])?>"><?=$val['name']?></a></li>
                <? } ?>
            </ul>
            <div class="empty-space marg-sm-b10"></div>
        </div>
        <div class="col-sm-3">
            <ul class="simple-list">
                <? if (sizeof($arr[$key][3])) foreach($arr[$key][3] as $val) { ?>
                    <li><a href="<?=Url::to(['site/category'])?>"><?=$val['name']?></a></li>
                <? } ?>
            </ul>
            <div class="empty-space marg-sm-b10"></div>
        </div>
        <div class="col-sm-3">
            <ul class="simple-list">
                <? if (sizeof($arr[$key][4])) foreach($arr[$key][4] as $val) { ?>
                    <li><a href="<?=Url::to(['site/category'])?>"><?=$val['name']?></a></li>
                <? } ?>
            </ul>
        </div>
    </div>
    <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
<? } ?>




    <div class="empty-space marg-laptop-b15"></div>
    <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
</div>

