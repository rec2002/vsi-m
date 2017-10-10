<div class="tt-header-margin"></div>
<div class="tt-bg-grey">
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
        <h2 class="tt-banner-title h2 small text-center">Новини</h2>
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>

        <!-- TT-PROJECT STYLE-2  -->
        <div class="row clear-lg-3 clear-md-3 clear-sm-3">
<?php
echo \yii\widgets\ListView::widget([
        'dataProvider' => $publish_items,
        'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('publishitem',['model' => $model]);

        // or just do some echo
        // return $model->title . ' posted by ' . $model->author;
        },
        'layout' => "\n{items}\n",
])

?>
        </div>
        <div class="empty-space marg-sm-b0 marg-lg-b25"></div>

        <!-- TT-PAGINATION -->
        <div class="tt-pagination clearfix">

<?php
echo \yii\widgets\LinkPager::widget([
        'pagination' => $publish_items->pagination,
        'linkOptions' => [''],
        'options' => ['class'=>''],
        'nextPageCssClass' => 'button type-1 btn-simple icon-right uppercase tt-pagination-right',
        'nextPageLabel' => 'наступні',
        'prevPageCssClass' =>'button type-1 btn-simple icon-left uppercase tt-pagination-left',
        'prevPageLabel' => 'попередні'

])
?>
<!--
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
        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
    </div>
</div>