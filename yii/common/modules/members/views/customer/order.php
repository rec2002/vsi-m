<?

use yii\helpers\Html;
use common\components\MemberHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

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
                            <span class="tt-task-proposed-count">0</span>
                            <span> майстрів відповіли</span>
                        </a>
                        <div class="tt-dropdown">
                            <a class="tt-task-status status<?=$model['status']?>" href="javascript:"><span><?=MemberHelper::STATUS[$model['status']]?></span></a>
                            <!--<a class="tt-task-status tt-dropdown-link" href="#"><span>Шукає виконавця</span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGCAMAAADAMI+zAAAAM1BMVEUAAAAtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkOWchbXAAAAEXRSTlMA/P63pE01JhjElJGDfnJfQVsZ+r8AAAAwSURBVAgdBcGHAYAwEAQg7lOM3f2nFeQBuOOtCzhrMOqAXh/MdFomsKXt2QBWsuAHH3AAtyQEGooAAAAASUVORK5CYII=" alt=""></a>
                            <div class="tt-dropdown-entry">
                                <div class="tt-dropdown-overlay"><span></span></div>
                                <ul>
                                    <li><a href="#">Прийнято до виконання</a></li>
                                    <li><a href="#">Виконано</a></li>
                                    <li><a href="#">Скасованр</a></li>
                                    <li><a class="open-popup" data-rel="1" href="#">Видалити</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="tt-task-title"><h5 class="h5"><?=$model->title;?></h5></div>
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
                                    <?php

                                    $model->setScenario('location');
                                    $form4 = ActiveForm::begin(['id' => 'edit_location',
                                        'options' => ['class'=>'form-edit-order-ajax'],
                                        'enableAjaxValidation'=>true,
                                        'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=location&id='.$model->id),
                                        'action' =>['/members/customer/saveorder/?mode=location&id='.$model->id],

                                    ]); ?>

                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Адреса:
                                        <span class="tt-editable-item" data-rel="title"><?=$model->location;?></span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">

                                            <?=$form4->field($model, 'location')->textInput(['class' => 'simple-input', "id"=>"tt-google-single-autocomplete-only", 'autocomplete'=>'off', 'placeholder' => "Введіть місце знаходження"])->label(false); ?>
                                             <?=$form4->field($model, 'region')->hiddenInput(['id'=>'tt-google-single-autocomplete-region'])->label(false); ?>

                                            <a class="tt-map-search button type-1 size-3 full color-3 uppercase" href="javascript:" style="display:none;">знайти на карті</a>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>

                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </li>

                            <li>
                                <div class="tt-task-feature tt-editable-wrapper slide-anim">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAYFBMVEUAAAArKysyMjIyMjIxMTEwMDAxMTEyMjIxMTEvLy8tLS0yMjIxMTEwMDAwMDAwMDAxMTEzMzMyMjIzMzMyMjIyMjIyMjIxMTEzMzMxMTExMTExMTExMTEzMzMxMTEyMjJ1eGjnAAAAIHRSTlMAA0GyNhSoijAKBsyYfhgQ2sa/qqF3b20+GtGPYldGJwSMA3IAAAB8SURBVBgZBcGHYQIxEAAw3dn+3uiQBNh/y0gAdJcAAK9rlgDANO8tSwDYfr7PUZYA4nbea0OWgHo8vYDs0Peh5ATGM8ub6f64rvA7qD3UWu/BX888guG2mpYVlwTC56gQJbEP7fQIIEoac5gbgCi5tVMAIEp2GwCIbgHwD1QcBCFl5hNiAAAAAElFTkSuQmCC" alt="">
                                    <?php
                                    $model->setScenario('budget');
                                    $form3 = ActiveForm::begin(['id' => 'edit_budget',
                                        'options' => ['class'=>'form-edit-order-ajax'],
                                        'enableAjaxValidation'=>true,
                                        'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=budget&id='.$model->id),
                                        'action' =>['/members/customer/saveorder/?mode=budget&id='.$model->id],

                                    ]); ?>

                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Б’юджет:
                                        <span class="tt-editable-item" data-rel="title"><?=$budget[$model->budget]['budget']?></span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">
                                            <div class="simple-select">

                                                <?

                                                echo $form3->field($model, 'budget')->widget(Select2::classname(), [
                                                    'data' => ArrayHelper::getColumn($budget, 'budget'),
                                                    'language' => 'uk',
                                                    'hideSearch' => true,
                                                    'size' => Select2::LARGE,
                                                    'theme' => Select2::THEME_BOOTSTRAP,
                                                    'pluginOptions' => [
                                                        'allowClear' => false,
                                                        'tabindex' => '3'
                                                    ],
                                                ])->label(false);

                                                ?>

                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </li>
                            <li>
                                <div class="tt-task-feature tt-editable-wrapper slide-anim">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAJ1BMVEUAAAAyMjAyMjAyMjIvLy8yMjAxMTExMTAyMjEwMDAxMTAxMTAzMzIS37QgAAAADHRSTlMAQ0GREjQzYjUL2tlQexsFAAAAT0lEQVQI12NgYE1gDeAIYGCYpGwEgpoMCyEMaYYDbAmsCRwJPAwHGMAAmcF0iOeAjACQwaLCKODogMxgOgiWQihGiLCIQNRgGlhzBgyOAwAhOhym9cKdhgAAAABJRU5ErkJggg==" alt="">
                                    <?php

                                    $model->setScenario('when_start');
                                    $form5 = ActiveForm::begin(['id' => 'edit_when_start',
                                        'options' => ['class'=>'form-edit-order-ajax'],
                                        'enableAjaxValidation'=>true,
                                        'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=when_start&id='.$model->id),
                                        'action' =>['/members/customer/saveorder/?mode=when_start&id='.$model->id],

                                    ]); ?>

                                    <div class="tt-task-feature-entry tt-editable tt-editable-click">
                                        Коли починати:
                                        <span class="tt-editable-item" data-rel="title">
                                              <?


