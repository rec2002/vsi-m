<?

use yii\helpers\Url;

$j=$i=1; $arr = array();

$column = array(1=>5, 2=>4, 3=>4, 4=>4, 5=>4, 6=>4);

if (sizeof($dataTotal)) foreach ($dataProvider as $val){
    $arr[$j][$i]=array('id'=>$val->id, 'name'=>$val->name_short, 'url_tag'=>$val->url_tag);
    if ($i==$column[$j]) { $j++; $i=1;} else $i++;
}
?>


<div class="tt-bg-grey">
    <div class="container">

        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        <h3 class="h3 text-center cities_title">Знайдіть майстра у своєму регіоні
            <div class="empty-space marg-sm-b20 marg-lg-b20"></div>
        </h3>

        <div class="city-list tt-widget">

            <div class="tt-widget-title tt-widget-dropdown h5" style="margin-top: 0px;">
                Знайдіть майстра у своєму регіоні
            </div>
            <div class="tt-toggle-list tt-widget-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (sizeof($arr[1])) foreach ($arr[1] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>
                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (sizeof($arr[2])) foreach ($arr[2] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>
                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (sizeof($arr[3])) foreach ($arr[3] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>
                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (sizeof($arr[4])) foreach ($arr[4] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>
                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (sizeof($arr[5])) foreach ($arr[5] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>

                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <ul class="simple-list city">
                            <? if (@sizeof($arr[6])) foreach ($arr[6] as $val) { ?>
                                <li>
                                    <a href="<?= Url::to(['professionals/', 'region' => $val['url_tag']]) ?>"><?= $val['name'] ?></a>
                                </li>
                            <? } ?>
                        </ul>
                        <div class="empty-space marg-sm-b15"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
    </div>
</div>



