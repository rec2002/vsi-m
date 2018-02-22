<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Seo;
$seo = new Seo();

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tt-header-margin" ></div>
<!-- TT-BANNER TYPE-6 -->
<div class="tt-banner type-6 wth-swicher background-block" style="background-image:url(/img/imgblock/banner_19.jpg);">
    <div class="container">
        <div class="tt-swicher">
            <a class="active" href="<?=Url::to(['/site/howitwork'])?>">Замовник</a>
            <a href="<?=Url::to(['/site/howitworkmaster'])?>">Виконавець</a>
        </div>
        <h2 class="tt-banner-title h2 small light">Майстри поборються за Ваше замовлення</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="simple-text size-4 light">
                    <p>Негайте часу і додавайте свою компанію до списку таких самих професіоналів як Ви! Пошук клієнтів ще ніколи не був таким простим!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tt-bg-grey">
    <div class="tt-devider"></div>
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
        <h3 class="h3 text-center">Що таке “Виконроб”</h3>
        <div class="empty-space marg-lg-b20"></div>
        <div class="simple-text size-3">
            <p>На сайті <b>«Виконроб»</b> кожен замовник має змогу швидко знайти та замовити в режимі онлайн послуги кваліфікованих майстрів для виконання різних видів робіт. Ви завжди можете знайти професіонала, не покидаючи власну домівку.</p>

            <p>Будь-який замовник має можливість скористатись наступними перевагами нашого сервісу:</p>

            <p>
                <ul class="list-item type-3">
                <li>швидкий пошук відповідного виконавця (приватних майстрів, бригад і компаній по всій Україні);</li>
                <li>вільний доступ до контактних даних майстрів, що зголосились на замовлення; </li>
                <li>підтримка клієнтів;</li>
                <li>виконання замовлення по попередньо встановленій на сайті ціні.</li>
                </ul>
            </p>

            <p>Багато наших клієнтів вже залишили позитивні відгуки про виконавців та оцінили майстрів за такими критеріями, як: доступність для зв'язку; ввічливість; дотримання термінів виконання робіт; пунктуальність; точність оцінки вартості послуг; професіоналізм.</p>

            <p>Замовити майстра у Львові, Києві чи в Одесі можна просто зараз, залишивши заявку на замовлення Майстра на сайті, або скористатись формою швидкого пошуку виконавців робіт.</p>
        </div>



        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>

        <h3 class="h3 text-center">Що є на сайті “Виконроб”</h3>
        <div class="empty-space marg-lg-b10"></div>
        <div class="simple-text size-4 text-center">
            <p>Додайте заявку і отримаєте пропозиції з цінами від майстрів</p>
        </div>
        <div class="empty-space marg-sm-b30 marg-lg-b55"></div>

        <?=\common\widgets\TopTypes::widget() ?>

        <div class="empty-space marg-lg-b30"></div>
        <div class="text-center">
            <a href="<?=Url::to(['site/category'])?>" class="button type-1 size-3 color-1 uppercase">переглянути всі послуги</a>
        </div>

        <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
    </div>
    <div class="tt-devider"></div>
