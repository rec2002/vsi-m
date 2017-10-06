<?

use yii\bootstrap\Nav;

?>

<!-- HEADER -->
<header class="tt-header <?=($isHome)? 'home' : ''?>">
    <div class="top-inner-container">
        <a class="logo" href="/"><img src="/img/header/logo_icon.png" alt=""><img src="/img/header/logo_text.png" alt=""></a>
        <div class="cmn-toggle-switch"><span></span></div>
    </div>
    <div class="toggle-block">
        <div class="toggle-block-container">
            <div class="nav-left">
                <a href="new_task_1.html" class="button type-1 button-plus color-3"><span></span>Додати замовлення</a>
                <?=Nav::widget([
                    'items' => [
                        ['label' => 'Каталог майстрів', 'url' => ['site/category'], 'class' =>'button type-1 btn-simple'],
                        ['label' => 'Як це працює', 'url' => ['site/howitwork'], 'class' =>'button type-1 btn-simple'],

                    ],
                    'options' => ['class' =>'main-nav'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
            </div>
            <div class="nav-right">
                <a href="master-register.html" class="button type-1">Реєстрація майстра</a>
                <div class="nav-more">
                    <a href="login.html">Вхід</a>
                </div>
            </div>
        </div>
    </div>
</header>