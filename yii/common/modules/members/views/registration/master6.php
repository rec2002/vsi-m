<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use common\components\MemberHelper;

$this->title = 'Реєстрацію успішно завершено';
?>
<div class="tt-header-margin"></div>
<div class="tt-bg-grey">
    <div class="container">
        <!-- TT-PAGEFORM -->
        <div class="tt-pageform-wrapper middle" style="height: 538px;">
            <div class="tt-pageform tt-register-4">
                <h3 class="tt-register-title h3 text-center">Ви успішно зареєстровані!</h3>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="tt-register-message simple-text size-4">
                            <p>Дякуємо за реєстрацію на нашому сайті. Бажаємо вдалих замовлень та постійних клієнтів</p>
                        </div>

                        <div class="tt-register-check simple-text size-3">
                            <p>Перевірте свою пошту</p>
                        </div>

                        <h5 class="tt-register-check-email h5"><?=$email; ?></h5>

                        <a href="<?=Url::to(['/members/login'])?>" class="button type-1 size-3 color-3 uppercase"><span>розпочати пошук замовлень</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>