</div>
<div class="container">
    <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
    <h3 class="h3 text-center">Схема роботи сайту</h3>
    <div class="empty-space marg-sm-b30 marg-lg-b45"></div>
    <!-- TT-SERVICE TYPE-3 -->
    <div class="row">
        <div class="col-sm-4">
            <div class="tt-service type-3 grey">
                <div class="tt-service-entry">
                    <div class="tt-service-count">1</div>
                    <div class="tt-service-icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEoAAABKCAMAAAArDjJDAAAB11BMVEUAAAAZT4IWTYHO2eTq7/QnWokfUH/cgRQZT4IZT4IZT4IkWIgZT4IZT4IZT4IZT4IZT4IZT4KXsskhUX0ZT4IZT4IZT4IZT4IZT4IZT4K0xtchVYc3VnFwZVB+aUiQbT7eghLwhwiqvtGgcTWtdC6nvNAZT4IZT4IZT4IZT4IZT4IZT4I+a5YsVHdmY1bSfhn3iQTf5u7w8/ihcTW9zNsZT4IZT4IZT4IZT4IZT4IZT4IZT4IZT4L///9WrOAYT4IXTYH/igDO2uUQSH1Yr+NOqN8TSn74+vwUTIA4ZpO/ztxXruIXS36Fw+gWToR/wOgkYJT/jABQqd9RpNh1u+ZZseUcVYgbUYRYsOQRTYdNntMXTH9GcZpKm8/9iQGGxOlCWmtNp95EkMQUSHtIlssZUIMpW4sORnxFkcUjXpELS4pImM1Glcnx9PdUqd3/jgBQrOJPq+FPotZMndEmZZkwYI8MRXuf0O6HxuzF1eNHpd2futE3fbEzd6srbJ/Z4uvS3ee8zdxDj8MwcqYeV4pDWmp5veZuuOV+ud6bt85EkcVAi793m7tLdZwTTYUoU3kLQXf9jAHg5+7V4OlaseVxpspvocaFpcFYg6lVf6UmbKEmUnvphAxrKK7fAAAAPXRSTlMA3Pz6+vv8+avfBP380RWcZx/9/IdyYzYOCf7+/v7+/v7+/f38+/TKeltMKf39/f39+/n39e3pyMWmi1VSKm8FqQAAA7hJREFUWMPV2Odf00AYwPGAsyBFZLv33nvyHDRgJJWpUlrr6rIKtOwNspQtuNcf63Ntci1NQ66fwxd+3/DpBX5cSe6SIqGC4htZQvKKzkgxO2ED3M7RS0QIoHxJsuMXxSGWctRg5IxUjKXg4Sohu8/W0GnlAYQO3xO0KZtAlmQDQt6JpjZvUcAmZWGqaiNSWSzVX/+QGpj98VS39HXgYXzw29LTVD9n4wfr+w2p90PVVPTXikPXV+fupGOdb5WQI9VKDx5DQx8MqfrqipiwEwC0i8XT5qJDrjYfGDjDFSo92PTINNWAKaIgWvRjihrzOVORBTxmmQotDg4OTgQVllI72iZfrTXplSs4Un3D+Pp+L0thy/U4FZZ4UnP4up2lzGU+KyS7ZEbNIBX6Pj4+XhVMfoNub0KHzJ+CFirpDKqjkEDCXpk/RVKuK7+TANGBb+oxV0rt8bGf8pDu2O+XvR4PSfCNfuFKyf5pCMQBjGIpNjjyJElPl8r3BuVmr86NP6IPJsEFw5NCqsxUMGoSnouB13+eUtOtENlA5TiDHd3uuO7ESVe7tEGmu9lyk3G1TQdaNIERWSuNsjF2bPq1bH21E50T3Kq+cAx8DZluyGzhGFI9WLJO7QmiAKbeuvSFY4D7A89+tau9vf1TUGEpXDgGuGvxpIbphsxSlGrEt4vOGVJie7uWMt5xMtnbHYu1ExO7cwmm2H3w1WvN/HxXJnu74kAAmEp3d27xc+7tYScwxJ/mmYF7b5fHfB6d70mzGhtzB3AwMTzCl1K7xsINceGGSe39uRbwhS481aGap9jzFeqMvtQ1Ras10aaXCdFObZQ9Xxmf+jTPGXyRGDOOmjz1CfhXqc+iqcssdWyToKu5JJYCyBYGoKWIMJZSakSxVO8DUS2g/dkH7wu6lKufQfFPXrGUbaNSNukE4B1GNFWbTSCPfgpX9uyqFXKsF09hkVRGr6uQQ0hIwYhdku7AhiiW0F1Ip67VRB2kUyLFlJ3K377GcSz9nnmR1sxHbO1Y+/35JXYpvXJMvTmy+iyt1aOtmLJLfE4BtO69WGni2Qy2TvKVcq7jpA5EzFKNR97gtMq4UqcBls8dqjR1aO8y57RybDip/RHzVOQAnVY5R6oUT1/hwcZKc3/oSSzhSN3ESe3DkrnIfpzWtRzLUgFOaseFdVONB7fitE5bpm7hpM5HGtcV2YfTsllNyw4ArVe2WThKV0+pRaoIUOFWC4WA8tYvlceXsiWgCta/qICPZQqVnuD+v+pOaa2/T6DEE2i/CmMAAAAASUVORK5CYII=" alt="">
                    </div>
                    <a class="tt-service-title h5" href="<?=Url::to(['/members/registration'])?>">Зареєструйтесь на сайті</a>
                    <div class="simple-text size-3">
                        <p>Дайте відповідь на кілька питань, щоб ми могли підібрати вам майстрів.</p>
                    </div>
                    <div class="tt-service-arrow"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAABGCAMAAAAU0y/9AAAASFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYMgmkPAAAAGHRSTlMAnoIGCxOkax6RlY57XlVQRT00LiglZEu98idvAAAAqElEQVQ4y5WUSRKEIBAEFXUAlU1g/P9P/UAeqj1mVERJ0vQSF/reP+J1Jzodht0guq8YTgXxbyP63BiOgehxYtg3ohsXVs86DqLhYh3doCNng//O/i/WwYW+GnQ01nGyDp6w++FCDJdk0DEc+5/sX6duYpv8ZyXhiWU7IcrWm5dv01ecEnmiui4gZ911x5clv8JqENDkrRGDvI2wKhVdwMBNywLkDR4Jfl59BMbKnkUFAAAAAElFTkSuQmCC" alt=""></div>
                </div>
            </div>
            <div class="empty-space marg-sm-b60"></div>
        </div>
        <div class="col-sm-4">
            <div class="tt-service type-3 grey">
                <div class="tt-service-entry">
                    <div class="tt-service-count">2</div>
                    <div class="tt-service-icon">
                        <img src="data:image/png;base64,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" alt="">
                    </div>
                    <a class="tt-service-title h5" href="<?=Url::to(['/orders'])?>">Контактуйте із замовниками</a>
                    <div class="simple-text size-3">
                        <p>Обговорюйте особливості, які терміни, ціноутворення і обсяг робіт.</p>
                    </div>
                    <div class="tt-service-arrow"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAABGCAMAAAAU0y/9AAAASFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYMgmkPAAAAGHRSTlMAnoIGCxOkax6RlY57XlVQRT00LiglZEu98idvAAAAqElEQVQ4y5WUSRKEIBAEFXUAlU1g/P9P/UAeqj1mVERJ0vQSF/reP+J1Jzodht0guq8YTgXxbyP63BiOgehxYtg3ohsXVs86DqLhYh3doCNng//O/i/WwYW+GnQ01nGyDp6w++FCDJdk0DEc+5/sX6duYpv8ZyXhiWU7IcrWm5dv01ecEnmiui4gZ911x5clv8JqENDkrRGDvI2wKhVdwMBNywLkDR4Jfl59BMbKnkUFAAAAAElFTkSuQmCC" alt=""></div>
                </div>
            </div>
            <div class="empty-space marg-sm-b60"></div>
        </div>
        <div class="col-sm-4">
            <div class="tt-service type-3 grey">
                <div class="tt-service-entry">
                    <div class="tt-service-count">3</div>
                    <div class="tt-service-icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABKCAMAAAAv++J+AAAC9FBMVEUAAAAZT4ITRXgGRosaUINas+cAOnMjXpFUqt2gtsvZ4uoQS4cub6MZT4IvcaQZT4IZT4IZT4L///8YT4IYToEZT4IaUIMbUIEZT4IZT4IAPHRMnNFMndEZT4IZT4JgvPARSocZT4IZT4IZT4IZT4IRRHcAOnNfuu////8nZJcQRHgWSn0YToEvcqUub6MkYJMZT4IZT4IZT4L7igIZT4Jeue7siAv///8OP3IeUYMbUoVKWGVdt+wvTXcANnAPQ3ddtutZseX///9XreFTp9wSRXj9/f7q7/QvcaVNn9NLm88bU4YdVYlHlclIc5sZT4IZT4IZT4IZT4IZT4IZT4IZT4IZT4IANnENPXEYToEYTYESRHghVYcUR3oAOnPg6O45gbSiuM01eq4oZppIl8ora55FksZAi74ZT4JxkrMwc6Z1lbQZT4IZT4IZT4IZT4L2igYPQooANG9TbGQPR3w5X3IPQookTHsAN3FSptoQQXQ7UHDLfh48YHDEfiMAPJYlYpUTR3q3eSnp7vP///8BO3QAN3Ha4us0eawGQHhQotby9fgiXJAkWoscU4ZOeKATSoWswNJUqt5oi60oWou/zt1Qo9gSRXhDj8Noi62yxNV/nrtYsOQ5gLSVrsWCn7yht8wxYY+pvdE5gLRZgKYrap4wcqUtbaEZT4IZT4IZT4IZT4JZsuZctekaUIMAOHLbhhZZseXbhhYvWHctV3cmYpRjv/NTp9uWcjyVcjxRpdni6e82ZZJUqNtMdp0paJo4ZpIZT4JNeJ9On9NbgaanvM9fhKgvcaUxc6YZT4IubqItbaAZT4IZT4IZT4L/igD///9WrOAXToNWreEUSHsUTYQWTYAEQHc1ZZEQSH1aseYWSn4AQ44ZUINbtOgXTYBDZG0bUIMPS4dcteoaUIEYToFYsOQERI0KR4lfue4MRXsKRHoQQnUNSYgcUYATRnpjwfVduOwSSn4IQ3lctOgPQHQAQJIXTYEFPXZBY25HZmtnxvopvUqHAAAAznRSTlMA4v7+9ffgxdjM5Pm6/LwJBsb72NEp+fUVDP3p5GQc/vm+LCIQ/v77+vnx3dzKwcG4cDr9+ff39vb17+7t7e3r6enn5uPj4NvT0tLSz8nDr6Wgk4BWSjT5+PPp6Obg3drY0tDOzcjExMK6urWXjSYS/Pv7+vn5+PX08/Ly8vDv7e3t7ezr6enk4uLf3t7c3Nva2dfX1dPR0c7Ozc3MzMvGw8PCwb69tLN6c11Q/vf39/Xz8/Hx7evr5OLc2tXT09HPzMrIyMfDw760r69rQ05bU7oAAAWrSURBVFjDpZhlXFNRGIe32YFOGAa2Eiog2N1Kg4rd3d3d3d3d3d3d+r9uMFDmdh0rGgTbL94zNn5Xxu694PNlv7OdPTvvOXvf824i+0jDxdkYKxXlhXGwITxPIl8AytgslACq5knUEUD9JmUsNKkPoGOeRJ2giKNYxCnQKU+iqlDkY4vyKTAyDxrnqrAVYWS1XGrKjQVyEgGdy+XGU80B9kRAd+GebmAwxaZkF6XEmsDQVainK6BXTpo/Lzm7KHne/ElKPVBR8HpSkls0pKZ8yi76NIVq2CIuReCaKjGeuGb1KOqXregXRdVrlo8xOfN7pPWhj21GMXy2FX0mj82S9UBJIamqbFGPS1SvhRLoLCAwTG9IcYmohtPBH5wMMC2muEXUYhPgxbsg/RyKT0TN0QPV+XbINJdfNNfEs0tSQDGD4hdRMxSAlCvHgLhbQkQ347hzrg7w/bIQ0cXvQBfu6rpgohDRxAXcBbw3YjdSVn7bin5nDTbGopc9S8mS44Hkq5SVaabsNds0LWtwJRlwLpljoryFGb2ySjFClWIKAJYBGSsBKJinMwd6mDll65kAC0orIO9UZqGweZFQ1jYwWNEmRvOQoIWVHCq4s28pBgfgxwdefgAOZLav/UtlLAzRm2q856TGpmigM3+9dhnTiFvUaJQLcJrvIgLcNzi+52aDO/+lVBbIWOfP7fHvm0GOiwcxsHxQDc4tGtQSEIv4qAi9++OlXKKl9130Aq62ckD6sm1com3L0gFXIf2V9udDP/sev7s/1fAVdkGqZx5oZPfs98wEUEkkgJPQpy9/Zu8rMKhlup6paYLoxaRb/905npzj7oKJWjgIbJOrgzGt2t/W1tN2/yrGw1yOAunOmBJaPr+TLTzHAU9bksSvKxJMXcYUNVl2wN+RpfHf4zQ5Sov670S54BQYVcaFrVsOL1nj17at35olh7ds7ZGhBXLZIp8EQOLr0arvobBdu8IO9a3Vg4nKAKBUrkReUNO13FRqRH1MjHZ3j078GAW1yq1DL7VNa8RXTGjxiADPnqkq2gAGA61KbewZMHxtJOkgheMEddKD6w2CBvo07d2h1ezZrTr0buozMOjcn8GNWXWaF2kngO6zM16u82g3K/TI4JUrBx8JndXOQyfXBHlFqiETaHKWAeqew5pHyOVyY4wuvjJDvC7GKGfw2NfYAEHfpAmnR4LxfAtu/1WeAzFtfHqCwakiZ4UcX1EGojF8C7mtk+eIpl2hxrQ60zXeTkRdxDCjjuwwrHC83A66dt79mH0yI+7ibJsUpUCgaUAVMry1Tm6XmAZDQyLNMwmP/t2ubk5gMKiS+jUFJMcrG+UcGCuPlgBN+31TGcDg1S1L4/qKBEQnLQoO2HkiEpLiBSK4RBEFaksQ+Xp4QMgiN/N2+bpmlR+oVUmeQ0a0b532UiJMJBmd1rz9iGFeSSqiqm5pQ9SGJE/voObxGmOBEsJEZJJR86V5oLdnksGSf3UA1BoS2EAXwczJjYjM1zUIHFILQB2SV4zHu/UXZkauRQRda+9WgJM5MpVsO+NhieI1MRxo4l+wP+3LdpmKxOYKSBa2iWCL3uzdXJiDzXtPsEURbRZKAFfSO7rVPMsW0et9CnHis55mizQ13YioLCCp+ZUtUtORPNBqtuhrTQnpcioxomv/hAZDFA8GsEWXiKgSWVHquntGlkg7tX9BTvpP1bJExsJrU8mKygGq4Ccaligh7GARTg6GJbBEMYHBKlJ+pQ7M8YfqWCKXUe95GOPCEumGylSkG5CKQe8ITdOY0XmMJiKeZtSRiI576DRm0obuoCGWkr+J0Gdf+wqZrD6WiuijA1YU5WDFgKPRSD22unwmNwb2yfzJFQ7AIb8VBzJqkp+TJuZJ50tbIKNwS9LSKisGQB/1kYcoPamCVmhL0lbH/2ItSGecxP+J0xmR6C98wm2g1ziiQAAAAABJRU5ErkJggg==" alt="">
                    </div>
                    <a class="tt-service-title h5" href="<?=Url::to(['/professionals'])?>">Отримуйте завдання</a>
                    <div class="simple-text size-3">
                        <p>Допоможіть іншим замовникам зробити правильний вибір</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
</div>
<div class="tt-devider"></div>

<div class="tt-bg-grey">
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b75"></div>
        <h3 class="h3 text-center">Часті питання по роботі на “Виконроб”</h3>
        <div class="empty-space marg-lg-b30"></div>


        <?=\common\widgets\Faq::widget(array('id' => '1')) ?>


        <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
    </div>
    <div class="tt-devider"></div>
</div>

<div class="container">
    <div class="empty-space marg-sm-b30 marg-lg-b60"></div>
    <h2 class="h2 text-center">Готові додати своє перше замовлення?</h2>
    <div class="empty-space marg-lg-b30"></div>
    <div class="text-center">
        <a href="<?=Url::to(['/members/customregistration/create'])?>" class="button type-1 size-4 color-3 uppercase">додати замовлення</a>
    </div>
    <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
</div>
<div class="tt-devider"></div>