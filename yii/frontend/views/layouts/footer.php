<?

use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

<? if (Yii::$app->controller->id!='registration') { ?>


<? //if ($this->context->action->id!='profile') {?>
    <!-- POP UP SMALL BEGIN -->
    <div class="popup-wrapper_">
        <div class="bg-layer"></div>
        <div class="popup-content active">
            <div class="layer-close"></div>
            <div class="popup-container size-2">
                <div class="popup-align">
<? if (isset($this->blocks['custom_container'])){ echo $this->blocks['custom_container'];  } ?>
                </div>
                <div class="button-close"></div>
            </div>
        </div>
    </div>
    <!-- POP UP SMALL END -->




    <!-- POPUP-WRAPPER -->
    <div class="popup-wrapper-big">
        <div class="bg-layer"></div>
        <div class="popup-content active">
            <div class="layer-close"></div>
            <div class="popup-container size-5 gallery">
                <div class="popup-align" id="popup-wrapper-big-content">
                </div>
                <div class="button-close"></div>
            </div>
        </div>
    </div>

    <div class="popup-wrapper-confirm">
    <div class="bg-layer"></div>
    <div class="popup-content active">
        <div class="layer-close"></div>
        <div class="popup-container size-4">
            <div class="popup-align">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h3 class="h3 text-center">  </h3>
                            <div class="empty-space marg-sm-b30 marg-lg-b35"></div>

                            <div class="simple-text size-3 bold-style-2">
                                <p>  </p>
                            </div>
                            <div class="empty-space marg-lg-b30"></div>

                        </div>
                    </div>
                    <div class="tt-popup-btn-center">
                        <?= Html::a('<span>продовжити</span>', '', ['class'=>'button type-1 size-3 color-3 uppercase', 'id'=>'btnYes']) ?>
                        <?= Html::a('<span>скасувати</span>', '', ['class'=>'button type-1 size-3 uppercase', 'id'=>'btnNo']) ?>
                    </div>
            </div>
            <!--<div class="button-close"></div>-->
        </div>
    </div>
    </div>



    <?// }  ?>

    <? if (Yii::$app->controller->module->id=='orders' && $this->context->action->id=='index') {?>
        <?=\common\widgets\FilterTypes::widget() ?>
    <?  } ?>

    <?=\common\widgets\Infromer::widget() ?>







<!-- TT-FOOTER -->
<footer class="tt-footer">
    <div class="tt-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-11">
                    <?=Nav::widget([
                        'items' => [
                            ['label' => 'Про нас', 'url' => ['/site/about']],
                            ['label' => 'Контакти', 'url' => ['/site/contact']],
                            ['label' => 'Питання та відповіді', 'url' => ['/site/faq']],
                            ['label' => 'Правила користування', 'url' => ['/site/privacy']],
                            ['label' => 'Як це працює', 'url' => ['/site/howitwork']],
                            ['label' => 'Блог', 'url' => ['/site/publish']],
                        ],
                        'options' => ['class' =>'tt-footer-nav'], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>

                </div>
                <div class="col-sm-1">
                    <div class="tt-footer-social" style="white-space: nowrap">
                        <!--<div class="tt-footer-social-label">Ми соцмережах:</div>-->
                        <ul class="tt-social">
                            <li>
                                <a href="https://www.facebook.com/Виконроб-177988659475902/" target="_blank">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCKuf5iGPRJPfOiFt0mazdjQ" target="_blank">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAMFBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkL9SS24AAAAD3RSTlMA8ar2FOsaJ4J2YUbomFmePvt7AAAAWUlEQVQoz2MYBdgAm+J/MBBKQBJ0/Q8FIUiC+jDBT0iC8jDBj0iC9v///+oHCX5GVfmd/T5MJULwNwPLZCyCDI8xBL+z9GCxaCLMIkwnEXI8wpvYA2QUYAEAROhw+W9H9KAAAAAASUVORK5CYII=" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoBAMAAAB+0KVeAAAAKlBMVEUAAAD///////////////////////////////////////////////////+Gu8ovAAAADXRSTlMA8ar2FOsaXieCdkaY2mYu3wAAAFlJREFUKM9jGAXYAJviXTAQSkASdL0LBSFIgrowwUtIgrIwwYtIgrZ3716fCxK8jKryBsdZmEqE4G0GlsVYBBmKMQRvsEzFYtFCmEWYTiLkeIQ3sQfIKMACAMW+YqMi/OZzAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<? } ?>