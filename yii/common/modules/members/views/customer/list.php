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

            <div class="tt-pageform-wrapper">
            <? Pjax::begin(['scrollTo' => 0]);?>
                <!-- TT-TASK -->
                <h4 class="h4">Мої замовлення</h4>
                <div class="empty-space marg-lg-b15"></div>
                <div class="tt-add-task">
                    <a href="<?=Url::to(['/members/customer/addorder'])?>" class="button type-1 size-3 color-3 uppercase">додати замовлення</a>
                </div>
                <div class="tabs-block style-2 wth-btn">
                    <div class="tab-nav">
                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==false) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/customer/list'])?>">Всі <span class="count-large">(<?=$count_total['total']?>)</span></a></div>
                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==1) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/customer/list/?status=1'])?>">Шукають виконавця <span class="count-large">(<?=$count_total['status_1']?>)</span></a></div>
                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==2) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/customer/list/?status=2'])?>"> Прийняті до виконання <span class="count-large">(<?=$count_total['status_2']?>)</span></a></div>
                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==3) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/customer/list/?status=3'])?>">Виконані <span class="count-large">(<?=$count_total['status_3']?>)</span></a></div>
                        <div class="tab-menu redirect tab-fadeout <?=(((Yii::$app->getRequest()->getQueryParam('status'))==4) ? 'active' : '' )?>"><a href="<?=Url::to(['/members/customer/list/?status=4'])?>">Скасовані <span class="count-large">(<?=$count_total['status_4']?>)</span></a></div>
                    </div>
                    <div class="tab-entry" style="display: block;">


                        <?php







                        if (sizeof($model->getModels())) {

                            echo \yii\widgets\ListView::widget([
                                'dataProvider' => $model,
                                'itemView' => function ($model, $key, $index, $widget) {
                                    return $this->render('@common/modules/members/views/list-item', ['model' => $model, 'url'=>'/members/customer/order']);
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
        <div class="tt-devider"></div>
    </div>

