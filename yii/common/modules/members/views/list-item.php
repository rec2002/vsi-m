<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\MemberHelper;

?>
<div class="tt-task">
    <div class="tt-task-top clearfix">
        <div class="tt-task-info">
            <a class="tt-task-proposed tt-icon-hover" href="<?=Url::to([$url, 'id'=>$model['id'], 'slug'=>MemberHelper::UrlSlug($model['title'])])?>">
                 <span class="tt-icon-entry">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAP1BMVEUAAAAxMTEyMjIzMzMxMTEtLS0zMzMyMjItLS0xMTExMTExMTExMTExMTEvLy8xMTEyMjIyMjIyMjIyMjIzMzMbMuNVAAAAFHRSTlMARENAPAbELw/lx1VPNA71w5FnGgwCepEAAABeSURBVBjTrY9LDoAwCAXra9Ha1vrj/mcVjBDj2gkbJsOCQCk6ZxBK830fJxEcnEhiRMzMvHSgx6CGtQG0oIpjNZFlVLKd5AFCuoVjRQKGh/QVf52UBimMusn7eJlIF5lqBFlg3cLVAAAAAElFTkSuQmCC" alt="">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAM1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAW1g65AAAAEHRSTlMAQ0E8Bg7EL+XHVU80kWcaBaFkNAAAAFRJREFUGNOty8kNwCAMRFFvkABZpv9qg5FiuQD+zU9jMpXopVkbcd/1mACKxFxAJ4CrMBchF/iG2RfW+cEPvnBEepnpgtwC5UgTbH1pg1O9kmkGsQ8IpwNo1189CgAAAABJRU5ErkJggg==" alt="">
                 </span>
                <span class="tt-task-proposed-count"><?=$model['suggestions']?></span><span>  <?=MemberHelper::NumberSufix($model['suggestions'], array('майстер відповів', 'майстрів відповіли', 'майстрів відповіли'))?> </span>
            </a>
            <div class="tt-task-status status<?=$model['status']?>"><?=MemberHelper::STATUS[$model['status']]?></div>
        </div>
        <div class="tt-task-title"><a class="h5" href="<?=Url::to([$url, 'id'=>$model['id'], 'slug'=>MemberHelper::UrlSlug($model['title'])])?>"><?= Html::encode($model['title']); ?></a></div>
    </div>
    <div class="tt-task-txt simple-text size-3 blue-links">
        <p><?= Html::encode( mb_strimwidth($model['descriptions'], 0, 300, '...')); ?> <a href="<?=Url::to([$url, 'id'=>$model['id'], 'slug'=>MemberHelper::UrlSlug($model['title'])])?>">Дізнатись більше</a></p>
    </div>
    <div class="tt-task-bottom">
        <div class="tt-task-table">
            <div class="tt-task-location">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAQCAMAAAAVv241AAAAZlBMVEUBAQEAAAAuLi4yMjInJycyMjIxMTEpKSkyMjIxMTEyMjIyMjIxMTExMTExMTEvLy8xMTExMTEpKSkzMzMxMTEyMjIxMTEyMjIyMjIxMTEwMDAvLy8xMTEyMjIyMjIvLy8wMDAvLy9r0oyyAAAAInRSTlMEAgl0FPiFENXPzK2SjYk2cD0Y6ujdu7WDaVM7H56cQSUllbiraQAAAH9JREFUCB0FwYVhBEEQACBm7dzeLdZ/kwERKQ+1jjlFiE8/HSkdU/8Jqc8R5UTukzxFWfZ9KaZsOKJ1dM3PqKZ4wENX1aRB01XDJm9su/dgXXm29mRZ/Z07oJx/xdcKLN/E6bLB+3Ii4nUtlOsLEea7dJ8hQrrN8y1BROjGscA/JKsFRHmXwm8AAAAASUVORK5CYII=" alt=""><?= Html::encode($model['location']); ?></div>
            <div class="tt-task-price">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUBAQEDAwMAAAAyMjIzMzMtLS0yMjIqKioyMjIyMjIxMTEyMjIxMTEjIyMwMDAxMTExMTExMTEvLy8vLy8oKCghISExMTExMTEyMjIyMjIxMTEyMjIvLy8xMTExMTEvLy8sLCwnJycyMjIxMTEzMzMxMTEzMzMyMjKkslWiAAAAKHRSTlMGAwCB1iHPF+XfyLxvDLN2c1BIMRkS7MKvqad7S0RCPCoa1Z6VhnlkJpSFGQAAAJlJREFUGNM9yVcWgzAQQ1EJF3ovoUP6/ncYG4jfzxzdgXdFrX17HZSRkD7pQAXrcgiuf/CdagrZnKD6cCsW0ooBfrqpLVOzQaHhpXGs+BCKMG0hcHuR+zBGWQozEuQxTXleDD7SZwwEtQUkfYY9ylpAiwOg2ndXwORLI1iTKhwVbLRSiySocEY2UsxVqOCAdyn0/J/wrOjIvX/6+gdHQCdw1QAAAABJRU5ErkJggg==" alt="">
                Б’юджет: <span><?= Html::encode($model['budget_name']); ?></span>
            </div>
            <div class="tt-task-date">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEUDAwMAAAAAAAAyMjAzMzEyMjIyMjEwMDAvLy8xMTAvLy8wMDAxMTAxMTASEhIzMzJHP+qmAAAAD3RSTlMIBgKDgcFzREWfRjTs6w6KMeKqAAAAXklEQVQI12NQUksCQSWGLa4hIOjNcBjCsGX4BJRIFEuUZ/ikpCgIBEAGkIYwlD/Lf7A3ADLEzYUNmhv4kRjCn/mBUkCGoCADEMBFwGqYDRYvQJL6AGG8Z5j/Hwx+AgAkPyt/pO0F8gAAAABJRU5ErkJggg==" alt="">
                <?=$model['created_at']?>
            </div>
        </div>
    </div>
</div>
<div class="empty-space marg-lg-b30"></div>