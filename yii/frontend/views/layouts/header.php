<?

use yii\bootstrap\Nav;
use yii\helpers\Url;
?>

<!-- HEADER -->

<?  if (!Yii::$app->user->isGuest) { ?>

<?  if (\Yii::$app->user->can('majster')) {  ?>


        <header class="tt-header user">
            <div class="top-inner-container">
                <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
                <div class="cmn-toggle-switch"><span></span></div>
            </div>
            <div class="toggle-block">
                <div class="toggle-block-container">
                    <div class="nav-left">
                        <nav class="main-nav">
                            <ul>
                                <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Замовлення</a></li>
                                <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Моя сторінка</a></li>
                                <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Каталог майстрів</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="nav-right">
                        <ul class="nav-more">
                            <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;"><b>Поповнити баланс</b></a> <div class="tt-info-btn tt-tooltip bottom" data-tooltip="Документи та достовірність внесеної інформації перевірені адміністраціює сайту">?</div></li>
                        </ul>
                        <ul class="tt-profile-nav">
                            <li><a class="tt-icon-entry tt-icon-hover" href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAVFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJFwZtrAAAAG3RSTlMAEQrpFPKFKGY2Dfff4x+jmNnRxbKwb1I3NAgz8zm9AAAAiElEQVQY03WQWQ7DIAwFXzA4KZA03Rff/54FIURJnPmckQw2DrEkCrTgxoPCekEgo4wJAnrMZufdOYWRZ7/10ykH1NI8Sqil+RrA5P99DaU03wUhX7x0gaPntCxGN3WjOBrgKc7Jq3s8+4R/f77dd5NXF7xH9STHR7yyHXbYNWIJohDyEkYB+AEsQQrnu/RtDgAAAABJRU5ErkJggg==" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAV1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDL/BPzAAAAHHRSTlMACBIQ6PIUhShmNA3eCvfj6h+jmDbRxbKwb1I3gtXc3QAAAIdJREFUGNN1kFkOwyAMBV9aqElYErovvv85S5AQcuLM54xksHHIxbDCkvGks8ItIC1RGZMY5j3HnbfXEhzNfuvH+xrQSveYamil+xZAxgvfQi3di8ClVM8iUPBkMuDsKEZRiMCHreWveLx6wP+mQXy3eHXBV1BPcnzEB50UytlzYoXkAAwKwB+yGwxHrDpidQAAAABJRU5ErkJggg==" alt="">
                                    <span>0</span></a></li>
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
                                    <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Виконанні проекти</a></li>
                                    <li><a href="<?=Url::to(['/members/member/resetpwd'])?>">Змінити пароль</a></li>
                                    <li><a href="<?=Url::to(['/members/member/noticesettings'])?>">Сповіщеня</a></li>
                                    <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Доступ до замовлень</a></li>
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

    <header class="tt-header user">
        <div class="top-inner-container">
            <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
            <div class="cmn-toggle-switch"><span></span></div>
        </div>
        <div class="toggle-block">
            <div class="toggle-block-container">
                <div class="nav-left">
                    <a href="<?=Url::to(['/members/customregistration/create'])?>" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                    <nav class="main-nav">
                        <ul>
                            <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Мої замовлення</a></li>
                            <li><a href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">Каталог майстрів</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="nav-right">
                    <ul class="tt-profile-nav">
                        <li><a class="tt-icon-entry tt-icon-hover" href="javascript:" onclick="alert('UNDER CONSTRUCTION'); return false;">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAVFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkJFwZtrAAAAG3RSTlMAEQrpFPKFKGY2Dfff4x+jmNnRxbKwb1I3NAgz8zm9AAAAiElEQVQY03WQWQ7DIAwFXzA4KZA03Rff/54FIURJnPmckQw2DrEkCrTgxoPCekEgo4wJAnrMZufdOYWRZ7/10ykH1NI8Sqil+RrA5P99DaU03wUhX7x0gaPntCxGN3WjOBrgKc7Jq3s8+4R/f77dd5NXF7xH9STHR7yyHXbYNWIJohDyEkYB+AEsQQrnu/RtDgAAAABJRU5ErkJggg==" alt="">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAUCAMAAACgaw2xAAAAV1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDL/BPzAAAAHHRSTlMACBIQ6PIUhShmNA3eCvfj6h+jmDbRxbKwb1I3gtXc3QAAAIdJREFUGNN1kFkOwyAMBV9aqElYErovvv85S5AQcuLM54xksHHIxbDCkvGks8ItIC1RGZMY5j3HnbfXEhzNfuvH+xrQSveYamil+xZAxgvfQi3di8ClVM8iUPBkMuDsKEZRiMCHreWveLx6wP+mQXy3eHXBV1BPcnzEB50UytlzYoXkAAwKwB+yGwxHrDpidQAAAABJRU5ErkJggg==" alt="">
                                <span>14</span></a></li>
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
                                <li><a href="<?=Url::to(['/members/customer', '#'=>'notification'])?>">Сповіщеня</a></li>
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
                <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
                <div class="cmn-toggle-switch"><span></span></div>
            </div>
            <div class="toggle-block">
                <div class="toggle-block-container">
                    <div class="nav-right">
                        <a href="<?=Url::to(['/members/login'])?>" class="button type-1 icon-left close" style="float:none;opacity: 1;text-shadow:none;"><span>Відмінити реєстрацію</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

<? } else { ?>
<header class="tt-header <?=($isHome)? 'home' : ''?>">
    <div class="top-inner-container">
        <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
        <div class="cmn-toggle-switch"><span></span></div>
    </div>
    <div class="toggle-block">
        <div class="toggle-block-container">
            <div class="nav-left">
                <a href="<?=Url::to(['/members/customregistration/create'])?>" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                <?=Nav::widget([
                    'items' => [
                        ['label' => 'Каталог майстрів', 'url' => ['/site/category'], 'class' =>'button type-1 btn-simple'],
                        ['label' => 'Як це працює', 'url' => ['/site/howitwork'], 'class' =>'button type-1 btn-simple'],

                    ],
                    'options' => ['class' =>'main-nav'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
            </div>


            <div class="nav-right">
                <a href="<?=Url::to(['/members/registration'])?>" class="button type-1">Реєстрація майстра</a>
                <div class="nav-more">
                    <a href="<?=Url::to(['/members/login'])?>">Вхід</a>
                </div>
            </div>
        </div>
    </div>
</header>
<? } ?>

<? } ?>
