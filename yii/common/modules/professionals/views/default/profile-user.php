<?
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\components\MemberHelper;
$this->title = 'Сторінка замовника';

?>


    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper">

                <!-- TT-MASTERBOX USER -->
                <div class="tt-masterbox user">
                    <div class="tt-masterbox-top clearfix">
                        <div class="tt-masterbox-img">
                            <img class="img-responsive" src="<?=!empty($member->avatar_image) ? $member->avatar_image : '/img/person/person.png';?>" alt="">
                        </div>
                        <div class="tt-masterbox-top-right">
                            <div class="tt-masterbox-topinfo">
                                <h5 class="tt-masterbox-title h4"><?=(!empty($member->company)) ? $member->company : $member->first_name.' '.$member->last_name.' '.$member->surname ?></h5>
                                <div class="tt-masterbox-location simple-text size-2">
                                    <p>Замовник</p>
                                </div>
                                <div class="tt-masterbox-average simple-text size-2">
                                    <p>На сайті <b><time class="timeago" datetime="<?=$member->created_at?>"></time></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b40 marg-lg-b50"></div>

                <h5 class="h5">Список замволень</h5>
                <div class="empty-space marg-lg-b20"></div>

                <!-- TT-TASK -->
                <? echo Yii::$app->controller->renderPartial('@common/modules/orders/views/default/list-partial', array('model' => $model))?>

                <div class="empty-space marg-lg-b30"></div>

            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
