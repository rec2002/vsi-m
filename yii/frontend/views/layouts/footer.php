<?

use yii\bootstrap\Nav;

?>

<!-- TT-FOOTER -->
<footer class="tt-footer">
    <div class="tt-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?=Nav::widget([
                        'items' => [
                            ['label' => 'Про нас', 'url' => ['site/about']],
                            ['label' => 'Контакти', 'url' => ['site/contact']],
                            ['label' => 'Питання та відповіді', 'url' => ['site/faq']],
                            ['label' => 'Правила користування', 'url' => ['site/privacy']],
                            ['label' => 'Як це працює', 'url' => ['site/howitwork']],
                        ],
                        'options' => ['class' =>'tt-footer-nav'], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>

                </div>
                <div class="col-sm-4">
                    <div class="tt-footer-social">
                        <div class="tt-footer-social-label">Ми соцмережах:</div>
                        <ul class="tt-social">
                            <li>
                                <a href="#">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAATlBMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkIyeT03AAAAGXRSTlMA9xWm8OZnTT4h3sCPVRwH6tCak4hvYl5Bt5UDEgAAAF9JREFUOMvtz7sOgCAQRNEFAQERfOv+/48q0X4oLPfUN5kMCfGrslkz94QlfjiCtOUpudAQKu4I035XPIxeE3BariI8cyiuDAz15b5pqCheqEV+X2OhOeTGMEezkhDYDUcUBB78BRSGAAAAAElFTkSuQmCC" alt="">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMA9xUf56bwkGdNPt7AYFUH0JqIb0Eqn9RgAAAAWklEQVQ4y+3NNxKAMAwFUcvIGTDp3/+qhKGXCpfa+s2ss6yh9YPjVhQw4SnLzjM45UkBCcEpWD0J81q9BBfGWysipA9GEfor/2uxTtidpokQBkNoYYvJWZbcDVfMA36iUqtCAAAAAElFTkSuQmCC" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
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