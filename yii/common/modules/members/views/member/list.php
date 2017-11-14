<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use common\components\MemberHelper;
use yii\helpers\Url;
use yii\bootstrap\Nav;

$this->title = 'Список завдань';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 646px;">
                <!-- TABS-BLOCK -->
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <div class="tab-menu"  onclick="alert('UNDER CONSTRUCTION'); return false;"><span>Пошук замовлень</span></div>
                        <div class="tab-menu"  onclick="alert('UNDER CONSTRUCTION'); return false;"><span>Мої замовлення як виконавця</span></div>
                        <div class="tab-menu active"><span>Мої замовлення як замовника</span></div>
                    </div>

                   <div class="tab-entry" style="display: none;">
                        <div class="empty-space marg-lg-b30"></div>
 <!--
                        <div class="tt-order-filter-wrapper">
                            <div class="row row10">
                                <div class="col-sm-4">
                                    <a class="button-select tt-order-filter-select open-popup" href="#" data-rel="18">
                                        <span>Оберіть типи робіт</span>
                                        <span class="button-select-icon"></span>
                                    </a>
                                    <div class="empty-space marg-xs-b10"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="simple-select multy region">
                                        <div class="SumoSelect" tabindex="0"><select multiple="multiple" class="SumoUnder" tabindex="-1">
                                                <option value="">Вінницька</option>
                                                <option value="">Волинська</option>
                                                <option value="">Дніпропетровська</option>
                                                <option value="">Донецька</option>
                                                <option value="">Житомирська</option>
                                                <option value="">Закарпатська</option>
                                                <option value="">Запорізька</option>
                                                <option value="">Івано-Франківська</option>
                                                <option value="">Київська</option>
                                                <option value="">Кіровоградська</option>
                                                <option value="">Луганська</option>
                                                <option value="">Львівська</option>
                                                <option value="">Миколаївська</option>
                                                <option value="">Одеська</option>
                                                <option value="">Полтавська</option>
                                                <option value="">Рівненська</option>
                                                <option value="">Сумська</option>
                                                <option value="">Тернопільська</option>
                                                <option value="">Харківська</option>
                                                <option value="">Херсонська</option>
                                                <option value="">Хмельницька</option>
                                                <option value="">Черкаська</option>
                                                <option value="">Чернівецька</option>
                                                <option value="">Чернігівська</option>
                                            </select><p class="CaptionCont SelectBox" title="Виберіть область"><span class="placeholder">Виберіть область</span><label><i></i></label></p><div class="optWrapper multiple"><p class="select-all"><span><i></i></span><label>Вся Україна</label></p><ul class="options"><li class="opt"><span><i></i></span><label>Вінницька</label></li><li class="opt"><span><i></i></span><label>Волинська</label></li><li class="opt"><span><i></i></span><label>Дніпропетровська</label></li><li class="opt"><span><i></i></span><label>Донецька</label></li><li class="opt"><span><i></i></span><label>Житомирська</label></li><li class="opt"><span><i></i></span><label>Закарпатська</label></li><li class="opt"><span><i></i></span><label>Запорізька</label></li><li class="opt"><span><i></i></span><label>Івано-Франківська</label></li><li class="opt"><span><i></i></span><label>Київська</label></li><li class="opt"><span><i></i></span><label>Кіровоградська</label></li><li class="opt"><span><i></i></span><label>Луганська</label></li><li class="opt"><span><i></i></span><label>Львівська</label></li><li class="opt"><span><i></i></span><label>Миколаївська</label></li><li class="opt"><span><i></i></span><label>Одеська</label></li><li class="opt"><span><i></i></span><label>Полтавська</label></li><li class="opt"><span><i></i></span><label>Рівненська</label></li><li class="opt"><span><i></i></span><label>Сумська</label></li><li class="opt"><span><i></i></span><label>Тернопільська</label></li><li class="opt"><span><i></i></span><label>Харківська</label></li><li class="opt"><span><i></i></span><label>Херсонська</label></li><li class="opt"><span><i></i></span><label>Хмельницька</label></li><li class="opt"><span><i></i></span><label>Черкаська</label></li><li class="opt"><span><i></i></span><label>Чернівецька</label></li><li class="opt"><span><i></i></span><label>Чернігівська</label></li></ul><div class="MultiControls"><p class="btnOk">OK</p><p class="btnCancel">Відмінити </p></div></div></div>
                                    </div>
                                    <div class="empty-space marg-xs-b10"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="simple-select multy budget">
                                        <div class="SumoSelect" tabindex="0"><select multiple="multiple" class="SumoUnder" tabindex="-1">
                                                <option selected="" value="">до 5000 грн</option>
                                                <option value="">5000 - 10000 грн</option>
                                                <option value="">10000 - 20000 грн</option>
                                                <option value="">20000 - 30000 грн</option>
                                            </select><p class="CaptionCont SelectBox" title=" до 5000 грн "><span> до 5000 грн </span><label><i></i></label></p><div class="optWrapper multiple"><p class="select-all partial"><span><i></i></span><label>Будь який бюджет</label></p><ul class="options"><li class="opt selected"><span><i></i></span><label>до 5000 грн</label></li><li class="opt"><span><i></i></span><label>5000 - 10000 грн</label></li><li class="opt"><span><i></i></span><label>10000 - 20000 грн</label></li><li class="opt"><span><i></i></span><label>20000 - 30000 грн</label></li></ul><div class="MultiControls"><p class="btnOk">OK</p><p class="btnCancel">Відмінити </p></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-order-filter-messages">
                                <div class="tt-order-message-place simple-text size-2 text-center">
                                    <p>Щоб зберегти фільтр, виберіть область</p>
                                </div>
                                <div class="tt-order-message-work simple-text size-2 text-center">
                                    <p>Щоб зберегти фільтр, виберіть вид тип робіт</p>
                                </div>
                                <div class="tt-order-message-all simple-text size-2 text-center">
                                    <a href="professionals-work-filter.html">Зберегти фільтр і підписатися</a>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>
                        <a href="#" class="button type-1 full">Показати нові замовлення (10)</a>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>12 000 - 15 000 грн. (Великий)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>8 000 - 9 000 грн.</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Штукатурка стелі</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>5 000 грн. (Середній)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>12 000 - 15 000 грн. (Великий)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>8 000 - 9 000 грн.</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-lg-b30"></div>

                        <div class="tt-task">
                            <div class="tt-task-top clearfix">
                                <div class="tt-task-info">
                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                            <span class="tt-icon-entry">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                            </span>
                                        <span class="tt-task-proposed-count">2</span>
                                        <span> майстрів відповіли</span>
                                    </a>
                                </div>
                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Штукатурка стелі</a></div>
                            </div>
                            <div class="tt-task-txt simple-text size-3 blue-links">
                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                            </div>
                            <div class="tt-task-bottom">
                                <div class="tt-task-table">
                                    <div class="tt-task-location">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                    <div class="tt-task-price">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                        Бюджет: <span>5 000 грн. (Середній)</span>
                                    </div>
                                    <div class="tt-task-date">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                        24.04.2017
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space marg-sm-b30 marg-lg-b50"></div>


                        <div class="tt-pagination clearfix">
                            <a href="#" class="button type-1 btn-simple icon-left uppercase tt-pagination-left"><span>попередні</span></a>
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="hidden-xs"><a href="#">4</a></li>
                                <li class="hidden-xs"><a href="#">5</a></li>
                                <li class="disabled"><span>...</span></li>
                                <li><a href="#">21</a></li>
                                <li><a href="#">22</a></li>
                                <li><a href="#">23</a></li>
                            </ul>
                            <a href="#" class="button type-1 btn-simple icon-right uppercase tt-pagination-right"><span>наступні</span></a>
                        </div>-->
                    </div>

                    <div class="tab-entry" style="display: none;">
                        <div class="empty-space marg-lg-b25"></div>
