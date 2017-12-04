<?
use yii\helpers\Url;
use common\components\MemberHelper;

$this->title = 'Замовлення';


?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-lg-b25"></div>
            <ul class="tt-breadcrumbs">
                <li><a href="/">Головна</a></li>
                <li><a href="<?=Url::to(['/orders'])?>">Замовлення</a></li>
                <li><span><?=$model->title;?></span></li>
            </ul>
            <div class="empty-space marg-lg-b30"></div>
            <a href="<?=Yii::$app->request->referrer?>" class="button type-1 btn-simple icon-left uppercase"><span>назад</span></a>
            <div class="empty-space marg-lg-b10"></div>
            <div class="tt-task detail">
                <div class="tt-task-top clearfix">
                    <div class="tt-task-info">
                        <a class="tt-task-proposed tt-icon-hover" rel="nofolow" href="javascript:">
                                <span class="tt-icon-entry">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                </span>
                            <span class="tt-task-proposed-count">0</span>
                            <span> майстрів відповіли</span>
                        </a>
                    </div>
                    <div class="tt-task-title"><h5 class="h5"><?=$model->title;?></h5></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div id="map-canvas" class="style-2 tt-imgbox-map map-order-view" data-lat="49.839671" data-lng="23.995056" data-zoom="15"></div>
                        <div class="addresses-block">
                            <a class="marker" data-lat="49.839671" data-lng="23.989056" data-marker="/img/map/marker_3.png"  data-string="<?=$model->location;?>"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ul class="tt-task-feature-wrapper">
                            <li>
                                <div class="tt-task-feature">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAMCAMAAABcOc2zAAAAP1BMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJAQ/3IAAAAFHRSTlMABtQCmHVVSTgqJhkLzpuSfnBUUvF6HCgAAABJSURBVAjXZY5HEoAwDMRkpxF6yf/fyi3YQUfNbGHR1jkBdKVzFaDxEVS8YN6tkEk4qhE3D6JG5JCRbYjEOpTG36w/lgq46wl4AWAbA1CXlxT6AAAAAElFTkSuQmCC" alt="">
                                    <div class="tt-task-feature-entry">
                                        № замовлення: <span><?=$model->id;?></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJ1BMVEUAAAAyMjAyMjAyMjIvLy8yMjAxMTExMTAyMjEwMDAxMTAxMTAzMzIS37QgAAAADHRSTlMAQ0GREjQzYjUL2tlQexsFAAAAT0lEQVQI12NgYE1gDeAIYGCYpGwEgpoMCyEMaYYDbAmsCRwJPAwHGMAAmcF0iOeAjACQwaLCKODogMxgOgiWQihGiLCIQNRgGlhzBgyOAwAhOhym9cKdhgAAAABJRU5ErkJggg==" alt="">
                                    <div class="tt-task-feature-entry">
                                        Коли додано: <span><?=date('d.m.Y', strtotime($model->created_at))?></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAV1BMVEUAAAAvLy8yMjIyMjIxMTExMTEwMDAyMjIxMTExMTEvLy8xMTExMTEzMzMyMjIyMjIyMjIyMjIyMjIyMjIxMTEwMDAxMTExMTExMTEzMzMyMjIxMTExMTESmlYFAAAAHXRSTlMABDLwpEUPsk5KC1I216uDeXRgQisb09HBvouIV2mZyFEAAABmSURBVAgdBcGHAYJAEACw3Fc6Cnbdf04TWErOJYHo10a79EBPRLB0litDSgOXpDQVqlZkTjjJMhUq2TZJE1PSNuPIrdYbwyhWQKzBMQLDgXhM0J4B9zfidQfmnX0G+My/LwClBPwBNpUDNDLhzEoAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-task-feature-entry">
                                        Адреса:
                                        <span id="address-location" ><?=$model->location;?></span>
                                    </div>
                                </div>
                            </li>
                            <li>

                                <div class="tt-task-feature">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAYFBMVEUAAAArKysyMjIyMjIxMTEwMDAxMTEyMjIxMTEvLy8tLS0yMjIxMTEwMDAwMDAwMDAxMTEzMzMyMjIzMzMyMjIyMjIyMjIxMTEzMzMxMTExMTExMTExMTEzMzMxMTEyMjJ1eGjnAAAAIHRSTlMAA0GyNhSoijAKBsyYfhgQ2sa/qqF3b20+GtGPYldGJwSMA3IAAAB8SURBVBgZBcGHYQIxEAAw3dn+3uiQBNh/y0gAdJcAAK9rlgDANO8tSwDYfr7PUZYA4nbea0OWgHo8vYDs0Peh5ATGM8ub6f64rvA7qD3UWu/BX888guG2mpYVlwTC56gQJbEP7fQIIEoac5gbgCi5tVMAIEp2GwCIbgHwD1QcBCFl5hNiAAAAAElFTkSuQmCC" alt="">
                                    <div class="tt-task-feature-entry">
                                        Бюджет:
                                        <span><?=MemberHelper::GetBudgetRange()[$model->budget]['budget']?></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJ1BMVEUAAAAyMjAyMjAyMjIvLy8yMjAxMTExMTAyMjEwMDAxMTAxMTAzMzIS37QgAAAADHRSTlMAQ0GREjQzYjUL2tlQexsFAAAAT0lEQVQI12NgYE1gDeAIYGCYpGwEgpoMCyEMaYYDbAmsCRwJPAwHGMAAmcF0iOeAjACQwaLCKODogMxgOgiWQihGiLCIQNRgGlhzBgyOAwAhOhym9cKdhgAAAABJRU5ErkJggg==" alt="">
                                    <div class="tt-task-feature-entry">
                                        Коли починати:
                                        <span><? echo common\modules\orders\controllers\DefaultController::GetStartVal($model); ?></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h6 class="tt-task-subtitle">Опис замовлення:</h6>
                <div class="tt-task-txt simple-text size-3"><?=nl2br($model->descriptions)?></div>
<? if (sizeof($images))  { ?>
                <h6 class="tt-task-subtitle">Фото:</h6>
                <ul class="tt-task-gal clearfix">
<? foreach ($images as $key=>$val) {?>
                    <li>
                        <a class="custom-hover open-popup-big" href="javascript:" data-id="<?=$val->order_id; ?>">
                            <img class="img-responsive" src="/uploads/members/orders/thmb/<?=$val->image; ?>" style="width:200px;" alt="">
                        </a>
                    </li>
<? } ?>
                </ul>
<? } ?>
                <div class="tt-task-request">
                    <div class="tt-fadein-top">
                        <a href="#" class="tt-fadein-link button type-1">Надіслати пропозицію</a>
                        <div class="tt-task-message">
                            <div class="simple-text size-3">
                                <p>Необхідно <a href="professionals-profile.html#access_to_orders">поповнити баланс</a></p>
                            </div>
                            <div class="tt-info-btn tt-tooltip" data-tooltip="Ваш баланс становить 0 грн">?</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
        </div>
    </div>


<?
$gpJsLink= 'http://maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);
//echo $this->registerJsFile('/js/formatDate.js', ['depends' => 'yii\web\JqueryAsset']);
//echo $this->registerJsFile('/js/order.js', ['depends' => 'yii\web\JqueryAsset']);




?>