<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="tt-header-margin"></div>
<div class="tt-bg-grey">
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
        <h2 class="tt-banner-title h2 small text-center">Новини</h2>
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>

        <div class="row clear-lg-3 clear-md-3 clear-sm-3 izotope-container">
            <div class="grid-sizer"></div>
<?php  $data= $publish_items->getModels();
if (sizeof($data)) foreach ($data as $model) { ?>

                <div class="col-md-4 col-sm-6 col-xs-12 item">
                    <div class="tt-project style-2">
                        <div class="tt-project-img">
                            <a class="custom-hover" href="<?=Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>$model->url_tag])?>">
                                <img class="img-responsive" src="<?=(!empty($model->image)) ? '/uploads/publish/'.$model->image : '/uploads/publish/no-image-300x200.png' ?>" alt="<?= Html::encode($model->title); ?>">
                            </a>
                        </div>
                        <?= Html::a(Html::encode($model->title), Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>$model->url_tag]), ['title' => $model->title, 'class' =>'tt-project-title']) ?>
                        <div class="simple-text size-2">
                            <p><?= Html::encode($model->short_desc); ?></p>
                        </div>
                        <?= Html::a(Html::encode('дізнатись більше'), Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>$model->url_tag]), ['class' =>'button type-1 full']) ?>
                    </div>
                    <div class="empty-space marg-lg-b30"></div>
                </div>

<? } ?>
        </div>
        <div class="empty-space marg-sm-b0 marg-lg-b25"></div>


        <!-- TT-PAGINATION -->
        <!-- TT-PAGINATION -->
        <nav aria-label="" class="tt-pagination clearfix">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">попередні</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">21</a></li>
                <li class="page-item"><a class="page-link" href="#">22</a></li>
                <li class="page-item"><a class="page-link" href="#">23</a></li>
                <li class="page-item"><a class="page-link" href="#">наступні</a></li>
            </ul>
        </nav>
        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>

        <?php
/*echo \yii\widgets\LinkPager::widget([
        'pagination' => $publish_items->pagination,
        'linkOptions' => [''],
        'options' => ['class'=>''],
        'nextPageCssClass' => 'button type-1 btn-simple icon-right uppercase tt-pagination-right',
        'nextPageLabel' => 'наступні',
        'prevPageCssClass' =>'button type-1 btn-simple icon-left uppercase tt-pagination-left',
        'prevPageLabel' => 'попередні'

])*/
?>

    </div>
</div>
<?
    echo $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', ['depends' => 'yii\web\JqueryAsset']);
?>