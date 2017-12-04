<?

    use yii\helpers\Url;

?>

<!-- POPUP-WRAPPER -->
<div class="popup-wrapper">
    <div class="bg-layer"></div>

    <div class="popup-content" data-rel="18">
        <div class="layer-close"></div>
        <div class="popup-container size-7">
            <div class="popup-align">
                <div class="tt-order-filter">
                    <form>
                        <h4 class="h4">Види робіт</h4>
                        <div class="empty-space marg-lg-b30"></div>

                        <ul class="checkbox-list style-2">

<? if (sizeof($types)) foreach ($types as $key=>$val) { ?>
                            <li>
                                <div class="checkbox-toggle <?=(@$val['active']==1)? 'active' : '' ?>">
                                    <a href="javascript:"><?=$val['name']?></a>
                                </div>
                                <ul <?=(@$val['active']==1)? 'style="display:block;"' : '' ?> >

                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="checkbox-entry check-all">
                                                    <input type="checkbox"><span><b>Вибрати всі</b></span>
                                                </label>
<? $i=1;  $total = floor($types[$key]['count'])/3; if (sizeof($types[$key]['list'])) foreach($types[$key]['list'] as $key_=> $val_) { ?>
                                                <label class="checkbox-entry">
                                                    <input type="checkbox" name="types[]" value="<?=$val_['id'] ?>" <?=($val_['active']==1)? 'checked' : '' ?>><span><?=$val_['name'] ?></span>
                                                </label>
<? if ($total<=$i)  { ?></div><div class="col-sm-4"><? $i=1; } else  $i++; ?>

<? } ?>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </li>
<? } ?>
                        </ul>
                        <div class="empty-space marg-lg-b40"></div>
                        <div class="tt-buttons-block m10 text-right">
                            <a class="button type-1 popup-close filter-types-reset"><span>Очистити фільтр</span></a>
                            <div class="button type-1 color-3">
                                <span>Вибрати <i></i></span>
                                <input type="submit" name="filter-types">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>
</div>
