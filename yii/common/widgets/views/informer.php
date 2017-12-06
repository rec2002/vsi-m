<?

use yii\helpers\Url;
use common\components\MemberHelper;

?>
<!-- TT-INFORMER -->
<div class="tt-informer">
    <div class="container">
        <div class="tt-informer-entry">
            <div class="tt-informer-img clearfix">
<? if (sizeof($model)) foreach ($model as $val) {?>
                <img data-user-id="<?=$val['id']; ?>" src="<?=(!empty($val['avatar'])) ? $val['avatar'] : '/img/person/person.png'; ?>" style="height:60px;" alt="">
<? } ?>
            </div>
            <div class="tt-informer-count simple-text size-3">
                <p><b><span class="tt-informer-nubmer"><?=$total?></span>  <?=MemberHelper::NumberSufix($total, array('виконавець', 'виконавця', 'виконавців'))?> обрано.</b></p>
            </div>
            <div class="tt-informer-btn">
<?  if (Yii::$app->user->isGuest) { ?>
            <a href="<?=Url::to(['/members/customregistration/create'])?>" class="button type-1">Додати завдання</a>
<? } else { ?>
            <a href="<?=Url::to(['/orders/default/addorder'])?>" class="button type-1">Додати завдання</a>
<? } ?>

            </div>
            <div class="tt-informer-text simple-text size-3 hidden-sm hidden-xs">
                <p>- вони отримають запрошення і надішлють вам ціни за роботу</p>
            </div>
        </div>
        <div class="tt-informer-close button-close" title="Відмінити вибір"></div>
    </div>
</div>

<?

if ($total>0) echo $this->registerJs("(function(){
    setTimeout(\"$('.tt-informer').addClass('active');\", 2000);
     
})();" , \yii\web\View::POS_END );





?>