<!--
                        <div class="tabs-block style-2">
                            <div class="tab-nav">
                                <div class="tab-menu active">Всі <span class="count-large">(4)</span></div>
                                <div class="tab-menu">Я надіслав пропозиції <span class="count-large">(2)</span></div>
                                <div class="tab-menu">Отримані пропозиції <span class="count-large">(2)</span></div>
                                <div class="tab-menu">Прийняв до виконання <span class="count-large">(3)</span></div>
                                <div class="tab-menu">Виконані <span class="count-large">(5)</span></div>
                                <div class="tab-menu">Скасовані <span class="count-large">(2)</span></div>
                            </div>
                            <div class="tab-entry" style="display: block;">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>

                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">я надіслав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>15 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="tt-reply style-2 tt-editable-wrapper fade-anim">
                                                    <div class="tt-reply-check active">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAAUVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////8IN+deAAAAGnRSTlMA4y0jCu/UvqqkU0o/GPjx7N/dybNvZ14RBGTFjyIAAABaSURBVBgZ7cFHDoQwAATBcSDDklP//6Ggvdu+IkSVPq/QdEpZyZWwQam4HSoFHPqroVRANVjdalgUMpI5qYFCQZ3BeAuFIlzPlDGfirE/yL3iWoxXSuv0ebAL0TQDs9umvyoAAAAASUVORK5CYII=" alt="">
                                                    </div>
                                                    <div class="tt-reply-top">
                                                        <div class="row vertical-middle">
                                                            <div class="col-sm-6 col-lg-8">
                                                                <img class="tt-reply-img" src="img/reply/user.jpg" alt="">
                                                                <a class="tt-reply-name" href="professionals-detail.html">24/7 Electrical Company</a>
                                                            </div>
                                                            <div class="col-sm-6 col-lg-4">
                                                                <div class="tt-reply-right">
                                                                    <div class="tt-review-date">
                                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                                        <span>24.04.2017</span>
                                                                    </div>
                                                                    <div class="tt-dropdown style-2 dark">
                                                                        <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                                                        <div class="tt-dropdown-entry">
                                                                            <div class="tt-dropdown-overlay"><span></span></div>
                                                                            <div class="tt-dropdown-close button-close small"></div>
                                                                            <ul>
                                                                                <li><a href="#">Видалити</a></li>
                                                                                <li><a href="#">Відмінити</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tt-reply-edit tt-editable-click">
                                                                        <img class="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable">
                                                        <div class="tt-editable-item  simple-text size-3" data-rel="title">
                                                            <p>Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</p>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable-form">
                                                        <form>
                                                            <textarea class="simple-input height-2" name="title">Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</textarea>
                                                            <div class="empty-space marg-lg-b30"></div>
                                                            <div class="tt-editable-form-btn">
                                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">Прийняв до виконання</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Виконано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">скасовано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Штукатурка стелі</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>5 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-entry">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>

                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                        <span class="tt-task-proposed-count">2</span>
                                                        <span> майстрів відповіли</span>
                                                    </a>
                                                    <div class="tt-task-status">я надіслав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="tt-reply style-2 tt-editable-wrapper fade-anim">
                                                    <div class="tt-reply-check active">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAAUVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////8IN+deAAAAGnRSTlMA4y0jCu/UvqqkU0o/GPjx7N/dybNvZ14RBGTFjyIAAABaSURBVBgZ7cFHDoQwAATBcSDDklP//6Ggvdu+IkSVPq/QdEpZyZWwQam4HSoFHPqroVRANVjdalgUMpI5qYFCQZ3BeAuFIlzPlDGfirE/yL3iWoxXSuv0ebAL0TQDs9umvyoAAAAASUVORK5CYII=" alt="">
                                                    </div>
                                                    <div class="tt-reply-top">
                                                        <div class="row vertical-middle">
                                                            <div class="col-sm-6 col-lg-8">
                                                                <img class="tt-reply-img" src="img/reply/user.jpg" alt="">
                                                                <a class="tt-reply-name" href="professionals-detail.html">24/7 Electrical Company</a>
                                                            </div>
                                                            <div class="col-sm-6 col-lg-4">
                                                                <div class="tt-reply-right">
                                                                    <div class="tt-review-date">
                                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                                        <span>24.04.2017</span>
                                                                    </div>
                                                                    <div class="tt-dropdown style-2 dark">
                                                                        <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                                                        <div class="tt-dropdown-entry">
                                                                            <div class="tt-dropdown-overlay"><span></span></div>
                                                                            <div class="tt-dropdown-close button-close small"></div>
                                                                            <ul>
                                                                                <li><a href="#">Видалити</a></li>
                                                                                <li><a href="#">Відмінити</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tt-reply-edit tt-editable-click">
                                                                        <img class="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable">
                                                        <div class="tt-editable-item  simple-text size-3" data-rel="title">
                                                            <p>Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</p>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable-form">
                                                        <form>
                                                            <textarea class="simple-input height-2" name="title">Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</textarea>
                                                            <div class="empty-space marg-lg-b30"></div>
                                                            <div class="tt-editable-form-btn">
                                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <a class="tt-task-proposed tt-icon-hover" href="professionals-work-detail.html">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                        <span class="tt-task-proposed-count">2</span>
                                                        <span> майстрів відповіли</span>
                                                    </a>
                                                    <div class="tt-task-status">я надіслав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>12 000 - 15 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="tt-reply style-2 tt-editable-wrapper fade-anim">
                                                    <div class="tt-reply-check">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAARVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////9SnXPCAAAAFnRSTlMArnG6p5KH0cvEwLShn5eMgndoWX5kNBFRcwAAAGtJREFUGBntwTcOg0AAAMEl52zv/59qhBAVd+4sF8zw+EdOXAq5lVtyKs25l7hwmE0IyUzZpXaENb5htSWmdtusiau04otGW+Iy19SMmM4UFhPCEl/sZnNCeksOkwP3RgtOowW3HLj08vi1D9pZBCai30olAAAAAElFTkSuQmCC" alt="">
                                                    </div>
                                                    <div class="tt-reply-top">
                                                        <div class="row vertical-middle">
                                                            <div class="col-sm-6 col-lg-8">
                                                                <img class="tt-reply-img" src="img/reply/user.jpg" alt="">
                                                                <a class="tt-reply-name" href="professionals-detail.html">24/7 Electrical Company</a>
                                                            </div>
                                                            <div class="col-sm-6 col-lg-4">
                                                                <div class="tt-reply-right">
                                                                    <div class="tt-review-date">
                                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                                        <span>24.04.2017</span>
                                                                    </div>
                                                                    <div class="tt-dropdown style-2 dark">
                                                                        <a class="tt-dropdown-link" href="#"><span class="tt-dropdown-icon"><i></i></span></a>
                                                                        <ul class="tt-dropdown-entry">
                                                                            <li><a href="#">Видалити</a></li>
                                                                            <li><a href="#">Відмінити</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="tt-reply-edit tt-editable-click">
                                                                        <img class="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable">
                                                        <div class="tt-editable-item  simple-text size-3" data-rel="title">
                                                            <p>Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</p>
                                                        </div>
                                                    </div>
                                                    <div class="tt-editable-form">
                                                        <form>
                                                            <textarea class="simple-input height-2" name="title">Nullam eros neque, ornare et lectus ut, euismod accumsan diam. In hac habitasse platea dictumst. Pellentesque semper vestibulum urna a varius. Aliquam id tortor eleifend lacus posuere placerat nec sed libero. Aenean leo justo, auctor sit amet pulvinar consectetur, laoreet ut sapien. Praesent fermentum lectus nisl, id elementum libero aliquam nec.</textarea>
                                                            <div class="empty-space marg-lg-b30"></div>
                                                            <div class="tt-editable-form-btn">
                                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-entry">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">отримав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>15 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">Отримав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">отримав пропозицію</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт будинку</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>15 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-entry">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">Прийняв до виконання</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">Прийняв до виконання</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status">Прийняв до виконання</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Ремонт квартири</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>20 000 - 30 000 грн. (Великий)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-entry">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Виконано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Виконано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Штукатурка стелі</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>5 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Виконано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="tab-entry">
                                <ul class="tt-massage-wrapper style-2">
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Скасовано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Скасовано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Штукатурка стелі</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>5 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tt-task">
                                            <div class="tt-task-top clearfix">
                                                <div class="tt-task-info">
                                                    <div class="tt-task-status finish">Скасовано</div>
                                                </div>
                                                <div class="tt-task-title"><a class="h5" href="professionals-work-detail.html">Потрібно укладання ламінату</a></div>
                                            </div>
                                            <div class="tt-task-txt simple-text size-3 blue-links">
                                                <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. Потрібно: - зміцнити 2 балки (поставити стовпи на цементній плиті), - настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі). - обшити стіни вагонкою (прокласти мінватою) 60 кв.м - встановити 2 перегородки (60 кв.м) з мінватою і внутрі ... <a href="professionals-work-detail.html">Дізнатись більше</a></p>
                                            </div>
                                            <div class="tt-task-bottom">
                                                <div class="tt-task-table">
                                                    <div class="tt-task-location">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt="">Львівська обл., м. Львів, <span class="nobr">пр. Чорновола 63 / 7</span></div>
                                                    <div class="tt-task-price">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                                                        Бюджет: <span>8 000 - 9 000 грн. (Середній)</span>
                                                    </div>
                                                    <div class="tt-task-date">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                        24.04.2017
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                    </div>


                   <div class="tab-entry" style="display: block;">
                       <? Pjax::begin();?>
                        <div class="empty-space marg-lg-b25"></div>
                        <!-- TT-TASK -->
                        <div class="tt-add-task pos-2">
                            <a href="<?=Url::to(['/members/member/addorder'])?>" class="button type-1 size-3 color-3 uppercase">Додати завдання</a>
                        </div>
                        <div class="tabs-block style-2 wth-btn">
                            <div class="tab-nav">
                                <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==false) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/member/list'])?>">Всі <span class="count-large">(<?=($count_total['total']>0) ? $count_total['total'] : '0'?>)</span></a></div>
                                <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==1) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/member/list/?status=1'])?>">Шукають виконавця <span class="count-large">(<?=($count_total['status_1']>0) ? $count_total['status_1'] : '0'?>)</span></a></div>
                                <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==2) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/member/list/?status=2'])?>"> Прийняті до виконання <span class="count-large">(<?=($count_total['status_2']>0) ? $count_total['status_2'] : '0'?>)</span></a></div>
                                <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==3) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/member/list/?status=3'])?>">Виконані <span class="count-large">(<?=($count_total['status_3']>0) ? $count_total['status_3'] : '0'?>)</span></a></div>
                                <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==4) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/member/list/?status=4'])?>">Скасовані <span class="count-large">(<?=($count_total['status_4']>0) ? $count_total['status_4'] :'0'?>)</span></a></div>

                            </div>
                            <div class="tab-entry" style="display: block;">

                                <?php

                                if (sizeof($model->getModels())) {

                                    echo \yii\widgets\ListView::widget([
                                        'dataProvider' => $model,
                                        'itemView' => function ($model, $key, $index, $widget) {
                                            return $this->render('@common/modules/members/views/list-item', ['model' => $model, 'url'=>'/members/member/order']);
                                        },
                                        'layout' => "\n{items}\n",
                                    ]);
                                } else {
                                    echo '<div class="alert alert-warning fade in alert-dismissable"><strong>Жодного замовлення не знайдено. </strong> </div>';
                                }

                                ?>
                            </div>

                        </div>
                       <? Pjax::end();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
