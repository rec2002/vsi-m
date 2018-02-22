<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\MemberHelper;
use common\models\Seo;
$seo = new Seo([
        'title'=>$publish_detail[0]->attributes['title'],
        'desctiption'=>$publish_detail[0]->attributes['short_desc'],
        'canonical'=> Url::toRoute(['site/publish', 'id' => $publish_detail[0]->attributes['id'], 'slug'=>MemberHelper::UrlSlug($publish_detail[0]->attributes['title'])])
]);

$seo->title();
$seo->desctiption();
$seo->canonical();
?>
    <div class="tt-header-margin"></div>
    <!-- TT-BANNER TYPE-6 -->
    <div class="tt-banner type-6 no-overlay background-block" style="background-image:url(/img/imgblock/banner_14.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="empty-space marg-lg-b70"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="empty-space marg-sm-b30 marg-lg-b50"></div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="tt-date">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                        <span><?=date("d.m.Y", strtotime($publish_detail[0]->attributes['date_publish']));?></span>
                    </div>
                    <div class="empty-space marg-xs-b10"></div>
                    <h2 class="h2"><?= Html::encode($publish_detail[0]->attributes['title']); ?></h2>
                    <div class="empty-space marg-lg-b20"></div>
                    <div class="simple-text size-4">
                        <?=$publish_detail[0]->attributes['content']; ?>
                    </div>
                    <div class="empty-space marg-lg-b35"></div>
                    <!--<div class="tt-footer-social style-3">
                        <div class="tt-footer-social-label">Поділитись:</div>
                        <ul class="tt-social">
                            <li>
                                <a href="#">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAMFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkL9SS24AAAAD3RSTlMA8ar2FOsaJ4J2YUbomFmePvt7AAAAWUlEQVQoz2MYBdgAm+J/MBBKQBJ0/Q8FIUiC+jDBT0iC8jDBj0iC9v///+oHCX5GVfmd/T5MJULwNwPLZCyCDI8xBL+z9GCxaCLMIkwnEXI8wpvYA2QUYAEAROhw+W9H9KAAAAAASUVORK5CYII=" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAKlBMVEUAAAD///////////////////////////////////////////////////+Gu8ovAAAADXRSTlMA8ar2FOsaXieCdkaY2mYu3wAAAFlJREFUKM9jGAXYAJviXTAQSkASdL0LBSFIgrowwUtIgrIwwYtIgrZ3716fCxK8jKryBsdZmEqE4G0GlsVYBBmKMQRvsEzFYtFCmEWYTiLkeIQ3sQfIKMACAMW+YqMi/OZzAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <div class="empty-space marg-sm-b40 marg-lg-b80"></div>

            <h3 class="h3 text-center">Читайте також</h3>
            <div class="empty-space marg-lg-b25"></div>
            <div class="row">
            <?php
                echo \yii\widgets\ListView::widget([
                    'dataProvider' => $publish_last,
                    'itemView' => function ($model, $key, $index, $widget) {
                        return $this->render('publishitem',['model' => $model]);
                    },
                    'layout' => "\n{items}\n",
                ])

            ?>
            </div>
            <div class="empty-space marg-sm-b10 marg-lg-b55"></div>
        </div>
    </div>
