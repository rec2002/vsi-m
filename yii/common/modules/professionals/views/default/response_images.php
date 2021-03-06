<?
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="empty-space marg-xs-b15 marg-lg-b20"></div>
<div class="tt-two-slider tt-project-slider">
    <div class="custom-arrows">

<? if (sizeof($images)>1) { ?>
        <div class="custom-arrows-prev tt-arrow-prev pos-2 style-2 hidden-xs hidden-sm"></div>
        <div class="custom-arrows-next tt-arrow-next pos-2 style-2 hidden-xs hidden-sm"></div>
<? } ?>

        <div class="swiper-container swiper-control-top" data-lazy="1" data-space-between="30">
            <div class="swiper-wrapper">
<? foreach ($images as $val) {?>
                <div class="swiper-slide">
                    <div class="tt-project-preview swiper-lazy" data-background="/uploads/members/responses/<?=$val->image?>">
                        <div class="swiper-lazy-preloader"></div>
                    </div>
                </div>
<? } ?>
            </div>
            <div class="swiper-pagination relative-pagination hidden"></div>
        </div>
    </div>
    <div class="swiper-container swiper-control-bottom" data-slides-per-view="auto" data-lazy="1" data-space-between="10" data-center="1" data-clicked-slide="1">
        <div class="swiper-wrapper">
<? if (sizeof($images)>1)  foreach ($images as $val) {?>
            <div class="swiper-slide">
                <div class="tt-project-thumb">
                    <img src="/uploads/members/responses/thmb/<?=$val->image?>" style="height: 67px;" alt="">
                </div>
            </div>
<? } ?>
        </div>
        <div class="swiper-pagination relative-pagination hidden"></div>
    </div>
</div>

