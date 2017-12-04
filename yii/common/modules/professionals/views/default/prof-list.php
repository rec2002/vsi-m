<?

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
use common\components\MemberHelper;
use yii\helpers\ArrayHelper;
use backend\models\DictRegions;
use yii\widgets\Pjax;
use yii\bootstrap\Nav;

$this->title = 'Каталог майстрів';
?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="tt-devider"></div>
        <div class="container">
            <div class="empty-space marg-lg-b25"></div>

<? Pjax::begin();?>
            <!-- TT-BREADCRUMBS -->
<?=Nav::widget([
                'items' => $breadcrumb,
                'options' => ['class' =>'tt-breadcrumbs nav'], // set this to nav-tab to get tab-styled navigation
            ]);

$this->registerCss(".nav > li > a {padding:0}
    .nav > li > a:hover {background-color:inherit;}
");
?>

            <div class="empty-space marg-sm-b30 marg-lg-b35"></div>

            <h3 class="h3"><?=(!empty($settings['title'])) ? $settings['title'] : 'Каталог майстрів'?></h3>
            <div class="simple-text size-3">
                <p>Додайте замовлення, щоб отримати пропозиції від зацікавлених майстрів</p>
            </div>
            <div class="empty-space marg-sm-b30 marg-lg-b55"></div>

            <div class="row">
<?
                $form = ActiveForm::begin(['id' => 'ProfSearch']);
?>
                <div class="col-md-3 col-md-push-9">
                    <div class="tt-widget">
                        <h5 class="tt-widget-title h5">Оберіть регіон</h5>
                        <div class="simple-select">
<?

                            $ProfSearch->region = $settings['region'];

                            $region = ArrayHelper::toArray(DictRegions::findBySql('SELECT \'0\' as id, \'Вся Україна\' as name, \'\' as url_tag UNION SELECT id, name, url_tag FROM `dict_regions`  ')->all());

                            echo $form->field($ProfSearch, 'region')->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($region, 'id', 'name'),
                                'language' => 'uk',
                                'hideSearch' => true,
                                'size' => Select2::LARGE,
                                'theme' => Select2::THEME_BOOTSTRAP,
                                'options' => ['placeholder' => 'Вибрати регіон', 'data-cat'=>@Yii::$app->request->get('cat')],
                                'pluginOptions' => [
                                    'allowClear' => false
                                ],
                            ])->label(false);

                            $this->registerJs('var region = '.json_encode($region, true).';',  \yii\web\View::POS_HEAD);

?>

                            <a href="/каталог-майстрів?cat=майстер-на-годину" id="hidden-region-regirect" style="display:none;" ></a>
                        </div>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>

                    <div class="tt-widget">
                        <h5 class="tt-widget-title tt-widget-dropdown h5">Види робіт</h5>
                        <ul class="tt-toggle-list tt-widget-content">

<?

    $types = Yii::$app->db->createCommand("SELECT d1.id, d1.name, d.name as parent_name, d1.url_tag, d1.parent FROM dict_category d LEFT JOIN dict_category d1 ON d.id=d1.parent AND d1.types=1 WHERE d.active=1 AND d1.active=1 AND d.types=0 ORDER BY d.priority ASC, d1.priority ASC ")->queryAll();
    $types_temp = array();

    foreach ($types as $key=>$val) {
        $active = ($settings['cat']==$val['id']) ? 1 : 0;
        if ($key==0)  $types_temp[$val['parent']] = array('name'=>$val['parent_name']);
        elseif ($types[$key-1]['parent'] != $types[$key]['parent']) $types_temp[$val['parent']] = array('name'=>$val['parent_name']);
        $types_temp[$val['parent']]['list'][] = array('id'=>$val['id'], 'name'=>$val['name'], 'url_tag'=>$val['url_tag'],  'active' => $active);
    }

    foreach ($types_temp as $key=>$val) {
        $types_temp[$key]['active']=0;
        if (sizeof($val['list'])) foreach ($val['list'] as $val_) {
            if ($val_['active']==1) {
                    $types_temp[$key]['active'] = 1;
                    break;
                }
        }
    }
    $types =  $types_temp;

