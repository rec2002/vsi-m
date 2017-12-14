<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use kartik\select2\Select2;
use common\components\MemberHelper;


$this->title = 'Список замовлень';

?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-lg-b20"></div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="tt-breadcrumbs">
                        <ul class="tt-breadcrumbs">
                            <li><a href="/">Головна</a></li>
                            <li><span>Список замовлень</span></li>
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="tt-pageform-wrapper" style="height: 699px;padding-top:15px;">
                <!-- TABS-BLOCK -->
                <div class="tabs-block style-1">


<?  if (\Yii::$app->user->can('majster')) {  ?>

    <div class="tab-nav">
        <a href="<?=Url::to(['/orders'])?>" class="tab-menu <?=in_array($this->context->action->id, array('index')) ? 'active' : '' ?>"><span>Пошук замовлень</span></a>
        <a href="<?=Url::to(['/orders/default/suggested'])?>" class="tab-menu <?=in_array($this->context->action->id, array('suggested')) ? 'active' : '' ?>"><span>Мої замовлення як виконавця</span></a>
        <a href="<?=Url::to(['/orders/default/myorders'])?>" class="tab-menu <?=in_array($this->context->action->id, array('myorders')) ? 'active' : '' ?>"><span>Мої замовлення як замовника</span></a>
    </div>


<? } elseif (\Yii::$app->user->can('zamovnyk')) {  ?>

    <div class="tab-nav">
        <a href="<?=Url::to(['/orders'])?>" class="tab-menu <?=in_array($this->context->action->id, array('index')) ? 'active' : '' ?>"><span>Всі замовлення</span></a>
        <a href="<?=Url::to(['/orders/default/myorders'])?>" class="tab-menu <?=in_array($this->context->action->id, array('myorders')) ? 'active' : '' ?>"><span>Мої замовлення </span></a>
    </div>




<? } else { ?>

    <div class="row">
        <div class="col-sm-12">
            <h3 class="h3">Список замовлень</h3>
            <div class="simple-text size-3">
                <p>Якщо ви майстер? Забезпечте себе замовленнями, бригаду чи компанію </p>
            </div>
        </div>
    </div>

<? } ?>



                    <div class="tab-entry" style="display: block;">

                        <? if (in_array($this->context->action->id, array('index'))) { ?>
                            <?php $form = ActiveForm::begin(['id' => 'orders-filter']); ?>
                            <div class="tt-order-filter-wrapper">
                                <!--<div class="row row10">
                                    <div class="col-sm-6">
                                        <h5 class="h5">Мій фільтр</h5>
                                        <div class="empty-space marg-xs-b15"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-sm-right">
                                            <a class="tt-order-filter-remove" href="professionals-work.html">Видалити фільтр</a>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="empty-space marg-lg-b15"></div>
                                <div class="row row10">
                                    <div class="col-sm-4">
                                        <a class="button-select tt-order-filter-select open-popup" href="javascript:" data-rel="18">
                                            <span>Оберіть типи робіт</span>
                                            <span class="button-select-icon"></span>
                                        </a>
                                        <div class="empty-space marg-xs-b10"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="simple-select multy region">
                                            <select multiple="multiple" name="regions">
                                                <?
                                                $regions = Yii::$app->db->createCommand("SELECT id, name_short  FROM `dict_regions` ORDER BY `id` ASC")->queryAll();
                                                $regions_data =  @explode(',', $_SESSION['filter'][':regions']);
                                                ?>

                                                <? foreach ($regions as $val) { ?>
                                                    <option value="<?=$val['id']?>" <?=(in_array($val['id'], $regions_data) ? 'selected="true"' : '')?>><?=$val['name_short']?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                        <div class="empty-space marg-xs-b10"></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="simple-select multy budget">
                                            <select multiple="multiple" name="budgets">

                                                <?
                                                $budget = MemberHelper::GetBudgetRange();
                                                $budget_data =  @explode(',', $_SESSION['filter'][':budgets']);
                                                foreach ($budget as $key=>$val) {
                                                    ?>
                                                    <option value="<?=$key?>" <?=(in_array($key, $budget_data) ? 'selected="true"' : '')?>><?=$val['budget_short']?></option>

                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="empty-space marg-lg-b15"></div>
                                <!--<div class="simple-text text-center size-2">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                </div>-->
                            </div>
                            <?php ActiveForm::end(); ?>

                            <!--<div class="empty-space marg-lg-b30"></div>
                            <a href="#" class="button type-1 full">Показати нові замовлення (10)</a>
                            <div class="empty-space marg-lg-b30"></div>-->
                        <? } ?>
                        <? Pjax::begin(); ?>
<? if (in_array($this->context->action->id, array('myorders'))) { ?>
                            <div class="tt-order-filter-wrapper">
                                <div class="tt-add-task">
                                    <a href="<?=Url::to(['/orders/default/addorder'])?>" class="button type-1 size-3 color-3 uppercase" style="top: 6px;">додати замовлення</a>
                                </div>
                                <div class="tabs-block style-2 wth-btn">
                                    <div class="tab-nav">
                                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==false) ? 'active' : '' )?>"><a href="<?=Url::to(['/orders/default/myorders'])?>">Всі <span class="count-large">(<?=$count_total['total']?>)</span></a></div>

<? foreach (MemberHelper::STATUS as $key=>$val) if ($key>1) { ?>
                                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==$key) ? 'active' : '' )?>"><a href="<?=Url::to(['/orders/default/myorders?status='.$key])?>"><?=$val?> <span class="count-large">(<?=$count_total['status_'.$key]?>)</span></a></div>
<? } ?>



                                    </div>
                                </div>
                            </div>
<? } ?>

<? if (in_array($this->context->action->id, array('suggested'))) { ?>
                            <div class="tt-order-filter-wrapper">
                                <div class="tabs-block style-2 wth-btn">
                                    <div class="tab-nav">
                                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==false) ? 'active' : '' )?>"><a href="<?=Url::to(['/orders/default/myorders'])?>">Всі <span class="count-large">(<?=$count_total['total']?>)</span></a></div>
                                    </div>
                                </div>
                            </div>
<? } ?>



                              <div id="items_body">
                              <? echo Yii::$app->controller->renderPartial('list-partial', array('model' => $model))?>
                              </div>
                        <? Pjax::end(); ?>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>


                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>

<?
    $bundle = AppAsset::register(Yii::$app->view);
    $bundle->js[] = '/js/order.js'; // dynamic file added
?>