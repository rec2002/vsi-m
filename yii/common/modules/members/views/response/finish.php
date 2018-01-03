<?

use yii\helpers\Url;

$this->title = 'Написати відгук';

?>
    <div class="tt-header-margin"></div>
    <div class="tt-bg-grey">
        <div class="container">
            <!-- TT-PAGEFORM -->
            <div class="tt-pageform-wrapper middle">
                <div class="tt-pageform tt-register-4">
                    <h3 class="tt-register-title h3 text-center">Ваш відгук відправлено на перевірку</h3>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="tt-register-message simple-text size-4">
                                <p>Ми відправимо вам сповіщення, як тільки він буде опублікований</p>
                            </div>

                            <a href="<?=Url::toRoute(['/orders/default/detail', 'id' => $member->order->id])?>" class="button type-1 size-3 color-3 uppercase"><span>перейти до замовлення</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

