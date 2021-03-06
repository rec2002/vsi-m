<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\MemberHelper;



?>

<div class="col-md-4 col-sm-6 col-xs-12 item">
    <div class="tt-project style-2">
        <div class="tt-project-img">
            <a class="custom-hover" href="<?=Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>MemberHelper::UrlSlug($model->title)])?>">
                <img class="img-responsive" src="<?=(!empty($model->image)) ? '/uploads/publish/'.$model->image : '/uploads/publish/no-image-300x200.png' ?>" alt="<?= Html::encode($model->title); ?>">
            </a>
        </div>
        <?= Html::a(Html::encode($model->title), Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>MemberHelper::UrlSlug($model->title)]), ['title' => $model->title, 'class' =>'tt-project-title']) ?>
        <div class="simple-text size-2">
            <p><?= Html::encode($model->short_desc); ?></p>
        </div>
        <?= Html::a(Html::encode('Дізнатись більше'), Url::toRoute(['site/publish', 'id' => $model->id, 'slug'=>MemberHelper::UrlSlug($model->title)]), ['class' =>'button type-1 full']) ?>
    </div>
    <div class="empty-space marg-lg-b30"></div>
</div>
