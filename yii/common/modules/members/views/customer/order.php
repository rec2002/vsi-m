<?

use yii\helpers\Html;
use common\components\MemberHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;


$this->title = 'Замовлення';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
            <a href="<?=Yii::$app->request->referrer?>" class="button type-1 btn-simple icon-left uppercase"><span>назад</span></a>
            <div class="tt-task detail">
                <div class="tt-task-top clearfix">
                    <div class="tt-task-info">
                        <a class="tt-task-proposed tt-icon-hover" href="#">
                                <span class="tt-icon-entry">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                                </span>
                            <span class="tt-task-proposed-count">2</span>
                            <span> майстрів відповіли</span>
                        </a>
                        <div class="tt-dropdown">
                            <a class="tt-task-status tt-dropdown-link" href="#"><span>Шукає виконавця</span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGCAMAAADAMI+zAAAAM1BMVEUAAAAtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkOWchbXAAAAEXRSTlMA/P63pE01JhjElJGDfnJfQVsZ+r8AAAAwSURBVAgdBcGHAYAwEAQg7lOM3f2nFeQBuOOtCzhrMOqAXh/MdFomsKXt2QBWsuAHH3AAtyQEGooAAAAASUVORK5CYII=" alt=""></a>
                            <div class="tt-dropdown-entry">
                                <div class="tt-dropdown-overlay"><span></span></div>
                                <ul>
                                    <li><a href="#">Прийнято до виконання</a></li>
                                    <li><a href="#">Виконано</a></li>
                                    <li><a href="#">Скасованр</a></li>
                                    <li><a class="open-popup" data-rel="1" href="#">Видалити</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tt-task-title"><h5 class="h5">Ремонт будинку</h5></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div id="map-canvas" class="style-2 tt-imgbox-map" data-lat="49.839671" data-lng="23.995056" data-zoom="15"></div>
                        <div class="addresses-block">
                            <a class="marker" data-lat="49.839671" data-lng="23.989056" data-marker="/img/map/marker_3.png" ></a>
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
                                        Коли додано: <span><?=date('d.m.Y', strtotime($model->created_at)); ?></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature tt-editable-wrapper slide-anim">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAV1BMVEUAAAAvLy8yMjIyMjIxMTExMTEwMDAyMjIxMTExMTEvLy8xMTExMTEzMzMyMjIyMjIyMjIyMjIyMjIyMjIxMTEwMDAxMTExMTExMTEzMzMyMjIxMTExMTESmlYFAAAAHXRSTlMABDLwpEUPsk5KC1I216uDeXRgQisb09HBvouIV2mZyFEAAABmSURBVAgdBcGHAYJAEACw3Fc6Cnbdf04TWErOJYHo10a79EBPRLB0litDSgOXpDQVqlZkTjjJMhUq2TZJE1PSNuPIrdYbwyhWQKzBMQLDgXhM0J4B9zfidQfmnX0G+My/LwClBPwBNpUDNDLhzEoAAAAASUVORK5CYII=" alt="">
                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Адреса:
                                        <span class="tt-editable-item" data-rel="title"><?=$model->location;?></span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <?php $form4 = ActiveForm::begin(['id' => 'edit_location',
                                            'options' => ['class'=>'form-edit-ajax'],
                                            'enableAjaxValidation'=>true,
                                            'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=location&id='.$model->id),
                                            'action' =>['/members/customer/saveorder/?mode=location&id='.$model->id],

                                           ]); ?>
                                            <?=$form4->field($model, 'location')->textInput(['value'=>$model->location, 'class' => 'simple-input', "id"=>"tt-google-single-autocomplete", 'autocomplete'=>'off', 'placeholder' => "Введіть місце знаходження"])->label(false); ?>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="tt-task-feature tt-editable-wrapper slide-anim">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAYFBMVEUAAAArKysyMjIyMjIxMTEwMDAxMTEyMjIxMTEvLy8tLS0yMjIxMTEwMDAwMDAwMDAxMTEzMzMyMjIzMzMyMjIyMjIyMjIxMTEzMzMxMTExMTExMTExMTEzMzMxMTEyMjJ1eGjnAAAAIHRSTlMAA0GyNhSoijAKBsyYfhgQ2sa/qqF3b20+GtGPYldGJwSMA3IAAAB8SURBVBgZBcGHYQIxEAAw3dn+3uiQBNh/y0gAdJcAAK9rlgDANO8tSwDYfr7PUZYA4nbea0OWgHo8vYDs0Peh5ATGM8ub6f64rvA7qD3UWu/BX888guG2mpYVlwTC56gQJbEP7fQIIEoac5gbgCi5tVMAIEp2GwCIbgHwD1QcBCFl5hNiAAAAAElFTkSuQmCC" alt="">
                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Б’юджет:
                                        <span class="tt-editable-item" data-rel="title"><?=$budget[$model->budget]['budget']?></span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <div class="simple-select">
                                                <div class="SumoSelect sumo_title" tabindex="0"><select name="title" class="SumoUnder" tabindex="-1">
                                                        <option value="1 000 - 5 000 грн. (Малий)">1 000 - 5 000 грн. (Малий)</option>
                                                        <option value="5 000 - 12 000 грн. (Середній)">5 000 - 12 000 грн. (Середній)</option>
                                                        <option selected="" value="12 000 - 15 000 грн. (Великий)">12 000 - 15 000 грн. (Великий)</option>
                                                    </select><p class="CaptionCont SelectBox" title=" 12 000 - 15 000 грн. (Великий)"><span> 12 000 - 15 000 грн. (Великий)</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt"><label>1 000 - 5 000 грн. (Малий)</label></li><li class="opt"><label>5 000 - 12 000 грн. (Середній)</label></li><li class="opt selected"><label>12 000 - 15 000 грн. (Великий)</label></li></ul></div></div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature tt-editable-wrapper slide-anim">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJ1BMVEUAAAAyMjAyMjAyMjIvLy8yMjAxMTExMTAyMjEwMDAxMTAxMTAzMzIS37QgAAAADHRSTlMAQ0GREjQzYjUL2tlQexsFAAAAT0lEQVQI12NgYE1gDeAIYGCYpGwEgpoMCyEMaYYDbAmsCRwJPAwHGMAAmcF0iOeAjACQwaLCKODogMxgOgiWQihGiLCIQNRgGlhzBgyOAwAhOhym9cKdhgAAAABJRU5ErkJggg==" alt="">
                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Коли починати:
                                        <span class="tt-editable-item" data-rel="title">Будь коли</span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                        <form>
                                            <div class="simple-select task-duration">
                                                <div class="SumoSelect sumo_title" tabindex="0"><select name="title" class="SumoUnder" tabindex="-1">
                                                        <option selected="" value="show_dates">В період від ... до ...</option>
                                                        <option value="">Сьогодні</option>
                                                        <option value="">Завтра</option>
                                                    </select><p class="CaptionCont SelectBox" title=" В період від ... до ..."><span> В період від ... до ...</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt selected"><label>В період від ... до ...</label></li><li class="opt"><label>Сьогодні</label></li><li class="opt"><label>Завтра</label></li></ul></div></div>
                                            </div>
                                            <div class="task-duration-dates">
                                                <div class="tt-input-wrapper style-2">
                                                    <div class="tt-input-label">Від</div>
                                                    <div class="tt-input-entry">
                                                        <div class="simple-input-icon">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                            <input class="simple-input simple-datapicker hasDatepicker" data-min-date="0" placeholder="Виберіть дату" id="dp1510155041731" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tt-input-wrapper style-2">
                                                    <div class="tt-input-label">До</div>
                                                    <div class="tt-input-entry">
                                                        <div class="simple-input-icon">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                            <input class="simple-input simple-datapicker hasDatepicker" data-min-date="0" placeholder="Виберіть дату" id="dp1510155041732" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tt-editable-wrapper fade-anim">
                    <h6 class="tt-task-subtitle tt-editable-title">Інформація для довідки
                        <a class="tt-editable-btn tt-editable-click tt-icon-entry tt-icon-hover">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                        </a>
                    </h6>
                    <div class="tt-editable">
                        <div class="tt-editable-item tt-task-txt simple-text size-3" data-rel="title">
                            <p>Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. потрібно:</p>
                            <ul>
                                <li>зміцнити 2 балки (поставити стовпи на цементній плиті),</li>
                                <li>настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі).</li>
                                <li>обшити стіни вагонкою (прокласти мінватою) 60 кв.м</li>
                                <li>встановити 2 перегородки (60 кв.м) з мінватою і внутрішні двері (3 шт).</li>
                                <li>фарбування стелі</li>
                                <li>провести нову проводку</li>
                                <li>можливо, заміна 7 вікон (1300х800)</li>
                            </ul>
                            <p>Терміни виконання принципові - не пізніше першої декади червня. Попередньо можу надати фото приміщення
                            </p>
                        </div>
                    </div>
                    <div class="tt-editable-form">
                        <form>
                                <textarea class="simple-input" name="title">Порожній будинок 50 км.від В.Новгород, розчищено. Приміщення 6.2х7.7, вис. стелі 2.40. потрібно:

