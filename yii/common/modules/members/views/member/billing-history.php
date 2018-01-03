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
                                <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/billinghistory'])?>" >Рух коштів</a>
                                <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billingpayment'])?>" >Списання коштів</a>
                            </div>
                            <div class="tab-entry" style="display: block">
                                <div class="tab-entry-box">
                                    <div class="tt-table-responsive">
                                        <table class="tt-table">
                                            <thead>
                                            <tr>
                                                <th>Дата</th>
                                                <th>№</th>
                                                <th>Сума поповнення</th>
                                                <th>Оплата через</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
<? foreach ($models as $model) {?>
                                            <tr>
                                                <td data-title="Дата"><?=date('H:i d/m/Y', strtotime($model['created_at']))?></td>
                                                <td data-title="№"></td>
                                                <td data-title="Сума поповнення"><?=number_format($model['summa'], 2 , ',' , ' ')?></td>
                                                <td data-title="Оплата через">
                                                    <?=MemberHelper::PAYMENT[$model['payment_type']]?>
                                                </td>
                                                <td class="tt-cell-icon">
                                                    <a class="tt-icon-entry tt-icon-hover" href="#">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAMAAABFjsb+AAAAclBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJqJR/5AAAAJnRSTlMAAjAHtbkPSyzGZI+IfntdUPhsVUAhDM2/pZyThDYZ/uJ0Ju9xRxPfNv0AAAC5SURBVBgZVcEHdoMwEAXAvwhV1BC9uiX3v2Io5sWewY6NOuec53pieKPetWwnipxwWntcOoEDVZq1Yte2nSRs1J3z/DIM9wwQpaJ/jKlSwHh8iBY/BqnCB8ZQJZiAb8HABHwLBilCqeyiFGJCeND4mp13znlnSwsfIMqlHnEZlqUUQKNvD2aLzeRpvukGG4qWVLZ70lQTDo2lupJSVjUVK06ZJxmllPGX5idOjWZ0Yt2Kt9TzQ64NNn+5oAn0FqNZ3wAAAABJRU5ErkJggg==" alt="">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAMAAABFjsb+AAAAclBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igCiUwhmAAAAJnRSTlMAAjAHtbkPSyzGZI+IfntdUPhsVTghDM2/pZyThEEZ/uJ0Ju9xR1kkoqUAAAC5SURBVBgZVcEHdoMwEAXAvwhV1BC9uiX3v2Io5sWewY6NOuec53pieKPetWwnipxwWntcOoEDVZq1Yte2nSRs1J3z/DIM9wwQpaJ/jKlSwHh8iBY/BqnCB8ZQJZiAb8HABHwLBilCqeyiFGJCeND4mp13znlnSwsfIMp6GXEZ6roUQKNvD2aLzeRpvukGG4qWVLZ70rQQDo2lpZJSVjUVK06ZJxmllPGX5idOjWZ0Yt2Kt9TzQ64NNn+2bQn0Cl1XgwAAAABJRU5ErkJggg==" alt="">
                                                    </a>
                                                </td>
                                            </tr>
<? } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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