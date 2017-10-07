<?

use yii\helpers\Url;

$j=1; $arr = array();

if (sizeof($dataTotal)) foreach ($dataProvider as $val){
    $arr[$j][]=array('id'=>$val->id, 'name'=>$val->name_short);
    if ($j==6) $j=1; else $j++;
}



?>


<div class="tt-bg-grey">
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        <h3 class="h3 text-center">Знайдіть майстра у своєму регіоні</h3>
        <div class="empty-space marg-lg-b30"></div>
        <div class="empty-space marg-sm-b40 marg-lg-b50"></div>

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[1])) foreach($arr[1] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[2])) foreach($arr[2] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[3])) foreach($arr[3] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>

                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[4])) foreach($arr[4] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>

                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[5])) foreach($arr[5] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>

                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <? if (sizeof($arr[6])) foreach($arr[6] as $val) { ?>
                        <li><a href="<?=Url::to(['site/index'])?>"><?=$val['name']?></a></li>
                    <? } ?>

                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
        </div>


        <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
    </div>
</div>



