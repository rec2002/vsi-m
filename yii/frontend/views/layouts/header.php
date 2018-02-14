<?
use yii\bootstrap\Nav;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\components\MemberHelper;
?>

<!-- HEADER -->

<?  if (!Yii::$app->user->isGuest) {
    $bundle = AppAsset::register(Yii::$app->view);
    $bundle->js[] = 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js';
    $bundle->js[] = 'js/socket/online.js';
?>
<?  if (\Yii::$app->user->can('majster')) {  ?>
        <header class="tt-header user" data-id="<?=Yii::$app->user->identity->getId();?>">
            <div class="top-inner-container majster">
                <a class="logo" href="/"><img src="/img/logo.svg" width="206" height="51" alt=""></a>
                <div class="cmn-toggle-switch"><span></span></div>
            </div>
            <div class="toggle-block">
                <div class="toggle-block-container">
                    <div class="nav-left">
                        <nav class="main-nav">
                            <ul>
                                <li><a href="<?=Url::to(['/orders'])?>">Замовлення</a></li>
                                <li class="<?=in_array($this->context->action->id, array('profile')) ? 'active' : '' ?>"><a href="<?=Url::to(['/members/member/profile'])?>">Моя сторінка</a></li>
                                <li class="<?=in_array(Yii::$app->controller->id, array('professionals')) ? 'active' : '' ?>"><a href="<?=Url::to(['/professionals'])?>">Каталог майстрів</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="nav-right">
                        <ul class="nav-more">
<? if (Yii::$app->user->identity->balance>0) {?>
                            <li><a href="<?=Url::to(['/members/member/billing'])?>"><b>Ваш баланс: <?=number_format(Yii::$app->user->identity->balance, 2 , ',' , ' ')?> грн.</b></a></li>
<? } else {?>
                            <li><a href="<?=Url::to(['/members/member/billing'])?>"><b>Поповнити баланс</b></a> <div class="tt-info-btn tt-tooltip bottom" data-tooltip="Треба шось написати">?</div></li>
<? } ?>
                        </ul>
                        <ul class="tt-profile-nav">
                            <li><a class="tt-icon-entry tt-icon-hover" href="<?=Url::to(['/members/msg'])?>">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAVFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJFwZtrAAAAG3RSTlMAEQrpFPKFKGY2Dfff4x+jmNnRxbKwb1I3NAgz8zm9AAAAiElEQVQY03WQWQ7DIAwFXzA4KZA03Rff/54FIURJnPmckQw2DrEkCrTgxoPCekEgo4wJAnrMZufdOYWRZ7/10ykH1NI8Sqil+RrA5P99DaU03wUhX7x0gaPntCxGN3WjOBrgKc7Jq3s8+4R/f77dd5NXF7xH9STHR7yyHXbYNWIJohDyEkYB+AEsQQrnu/RtDgAAAABJRU5ErkJggg==" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAV1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDL/BPzAAAAHHRSTlMACBIQ6PIUhShmNA3eCvfj6h+jmDbRxbKwb1I3gtXc3QAAAIdJREFUGNN1kFkOwyAMBV9aqElYErovvv85S5AQcuLM54xksHHIxbDCkvGks8ItIC1RGZMY5j3HnbfXEhzNfuvH+xrQSveYamil+xZAxgvfQi3di8ClVM8iUPBkMuDsKEZRiMCHreWveLx6wP+mQXy3eHXBV1BPcnzEB50UytlzYoXkAAwKwB+yGwxHrDpidQAAAABJRU5ErkJggg==" alt="">
<? $count = MemberHelper::GetCountMessages(Yii::$app->user->identity->getId());?>
                                    <span id="total_unread" style="display:<?=($count>0) ? 'block': 'none' ?>"><?=$count?></span>
                                </a>
                            </li>
                        </ul>

                        <div class="tt-profile">
                            <div class="tt-profile-hover">
                                <img class="tt-profile-img" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/header/user.png';?>" alt="<?=Yii::$app->user->identity->first_name; ?>">
                                <span class="tt-profile-name"><?=(!empty(Yii::$app->user->identity->company)) ? Yii::$app->user->identity->company : Yii::$app->user->identity->first_name ?></span>
                                <img class="tt-profile-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGCAMAAADAMI+zAAAAM1BMVEUAAAAtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkOWchbXAAAAEXRSTlMA/P63pE01JhjElJGDfnJfQVsZ+r8AAAAwSURBVAgdBcGHAYAwEAQg7lOM3f2nFeQBuOOtCzhrMOqAXh/MdFomsKXt2QBWsuAHH3AAtyQEGooAAAAASUVORK5CYII=" alt="">
                            </div>
                            <div class="tt-profile-dropdown">
                                <ul>
                                    <li><a href="<?=Url::to(['/members/member'])?>">Особисті дані</a></li>
                                    <li><a href="<?=Url::to(['/members/member/types'])?>">Послуги та ціни</a></li>
                                    <li><a href="<?=Url::to(['/members/portfolio/list'])?>">Виконанні проекти</a></li>
                                    <li><a href="<?=Url::to(['/members/member/resetpwd'])?>">Змінити пароль</a></li>
                                    <li><a href="<?=Url::to(['/members/member/noticesettings'])?>">Сповіщення</a></li>
                                    <li><a href="<?=Url::to(['/members/member/billing'])?>">Доступ до замовлень</a></li>
                                </ul>
                                <a href="<?=Url::to(['/members/login/logout'])?>" class="button type-1 size-2 full">Вихід</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <? } ?>

    <?  if (\Yii::$app->user->can('zamovnyk')) {  ?>

    <header class="tt-header user"  data-id="<?=Yii::$app->user->identity->getId();?>">
        <div class="top-inner-container zamovnyk">
            <a class="logo" href="/"><img src="/img/logo.svg" width="206" height="51" alt=""></a>
            <div class="cmn-toggle-switch"><span></span></div>
        </div>
        <div class="toggle-block">
            <div class="toggle-block-container">
                <div class="nav-left">
                    <a href="<?=Url::to(['/orders/default/addorder'])?>" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                    <nav class="main-nav">
                        <ul>
                            <li class="<?=in_array($this->context->action->id, array('list')) ? 'active' : '' ?>"><a href="<?=Url::to(['/orders/default/myorders'])?>">Мої замовлення</a></li>
                            <li class="<?=in_array(Yii::$app->controller->id, array('professionals')) ? 'active' : '' ?>"><a href="<?=Url::to(['/professionals'])?>">Каталог майстрів</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="nav-right">
                    <ul class="tt-profile-nav">
                        <li><a class="tt-icon-entry tt-icon-hover" href="<?=Url::to(['/members/msg'])?>">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAVFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJFwZtrAAAAG3RSTlMAEQrpFPKFKGY2Dfff4x+jmNnRxbKwb1I3NAgz8zm9AAAAiElEQVQY03WQWQ7DIAwFXzA4KZA03Rff/54FIURJnPmckQw2DrEkCrTgxoPCekEgo4wJAnrMZufdOYWRZ7/10ykH1NI8Sqil+RrA5P99DaU03wUhX7x0gaPntCxGN3WjOBrgKc7Jq3s8+4R/f77dd5NXF7xH9STHR7yyHXbYNWIJohDyEkYB+AEsQQrnu/RtDgAAAABJRU5ErkJggg==" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAV1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDL/BPzAAAAHHRSTlMACBIQ6PIUhShmNA3eCvfj6h+jmDbRxbKwb1I3gtXc3QAAAIdJREFUGNN1kFkOwyAMBV9aqElYErovvv85S5AQcuLM54xksHHIxbDCkvGks8ItIC1RGZMY5j3HnbfXEhzNfuvH+xrQSveYamil+xZAxgvfQi3di8ClVM8iUPBkMuDsKEZRiMCHreWveLx6wP+mQXy3eHXBV1BPcnzEB50UytlzYoXkAAwKwB+yGwxHrDpidQAAAABJRU5ErkJggg==" alt="">
<? $count = MemberHelper::GetCountMessages(Yii::$app->user->identity->getId()); ?>
                                <span id="total_unread" style="display:<?=($count>0) ? 'block': 'none' ?>"><?=$count?></span>

                            </a>
                        </li>
                    </ul>

                    <div class="tt-profile">
                        <div class="tt-profile-hover">
                            <img class="tt-profile-img" src="<?=!empty(Yii::$app->user->identity->avatar_image) ? Yii::$app->user->identity->avatar_image : '/img/header/user.png';?>" alt="<?=Yii::$app->user->identity->first_name; ?>">
                            <span class="tt-profile-name"><?=Yii::$app->user->identity->first_name; ?></span>
                            <img class="tt-profile-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAGCAMAAADAMI+zAAAAM1BMVEUAAAAtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkMtNkOWchbXAAAAEXRSTlMA/P63pE01JhjElJGDfnJfQVsZ+r8AAAAwSURBVAgdBcGHAYAwEAQg7lOM3f2nFeQBuOOtCzhrMOqAXh/MdFomsKXt2QBWsuAHH3AAtyQEGooAAAAASUVORK5CYII=" alt="">
                        </div>
                        <div class="tt-profile-dropdown">
                            <ul>
                                <li><a href="<?=Url::to(['/members/customer', '#'=>'personal_data'])?>">Особисті дані</a></li>
                                <li><a href="<?=Url::to(['/members/customer', '#'=>'notification'])?>">Сповіщення</a></li>
                                <li><a href="<?=Url::to(['/members/customer', '#'=>'change_password'])?>">Змінити пароль</a></li>
                            </ul>
                            <a href="<?=Url::to(['/members/login/logout'])?>" class="button type-1 size-2 full">Вихід</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<? } ?>

<? } else { ?>


<? if (Yii::$app->controller->id=='registration') { ?>
    <header class="tt-header register">
        <div class="container tt-header-entry">
            <div class="top-inner-container">
                <a class="logo" href="/"><img src="/img/logo.svg" width="206" height="51" alt=""></a>
                <div class="cmn-toggle-switch"><span></span></div>
            </div>
            <div class="toggle-block">
                <div class="toggle-block-container">
                    <div class="nav-right">
<? if (@$_GET['id']!=6) { ?>
                        <a href="<?=Url::to(['/members/login'])?>" class="button type-1 icon-left close" style="float:none;opacity: 1;text-shadow:none;"><span>Відмінити реєстрацію</span></a>
<? } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

<? } else { ?>
<header class="tt-header <?=($isHome)? 'home' : ''?>">
    <div class="top-inner-container">
        <a class="logo" href="/"><img src="/img/logo.svg" width="206" height="51" alt=""></a>
        <div class="cmn-toggle-switch"><span></span></div>
    </div>
    <div class="toggle-block">
        <div class="toggle-block-container">
            <div class="nav-left">
                <a href="<?=Url::to(['/members/customregistration/create'])?>" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                <?=Nav::widget([
                    'items' => [
                        ['label' => 'Замовлення', 'url' => ['/orders'], 'class' =>'button type-1 btn-simple'],
                        ['label' => 'Каталог майстрів', 'url' => ['/site/category'], 'class' =>'button type-1 btn-simple'],
                        ['label' => 'Як це працює', 'url' => ['/site/howitwork'], 'class' =>'button type-1 btn-simple'],

                    ],
                    'options' => ['class' =>'main-nav'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
            </div>


            <div class="nav-right">
                <a href="<?=Url::to(['/members/registration'])?>" class="button type-1">Реєстрація виконроба</a>
                <div class="nav-more">
                    <a href="<?=Url::to(['/members/login'])?>">Вхід</a>
                </div>
            </div>
        </div>
    </div>
</header>
<? } ?>

<? } ?>
