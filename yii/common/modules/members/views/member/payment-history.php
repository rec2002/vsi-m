<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\widgets\Alert;
use kartik\select2\Select2;
use common\components\MemberHelper;

$this->title = 'Доступ до замовлень  - Кабінет користувача';

?>

    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 445px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/portfolio/list'])?>"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/billing'])?>" ><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <div class="tabs-block style-4">
                            <div class="tab-nav">
                                <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billing'])?>" >Доступ до замовлень</a>
                                <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billinghistory'])?>" >Рух коштів</a>
                                <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/billingpayment'])?>" >Списання коштів</a>
                            </div>
                            <div class="tab-entry" style="display: block">
                                <div class="tab-entry-box">
                                    <div class="tt-table-responsive">
                                        <table class="tt-table">
                                            <thead>
                                            <tr>
                                                <th>Дата</th>
                                                <th>Сума списання</th>
                                                <th>Замовлення</th>

                                            </tr>
                                            </thead>
                                            <tbody>
<? foreach ($models as $model) {?>
                                            <tr>
                                                <td data-title="Дата"><?=date('H:i d/m/Y', strtotime($model['created_at']))?></td>
                                                <td data-title="Сума поповнення"><?=number_format($model['price'], 2 , ',' , ' ')?></td>
                                                <td data-title="Оплата через">
                                                    <?=Html::a('<b>'.$model['title'].'</b>', Url::toRoute(['/orders/default/detail', 'id' => $model['order_id']]), ['style'=>'']);?>
                                                </td>
                                            </tr>
<? } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
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


                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>

<?
    $this->registerCss(".slider-range.style-2 .slider-range-skew span{background: white;}");
    $this->registerJsFile('/js/billing.js', ['depends' => 'yii\web\JqueryAsset']);
?>