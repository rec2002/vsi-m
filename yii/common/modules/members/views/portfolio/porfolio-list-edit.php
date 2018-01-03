<?

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
$this->title = 'Виконані проекти  - Кабінет користувача';

?>
    <div class="tt-header-margin"></div>

    <div class="tt-bg-grey">
        <div class="container">
            <div class="tt-pageform-wrapper" style="height: 646px;">
                <div class="tabs-block style-1">
                    <div class="tab-nav">
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member'])?>"><span>Особисті дані</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/types'])?>"><span>Послуги та ціни</span></a>
                        <a class="tab-menu redirect active" href="<?=Url::to(['/members/member/portfolio'])?>"><span>Виконані проекти</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/resetpwd'])?>"><span>Змінити пароль</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/noticesettings'])?>"><span>Сповіщення</span></a>
                        <a class="tab-menu redirect" href="<?=Url::to(['/members/member/billing'])?>" ><span>Доступ до замовлень</span></a>
                    </div>

                    <div class="tab-entry" style="display: block;">
                        <div class="tab-entry-box pad2">
                            <!-- TT-PROJECT-EDIT -->
                            <div class="tt-project-edit-wrapper">
                                <div class="tt-project-list">
                                    <div class="row clear-sm-2  clear-md-3 clear-lg-3">
                                        <div class="col-sm-6 col-md-4">
                                            <a class="tt-project-add size-2">
                                                    <span class="tt-project-add-entry">
                                                        <span class="tt-project-add-icon"></span>
                                                        <span class="simple-text size-4">Додати проект</span>
                                                    </span>
                                            </a>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
<? if (sizeof($items)) foreach($items as $val) { ?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="tt-project">
                                                <div class="tt-project-img">
                                                    <a class="custom-hover open-popup-big" href="javascript:" rel="nofollow" name="<?=$val['id']?>" data-id="<?=$val['id']?>">
                                                        <img class="img-responsive" src="/uploads/members/portfolio/thmb/<?=$val['image']?>" alt="">
                                                    </a>
                                                    <a class="tt-project-img-edit  tt-icon-hover"  href="javascript:" rel="nofollow" data-id="<?=$val['id']?>">
                                                            <span class="tt-icon-entry">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAAbFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIJRPKbAAAAI3RSTlMAPAlExnwY9/Tes6tADQWv5tvPjlk07YZ5cGpOKxPruqosIBzH4BAAAACPSURBVBjTjcxZEoIwFETRJkSIQBiEoExOvf89avwiL5bl/TzV1ZClK750IEcX6UBXz0yFLkqfaiy04qH5uJ4CNQ9dep+6QDNkplC6ZRWqOhZ+v9fc6x11W0LqWyom/2kDpHu9/NBC6MwVqpMKk+dDrJbbwJtUJKOnTSj6HkCjhcK0z6o3Ui3J6zmxCHOeol5ZkAnV8yzXAAAAAABJRU5ErkJggg==" alt="">
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAMAAADzapwJAAAATlBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAP+0nkAAAAGXRSTlMAB/ZCPHsX3a3Gsw3t5s+OWTQrhnBqTrog08duEwAAAH5JREFUGNOtzEkSwyAMRFEhCGYMQ2wnff+LJniHyNJ/ocUrVZNMd/rTA0ht0YqmDmihp/JPRSeiWHCX+31S7v7yfZvUkuWgfIaeVW1h/C/qSGVHq5KGuV+D0ANd6oiZ66oRtuItlUwaZIVSKb/jvFDi/NGFpUYA6WUizbVBS1+HhQbeVMBQMQAAAABJRU5ErkJggg==" alt="">
                                                            </span>
                                                    </a>
                                                </div>
                                                <a class="tt-project-title open-popup-big" href="javascript:" rel="nofollow" data-id="<?=$val['id']?>"><?=$val['title']?></a>
                                                <div class="simple-text size-2 blue-links">
                                                    <p><?= Html::encode( mb_strimwidth($val['description'], 0, 200, '...')); ?> <a class="open-popup-big" href="javascript:" rel="nofollow" data-id="<?=$val['id']?>"><b>Дізнатись більше</b></a></p>
                                                </div>
                                                <div class="tt-project-info">
                                                    <div class="tt-project-table">
                                                        <div class="tt-project-cell">
                                                            вартість робіт <span><?=(empty($val['cost'])) ? '(не вказано)' : $val['cost'] ?></span>
                                                        </div>
                                                        <div class="tt-project-cell">
                                                            дата проведення <span><?=date('m/Y', strtotime($val['work_date']))?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="button type-1 full open-popup-big" href="javascript:" rel="nofollow" data-id="<?=$val['id']?>">Переглянути проект</a>
                                            </div>
                                            <div class="empty-space marg-lg-b30"></div>
                                        </div>
<? } ?>

                                    </div>
                                </div>
                                <div class="tt-project-new">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b0 marg-lg-b40"></div>
            </div>
        </div>
        <div class="tt-devider"></div>
    </div>
<?


echo $this->registerJs("(function(){




        
})();" , \yii\web\View::POS_END );


$bundle = AppAsset::register(Yii::$app->view);
$bundle->js[] = '/js/portfolio.js'; // dynamic file added


?>