зміцнити 2 балки (поставити стовпи на цементній плиті),

настелити нову підлогу, вирівнявши (настил дсп \ пінопласт \ ламінат), 50 кв.м. Предв. настелити 6 кв.м дошкою (дірка з-під печі).

обшити стіни вагонкою (прокласти мінватою) 60 кв.м

встановити 2 перегородки (60 кв.м) з мінватою і внутрішні двері (3 шт).

фарбування стелі

провести нову проводку

можливо, заміна 7 вікон (1300х800)

Терміни виконання принципові - не пізніше першої декади червня. Попередньо можу надати фото приміщення</textarea>
                            <div class="empty-space marg-lg-b30"></div>
                            <div class="tt-editable-form-btn">
                                <a href="#" class="tt-editable-close button type-1">Відмінити</a>
                                <div class="button type-1 color-3">Зберегти<input type="submit"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <h6 class="tt-task-subtitle">Фото:</h6>

                <div class="tt-project-new-img tt-task-gal-edit">
                    <div class="button-upload tt-icon-hover tt-img-upload">
                            <span class="tt-icon-entry">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAclBMVEUAAAA7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZeykJCtAAAAJXRSTlMAKNBtnGHm1enbRBn3r6qhcx0T4ZllUj0zLse3k4AHlpJnWFUK0CMq7AAAAKdJREFUGNNNzVcShCAQBNAGFRF1zTlsnPtfcQlK0T9UveoeEGTkRSFqhOlpn6aDqoBiUsgBRe+AlnYVmcKT31TRwmib+xQf6YkxKoFRIunuIWvoAeRyx1pePy6W2ozjIOZasx3mmiL6XkNmWo3gqCkx9KLJUitS3YoMDaTAS3NLk2tBVsBsb3mCexs9rGmAS7dBtzp/y2SkWEUFP82PPoksRHz+0sHLH6CfC0vDb7GcAAAAAElFTkSuQmCC" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAe1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igC3rmZwAAAAKHRSTlMAbemc5dXRJmUrHRn326+qoXNhQZlSE9/Mx7eTgFpIPDMwB5aSZ1UKZrVu5QAAAKpJREFUGNNNjUcSgzAQBAcBIhgwGZMxTvv/F3olQKU+dk2ARSOTxCtgU9NYrRPllnKpQgxU9LFUdOtFuuAlL5XTM6Jhq33MwqggoIxvBELvKgYx3YGbGNFn52OkVdtJTBTplNrKOJU+4ND3LAYqFQuJgkowb1q1aj2fUw6YkCrIjFWqVAiFyIHt2pqhOQZiLhacOugGcMpsaRpyFyeRu3o0lCLx3P3nh8b8AUc2DFhDAdVcAAAAAElFTkSuQmCC" alt="">
                            </span>
                        Додати зображення
                        <input type="file">
                    </div>
                    <div class="empty-space marg-lg-b10"></div>
                    <div class="tt-project-pic-loaded">
                        <span style="background-image:url(img/task/gal_1.jpg);"></span>
                        <div class="button-close small">
                        </div></div>
                    <div class="tt-project-pic-loaded">
                        <span style="background-image:url(img/task/gal_2.jpg);"></span>
                        <div class="button-close small"></div>
                    </div>
                    <div class="tt-project-pic-loaded">
                        <span style="background-image:url(img/task/gal_3.jpg);"></span>
                        <div class="button-close small"></div>
                    </div>
                    <div class="tt-project-pic-loaded">
                        <span style="background-image:url(img/task/gal_4.jpg);"></span>
                        <div class="button-close small"></div>
                    </div>
                    <div class="tt-project-pic-loaded">
                        <span style="background-image:url(img/task/gal_5.jpg);"></span>
                        <div class="button-close small"></div>
                    </div>
                </div>
            </div>
<?
    $gpJsLink= 'http://maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
    echo $this->registerJsFile($gpJsLink);

    $options = '{"types":["(cities)"],"componentRestrictions":{"country":"ua"}}';
    echo $this->registerJs("(function(){
            var input = document.getElementById('tt-google-single-autocomplete');
            var options = $options;        
            searchbox = new google.maps.places.Autocomplete(input, options);
            
    })();" , \yii\web\View::POS_END );

    echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);

?>
