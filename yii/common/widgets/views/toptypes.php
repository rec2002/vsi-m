<?

use yii\helpers\Url;
use common\components\MemberHelper;

?>


    <div class="row row10">

<? if (sizeof($TopTypes)) foreach ($TopTypes as $val){ ?>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="<?=Url::to(['professionals/', 'cat'=>MemberHelper::UrlSlug($val['name'])])?>">
                    <span class="tt-service-entry">
                        <img src="<?=(!empty($val['image'])) ? '/uploads/types/'.$val['image'] : '/uploads/types/no-photo-64x64.png' ?>" alt="">
                        <span class="tt-service-title"><?=$val['name']?></span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
<? } ?>


    </div>
