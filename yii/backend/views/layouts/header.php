<?php
use yii\helpers\Html;
use yii\helpers\Url;
Yii::$app->name = 'Всі майстри';
$this->title = 'Aдміністративна частина "Всі майстри"';

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><img src="/img/log1.png" height="51" alt="'.Yii::$app->name.'"></span><span class="logo-lg"><img src="/img/logo.svg" width="206" height="51" alt="'.Yii::$app->name.'"><img src="/img/log1.png" height="51" alt="'.Yii::$app->name.'"></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="<?=Url::to(['/msg'])?>">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?=$data = Yii::$app->db->createCommand('SELECT count(*) as count FROM `member_msg_unread` u LEFT JOIN `member_msg` msg ON  msg.id=u.msg_id WHERE u.status=0 AND msg.ticket_id IS NOT NULL AND u.support = 0')->queryOne()['count']; ?></span>
                    </a>
                </li>


                <!-- User Account: style can be found in dropdown.less -->
                <li class="tasks-menu">
                    <?= Html::a(
                        'Вихід',
                        ['/site/logout'],
                        ['data-method' => 'post', 'class' => 'btn ']
                    ) ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