?>

                            <? foreach ($types as $val)  {?>
                                <li <?=($val['active']==1) ? 'class="active"' : '' ?>>
                                    <a href="javascript:" rel="nofollow"><?=$val['name']?></a>
                                    <? if (sizeof($val['list'])) { ?>
                                        <ul <?=($val['active']==1) ? 'style="display: block;"' : '' ?>>
                                            <? foreach ($val['list'] as $key=>$val_)  { ?>
                                                <li><a <?=$val_['active']==1 ? 'style="color:#ff8a00"' : '' ?> href="<?=Url::to(['/professionals',  'region'=>Yii::$app->request->get('region'), 'cat'=>$val_['url_tag']])?>"  ><?=$val_['name']?></a></li>
                                            <? } ?>

                                        </ul>
                                    <? } ?>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                    <div class="empty-space marg-sm-b30"></div>
                </div>
                <?php ActiveForm::end(); ?>

                <div class="col-md-9 col-md-pull-3">
                    <!-- TT-MASTERBOX -->
                    <div class="tt-masterbox-ajax">
<? if (sizeof($provider)) { ?>
<? foreach ($provider as $val) { ?>

                        <div class="tt-masterbox">
                            <div class="tt-masterbox-top clearfix">
                                <div class="tt-masterbox-img">
                                    <!--<div class="tt-masterbox-check tt-tooltip" data-tooltip="Документи та достовірність внесеної інформації перевірені адміністраціює сайту"></div>-->
                                    <a class="custom-hover round" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $val['id']])?>"><img src="<?=($val['avatar_image']) ? $val['avatar_image'] : '/img/person/person.png' ?>" width="136" alt=""></a>
                                </div>
                                <div class="tt-masterbox-top-right">
                                    <div class="tt-masterbox-topinfo">
                                        <a class="tt-masterbox-title h5" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $val['id']])?>"><?=(!empty($val['company']) && $val['forma']==3) ? $val['company'] : $val['last_name'].' '.$val['first_name'].' '.$val['surname'] ?></a>
                                        <div class="tt-masterbox-location simple-text size-2">
                                            <p><b><?=$val['region']?></b>
                                                <?=($val['forma']==2 || $val['forma']==1) ? MemberHelper::FORMA[$val['forma']] : '' ?>
                                                <?=($val['forma']==2) ? ' / '.MemberHelper::BRYGADA[$val['brygada']] : '' ?>
                                                <?=($val['forma']==3) ? ' Юридична особа ' : '' ?></p>
                                        </div>
                                        <div class="tt-masterbox-reliability">
                                            <div class="tt-masterbox-rating tt-vote-wrapper">
                                                <a class="tt-vote like active" >
                                                        <span class="tt-vote-img">
                                                            <i class="tt-icon like grey"></i>
                                                            <i class="tt-icon like green"></i>
                                                        </span>
                                                    <span class="tt-vote-count">0</span>
                                                </a>
                                                <a class="tt-vote dislike">
                                                        <span class="tt-vote-img">
                                                            <i class="tt-icon dislike grey"></i>
                                                            <i class="tt-icon dislike red"></i>
                                                        </span>
                                                    <span class="tt-vote-count">0</span>
                                                </a>
                                            </div>
                                            <div class="tt-masterbox-duration simple-text size-2">
                                                <p>На сайті <b><time class="timeago" datetime="<?=$val['created_at']?>"></time></b></p>
                                            </div>
                                        </div>
                                        <div class="tt-masterbox-average simple-text size-2">
<? if ($val['budget_min'] > 0) { ?>
                                            <p>Середня вартість замовлення <b><?=number_format($val['budget_min'], 0, ',', ' ');?> грн</b>.</p>
<? } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-masterbox-desc simple-text size-3 blue-links">
                                <p><?= Html::encode( mb_strimwidth($val['about'], 0, 300, '...')); ?> <a class="tt-masterbox-more" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $val['id']])?>">Дізнатись більше</a></p>
                            </div>
<? if (sizeof($val['portfolio'])) {?>
                            <h5 class="tt-masterbox-subtitle h5 bold">Фото виконаних робіт</h5>
                            <ul class="tt-masterbox-gallery clearfix">
<? foreach ($val['portfolio'] as $val_) {?>
                                <li>
                                    <a class="tt-thumbs custom-hover open-popup-big" href="javascript:" rel="nofollow" data-id="<?=$val_['id']?>">
                                        <span class="tt-thumbs-count"><?=$val_['counts']?> фото</span>
                                        <img class="img-responsive" src="/uploads/members/portfolio/thmb200/<?=$val_['image']?>" alt="">
                                    </a>
                                </li>
<? } ?>
                            </ul>
<? } ?>
<? if (sizeof($val['prices'])) {?>
                            <h5 class="tt-masterbox-subtitle h5">Ціни</h5>
                            <ul class="list-dotted">
<? foreach ($val['prices'] as $val_) {?>
                                <li>
                                    <div class="list-dotted-left"><span><?=$val_['name']?></span></div>
                                    <div class="list-dotted-right"><span>від <?=number_format($val_['price'], 0, ',', ' ');?> <?=MemberHelper::PRICE_TYPE[$val_['job_unit']]?></span></div>
                                </li>
<? } ?>
                            </ul>
<? } ?>
                            <div class="tt-masterbox-buttons">
                                <!--<div class="tt-masterbox-status">зараз на сайті</div>-->
                                <!--<a class="button type-1 add-to-informer" data-user-id="1" data-img="img/masterbox/master_1_small.jpg">Замовити послугу</a>-->
                            </div>
                        </div>

                        <div class="empty-space marg-lg-b30"></div>

<? } ?>
<? } else { ?>
                        <div class="alert alert-warning fade in alert-dismissable"><strong>Згідно параметрів пошуку, жодного майстра не знайдено . </strong> </div>
<? } ?>
                    </div>

                    <!--<div class="tt-masterbox-load">
                        <div class="tt-masterbox-load-btn" data-ajax="_ajax.html"></div>
                        <div class="preloader-spin">
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                            <div class="preloader-spin__petal"></div>
                        </div>
                    </div>-->

                    <!-- preloader start -->

                    <!-- preloader end -->

                    <!-- TT-PAGINATION -->
                    <div class="tt-pagination clearfix">
                    <?php

                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pagination,
                        'linkOptions' => [''],
                        'options' => ['class'=>''],
                        'nextPageCssClass' => 'button type-1 btn-simple icon-right uppercase tt-pagination-right',
                        'nextPageLabel' => 'наступні',
                        'prevPageCssClass' =>'button type-1 btn-simple icon-left uppercase tt-pagination-left',
                        'prevPageLabel' => 'попередні'

                    ])

                    ?>
                        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
                    </div>
                </div>
            </div>

            <? Pjax::end();?>

            <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
        </div>
        <div class="tt-devider"></div>
    </div>


