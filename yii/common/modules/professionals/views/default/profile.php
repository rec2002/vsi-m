<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use kartik\select2\Select2;
use common\components\MemberHelper;

$this->title = 'Сторінка майстра';


?>
    <div class="tt-header-margin"></div>

    <?  $regions = Yii::$app->db->createCommand("SELECT id, name, name_short, url_tag  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();?>

    <!-- TT-HEADING -->
    <div class="tt-heading background-block" style="background-image:url(/img/bg/bg_3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <ul class="tt-breadcrumbs">
                        <li><a href="/">Головна</a></li>
                        <li><a href="<?=Url::toRoute(['/site/category'])?>">Каталог майстрів</a></li>
                        <? if ($member->region > 0) foreach ($regions as $val) if ($val['id']==$member->region) { ?><li><a href="<?=Url::to(['/professionals', 'region'=>$val['url_tag']])?>"><?=$val['name']?></a></li><? } ?>
                        <li><span><?=(!empty($member->company)) ? $member->company : $member->first_name.' '.$member->last_name.' '.$member->surname ?></span></li>
                    </ul>

                    <div class="empty-space marg-xs-b20"></div>
                </div>
                <div class="col-sm-5">
                    <div class="tt-heading-preview">
                        <? if (@Yii::$app->user->identity->id==$member->id) echo Html::a(Html::encode('Режим редагування'), Url::toRoute(['/members/member/profile']), ['class' =>'button type-1 color-2']) ?>
                    </div>
                </div>
            </div>
            <div class="tt-heading-user clearfix">
                <div class="tt-heading-img">
                    <img class="img-responsive" src="<?=!empty($member->avatar_image) ? $member->avatar_image : '/img/person/person.png';?>" alt="">
                </div>
                <div class="tt-heading-user-content">
<? if ($member->online==1) {?>
                    <div class="tt-heading-status">зараз на сайті</div>
<? } ?>
                    <div class="tt-heading-state <?=(!empty($member->busy_to) ? 'red' : ''); ?>"><?=(empty($member->busy_to)) ? 'Вільний для роботи' : 'Зайнятий до '.date('d.m.Y', (strtotime($member->busy_to))); ?></div>
                    <h3 class="tt-heading-title h3 light">
                        <? if ($member->approved ==1) {?>
                            <span class="tt-heading-check tt-tooltip" data-tooltip="Документи та достовірність внесеної інформації перевірені адміністраціює сайту"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAWlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////9ZMre9AAAAHXRSTlMA7uMjCr6qpE8/Lhj48d/d1tLJs29nXlZILBEEARTWarUAAABZSURBVBgZ5cHXFYJQFEXB8wIZJCpx99+mLj+BWwEzerC8kmmik+UNqQwfyHS26W+GVGeZK/WTw6iLFy5ICyS6qjw+lpAcuhEaWsew69ZaQx9lKPBRpiLomb6DfQQnMGTh7AAAAABJRU5ErkJggg==" alt=""></span>
                        <? } ?>
                        <?=(!empty($member->company)) ? $member->company : $member->first_name.' '.$member->last_name.' '.$member->surname ?></h3>
                    <div class="tt-heading-desc simple-text size-2">
                        <p><?=($member->forma!=3) ? @MemberHelper::FORMA[$member->forma] : ''?><?=($member->forma==2) ? ' / '.@MemberHelper::BRYGADA[$member->brygada] : ''?><?=($member->forma==3) ? ' Юридична особа ' : ''?></span></p>
                    </div>
                    <div class="tt-heading-reliability">
                        <div class="tt-heading-rating tt-vote-wrapper">
                            <a class="tt-vote like <?=($ratings['positive']>0) ? 'active' : '' ?>">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon like grey"></i>
                                        <i class="tt-icon like green"></i>
                                    </span>
                                <span class="tt-vote-count"><?=$ratings['positive']?></span>
                            </a>
                            <a class="tt-vote dislike <?=($ratings['negative']>0) ? 'active' : '' ?>">
                                    <span class="tt-vote-img">
                                        <i class="tt-icon dislike grey"></i>                        
                                        <i class="tt-icon dislike red"></i>                        
                                    </span>
                                <span class="tt-vote-count"><?=$ratings['negative']?></span>
                            </a>
                        </div>
                        <div class="tt-heading-duration simple-text size-2">
                            <p>На сайті <b><time class="timeago" datetime="<?=$member->created_at?>"></time></b></p>
                        </div>
                    </div>
                    <div class="tt-underheading-table">
                        <div class="tt-underheading-price">
                            <div class="tt-underheading-price-entry">
                                <div class="simple-text size-3">
                                    <p>Мінімальна вартість замовлення <b><?=($member->budget_min>0) ?  number_format($member->budget_min, 0, ',', ' ').' грн.' : ' (не вказано)'?></b></p>
                                </div>
                                <? echo \common\modules\professionals\controllers\DefaultController::ButtonSuggest($member->id, 'button type-1 size-1 color-7 add-to-informer'); ?>
                            </div>
                        </div>

                        <div class="tt-underheading-phone">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAUCAMAAACK2/weAAAARVBMVEUAAACqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7aqr7ZxyU2/AAAAF3RSTlMA6heZq1Xvig313LqimoF60W5p42ssBC1PkxoAAAB6SURBVBjTrY9JDsMwDAPJKJa8xU6c5f9P7cEKCvTcuQ1EQiBiUzLveya1RRxqIXSRHoLpgUoA13leAFhhOt7rUENL325qEN6Lc1OwMcKJ3CBcXl0o/9SfR5bK6pRkrrW6znDvHq58AJQC4GGd88MYYc6PTUnmTFJb/AA54QVJiz4xVAAAAABJRU5ErkJggg==" alt="">
                            <div class="tt-underheading-item"><?=$member->phone; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tt-bg-grey">
        <div class="tt-devider"></div>
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b60"></div>

            <div class="row">

                <div class="col-md-9 col-md-push-3">
                    <div class="tabs-block style-1">
                        <div class="tab-nav">
                            <div class="tab-menu active"><span>Інформація</span></div>
                            <div class="tab-menu"><span>Виконані проекти</span></div>
                            <div class="tab-menu"><span>Відгуки <span>(<?=$ratings['total']?>)</span></span></div>
                        </div>

                        <div class="tab-entry" style="display: block;">
                            <div class="tab-entry-box">
                                <h5 class="h5">Інформація для довідки</h5>
                                <div class="empty-space marg-lg-b15"></div>
                                <div class="simple-text size-3">
                                    <?=nl2br($member->about, false)?>
                                </div>
                                <div class="empty-space marg-sm-b30 marg-lg-b45"></div>
                                <div class="tab-entry-box-devider"></div>
                                <div class="empty-space marg-sm-b30 marg-lg-b40"></div>

                                <h5 class="h5 bold">Ціни та послуги</h5>

<?
    if (sizeof($member->prices)) $data = $member->prices; else $data = array();
        $price_types = MemberHelper::PRICE_TYPE;

        if (sizeof($member->types))
             $prices = Yii::$app->db->createCommand("SELECT d.id, d.name, d1.name as parent_name, d.parent, d.job_unit, d.job_markup  FROM dict_category d LEFT JOIN dict_category d1 ON d1.id=d.parent AND d1.types=1 WHERE d.active=1 AND d.types=2 AND d.parent IN (".implode(',', $member->types).") ORDER BY d1.priority ASC  ")->queryAll();
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


                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="empty-space marg-lg-b30"></div>

                            <div class="row">
<? $i=0; if (sizeof($portfolio)) foreach ($portfolio as $key=>$val) {  ?>
                                <div class="col-sm-6">
                                    <div class="tt-project">
                                        <div class="tt-project-img">
                                            <a class="custom-hover open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">
                                                <img class="img-responsive"  src="/uploads/members/portfolio/thmb/<?=$val['image']?>"  alt="">
                                            </a>
                                        </div>
                                        <a class="tt-project-title open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><?=$val['title']?></a>
                                        <div class="simple-text size-2 blue-links">
                                            <p><?= Html::encode( mb_strimwidth($val['description'], 0, 200, '...')); ?> <a href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>"><b>Дізнатись більше</b></a></p>
                                        </div>
                                        <div class="tt-project-info">
                                            <div class="tt-project-table">
                                                <div class="tt-project-cell">
                                                    вартість робіт <span><span><?=(empty($val['cost'])) ? '(не вказано)' : $val['cost'] ?></span></span>
                                                </div>
                                                <div class="tt-project-cell">
                                                    дата проведення <span><?=date('m/Y', strtotime($val['work_date']))?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="button type-1 full open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">Переглянути проект</a>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>
                                </div>
<?
    if ($i%2) echo ' </div><div class="row">';
    $i++;
    ?>
<? } else { ?>

                                    <div class="alert alert-warning fade in alert-dismissable" style="margin-right: 20px;margin-left: 20px;"><strong>Не додано жодної проекту.</strong> </div>

<? } ?>
                            </div>
                            <div class="empty-space marg-sm-b0 marg-lg-b20"></div>
                        </div>
                        <div class="tab-entry">
                            <div class="tabs-block style-2">

<? if (sizeof($ratings['reviews']))  { ?>
                                <div class="tab-nav">
                                    <div class="tab-menu redirect review_list active" data-value="0">Всі</div>
                                    <div class="tab-menu redirect review_list" data-value="1">Позитивні <span class="count-large">(<?=$ratings['positive']?>)</span></div>
                                    <div class="tab-menu redirect review_list" data-value="2">Негативні <span class="count-large">(<?=$ratings['negative']?>)</span></div>
                                </div>

                                <div class="tab-entry" style="display: block;">

<? foreach ($ratings['reviews'] as $key=>$val) {?>
                                    <div class="tt-review" data-review="<?=$val['positive_negative']?>">
                                        <div class="tt-review-top row">
                                            <div class="col-sm-6">
<? if ($val['positive_negative']==1) { ?>
                                                <div class="tt-response good"><i class="tt-icon like white"></i><span>Позитивний відгук</span></div>
<? } ?>
<? if ($val['positive_negative']==2) { ?>
                                                <div class="tt-response bad"><i class="tt-icon dislike white"></i><span>негативний відгук</span></div>
<? } ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="tt-review-date">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                    <span><?=date('d.m.Y', strtotime($val['created_at']))?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simple-text size-3 small-space bold-style-2">
                                            <p><b>Сподобалось</b></p>
                                            <p><?=nl2br($val['positive_note'])?></p>
                                            <p><b>Не сподобалось</b></p>
                                            <p><?=nl2br($val['negative_note'])?></p>
                                            <p><b>Загальний висновок</b></p>
                                            <p><?=nl2br($val['conclusion_note'])?></p>
                                        </div>
                                        <div class="row vertical-middle">
                                            <div class="col-sm-6 col-lg-5">
                                                <div class="tt-rating-block">
                                                    <ul class="tt-rating style-2">
                                                        <li>
                                                            <div class="tt-rating-title">Вічливість</div>
                                                            <?=MemberHelper::GetRatingStar($val['devotion'], 'devotion', false);?>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">На зв'язку</div>
                                                            <?=MemberHelper::GetRatingStar($val['connected'], 'connected', false);?>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Пунктуальність</div>
                                                            <?=MemberHelper::GetRatingStar($val['punctuality'], 'punctuality', false);?>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання ціни</div>
                                                            <?=MemberHelper::GetRatingStar($val['price'], 'price', false);https://vykonrob.com.ua/?>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Дотримання термінів</div>
                                                            <?=MemberHelper::GetRatingStar($val['terms'], 'terms', false);?>
                                                        </li>
                                                        <li>
                                                            <div class="tt-rating-title">Ціна/Якість</div>
                                                            <?=MemberHelper::GetRatingStar($val['quality'], 'quality', false);?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-7">
                                                <div class="tt-review-category">Замовлення: <?= Html::a($val['title'], ['/orders/default/detail', 'id' => $val['order_id']]) ?></div>
                                                <div class="tt-review-name"><?= Html::a($val['first_name'], ['/orders/default/detail', 'id' => $val['order_id']]) ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>

<? } ?>

                                    <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
                                </div>
<? } else { ?>
                                <div class="alert alert-warning fade in alert-dismissable" style="margin-right: 20px;margin-left: 20px;"><strong>Не опубліковано жодної відгуку.</strong> </div>
<? } ?>


                            </div>
                        </div>
                    </div>
                    <div class="empty-space marg-sm-b40"></div>
                </div>
                <div class="col-md-3 col-md-pull-9">
                    <div class="tt-widget">
                        <h5 class="tt-widget-title h5">Розташування</h5>
                        <div class="tt-widget-location">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAUCAMAAACzvE1FAAAAV1BMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkLkTjgbAAAAHHRSTlMA3Z2EEHekmIsV1s9Q5KwF9sq5tWhDQTcdCmZiOw521AAAAI1JREFUGBkFwYVhw0AABDA9mJ04TL3956wEPnNJyvwBGJJtmrZkAGqmDktNhSF/AL8M9Iw4huHAOd0c9JKUzpHmtGLMsmTEWmTC9cLlihqZ8Mq25YUapxX2UnZYT1q+AHzT9IwAjOm0vAHeaVACkAKW3IBbFmDPDHN2gJYHjzQAap7PVAA4J2cA4H4H/AMiuQhmojIjvwAAAABJRU5ErkJggg==" alt="">
                            <?=$member->place?>
                        </div>
                        <div class="tt-widget-devider"></div>
                        <h5 class="tt-widget-title h5">Виїзд на об`єкти</h5>
                        <ul class="simple-list size-2">

                            <? if (!is_array($member->regions)) $member->regions = array(); foreach ($regions as $val) if (in_array($val['id'], $member->regions)) { ?><li><a href="<?=Url::to(['/professionals', 'region'=>$val['url_tag']])?>"><?=$val['name_short']?></a></li><? } ?>
                        </ul>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>
<? if ($ratings['total']>0) { ?>
                    <div class="tt-widget">
                        <h5 class="tt-widget-title h5">Загальні оцінки</h5>
                        <ul class="tt-rating style-2">
                            <li>
                                <div class="tt-rating-title">Вічливість</div>
                                <?=MemberHelper::GetRatingStar($ratings['devotion'], 'devotion', false);?>
                            </li>
                            <li>
                                <div class="tt-rating-title">На зв'язку</div>
                                <?=MemberHelper::GetRatingStar($ratings['connected'], 'connected', false);?>
                            </li>
                            <li>
                                <div class="tt-rating-title">Пунктуальність</div>
                                <?=MemberHelper::GetRatingStar($ratings['punctuality'], 'punctuality', false);?>
                            </li>
                            <li>
                                <div class="tt-rating-title">Дотримання ціни</div>
                                <?=MemberHelper::GetRatingStar($ratings['price'], 'price', false);?>
                            </li>
                            <li>
                                <div class="tt-rating-title">Дотримання термінів</div>
                                <?=MemberHelper::GetRatingStar($ratings['terms'], 'terms', false);?>
                            </li>
                            <li>
                                <div class="tt-rating-title">Ціна/Якість</div>
                                <?=MemberHelper::GetRatingStar($ratings['quality'], 'quality', false);?>
                            </li>
                        </ul>
                        <!--<a href="javascript:" class="button type-1 full">Залишити відгук</a>-->
                    </div>
<? } else { ?>
                    <div class="tt-widget">
                        <h5 class="tt-widget-title h5">Загальні оцінки</h5>
                        <p>Наразі не має жодної оцінки</p>
                    </div>
<? } ?>
                </div>
            </div>

            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        </div>
        <div class="tt-devider"></div>
    </div>