/*
                                                   if($model->when_start==1)
                                                       echo 'В період від '.$model->date_from.' до '.$model->date_to;
                                                  elseif ($model->when_start==2 || $model->when_start==3)
                                                      echo $model->date_from;
                                                  elseif($model->when_start==4)echo 'Будь-коли';
*/
                                              ?>
                                        </span>
                                        <img class="tt-editable-btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="tt-editable-form">

                                            <div class="simple-select task-duration">
                                                <?

                                                echo $form5->field($model, 'when_start')->widget(Select2::classname(), [
                                                    'data' => MemberHelper::WHEN_START,
                                                    'language' => 'uk',
                                                    'hideSearch' => true,
                                                    'size' => Select2::LARGE,
                                                    'theme' => Select2::THEME_BOOTSTRAP,
                                                    'pluginOptions' => [
                                                        'allowClear' => false,
                                                        'tabindex' => '3'
                                                    ],
                                                ])->label(false);

                                                ?>

                                            </div>
                                            <div class="task-duration-dates" <?=($model->when_start>1) ? 'style="display:none;"' : '' ?>>
                                                <div class="tt-input-wrapper style-2">
                                                    <div class="tt-input-label">Від</div>
                                                    <div class="tt-input-entry">
                                                        <div class="simple-input-icon">
                                                            <img  style="top: 28px;"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                            <?= $form5->field($model, 'date_from')->textInput(['class' => 'simple-input simple-datapicker', 'autocomplete'=>'off',  'data-min-date'=>'0',  'placeholder' => "Виберіть дату", 'style' => 'margin-bottom: 0px;'])->label(false); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tt-input-wrapper style-2">
                                                    <div class="tt-input-label">До</div>
                                                    <div class="tt-input-entry">
                                                        <div class="simple-input-icon">
                                                            <img style="top: 28px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                                                            <?= $form5->field($model, 'date_to')->textInput(['class' => 'simple-input simple-datapicker', 'autocomplete'=>'off',  'data-min-date'=>'0',  'placeholder' => "Виберіть дату", 'style' => 'margin-bottom: 0px;'])->label(false); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-editable-form-btn">
                                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                                            </div>

                                    </div>
                                    <?php ActiveForm::end(); ?>
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

                    <?php

                    $model->setScenario('descriptions');
                    $form1 = ActiveForm::begin(['id' => 'edit_descriptions',
                        'options' => ['class'=>'form-edit-order-ajax'],
                        'enableAjaxValidation'=>true,
                        'validationUrl'=>Url::toRoute('/members/customer/validation/?mode=descriptions&id='.$model->id),
                        'action' =>['/members/customer/saveorder/?mode=descriptions&id='.$model->id],

                    ]); ?>

                    <div class="tt-editable">
                        <div class="tt-editable-item tt-task-txt simple-text size-3" data-rel="title">
                             <?=nl2br($model->descriptions);?>
                        </div>
                    </div>
                    <div class="tt-editable-form">

                        <?= $form1->field($model, 'descriptions')->textarea(['class' => 'simple-input height-2', 'maxlength'=>'800', 'placeholder' => "Опис замовлення", 'style' => 'margin-bottom: 10px;'])->label(false);  ?>
                        <div class="simple-text size-2 simple-input-max-count">Залишилося 800 символів</div>

                            <div class="tt-editable-form-btn">

                                <?= Html::resetButton('Відмінити', ['class' => 'tt-editable-close button type-1']) ?>
                                <?= Html::submitButton('Зберегти', ['class' => 'button type-1 color-3', 'name' => 'save']) ?>
                            </div>

                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <h6 class="tt-task-subtitle">Фото:</h6>

                <div class="tt-project-new-img tt-task-gal-edit">
                    <div class="button-upload tt-icon-hover tt-img-upload">
                            <span class="tt-icon-entry">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAclBMVEUAAAA7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZc7WZeykJCtAAAAJXRSTlMAKNBtnGHm1enbRBn3r6qhcx0T4ZllUj0zLse3k4AHlpJnWFUK0CMq7AAAAKdJREFUGNNNzVcShCAQBNAGFRF1zTlsnPtfcQlK0T9UveoeEGTkRSFqhOlpn6aDqoBiUsgBRe+AlnYVmcKT31TRwmib+xQf6YkxKoFRIunuIWvoAeRyx1pePy6W2ozjIOZasx3mmiL6XkNmWo3gqCkx9KLJUitS3YoMDaTAS3NLk2tBVsBsb3mCexs9rGmAS7dBtzp/y2SkWEUFP82PPoksRHz+0sHLH6CfC0vDb7GcAAAAAElFTkSuQmCC" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAARCAMAAAAIRmf1AAAAe1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igC3rmZwAAAAKHRSTlMAbemc5dXRJmUrHRn326+qoXNhQZlSE9/Mx7eTgFpIPDMwB5aSZ1UKZrVu5QAAAKpJREFUGNNNjUcSgzAQBAcBIhgwGZMxTvv/F3olQKU+dk2ARSOTxCtgU9NYrRPllnKpQgxU9LFUdOtFuuAlL5XTM6Jhq33MwqggoIxvBELvKgYx3YGbGNFn52OkVdtJTBTplNrKOJU+4ND3LAYqFQuJgkowb1q1aj2fUw6YkCrIjFWqVAiFyIHt2pqhOQZiLhacOugGcMpsaRpyFyeRu3o0lCLx3P3nh8b8AUc2DFhDAdVcAAAAAElFTkSuQmCC" alt="">
                            </span>
                        Додати зображення
                        <input type="file" name="file" data-source="<?=Url::to(['/members/customer/imageorder', 'id'=>$model->id])?>" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="empty-space marg-lg-b10"></div>
<? if (sizeof($images)) foreach ($images as $key=>$val) {?>
                    <div class="tt-project-pic-loaded" data-id="<?=$val->id; ?>" id="image_<?=$key?>">
                        <span style="background-image:url(/uploads/members/orders/thmb/<?=$val->image; ?>);"></span>
                        <div class="button-close small">
                        </div>
                    </div>
<? } ?>


                </div>
            </div>
<?
$gpJsLink= '//maps.googleapis.com/maps/api/js?' . http_build_query(array('libraries' => 'places', 'sensor' => 'false','key'=>'AIzaSyC9CXLB6tTD94qL3Jdxbesrx9Cj6fUUumE','language'=>'uk'));
echo $this->registerJsFile($gpJsLink);

    echo $this->registerJsFile('/js/map.js', ['depends' => 'yii\web\JqueryAsset']);
    echo $this->registerJsFile('/js/formatDate.js', ['depends' => 'yii\web\JqueryAsset']);
    echo $this->registerJsFile('/js/order.js', ['depends' => 'yii\web\JqueryAsset']);




?>
