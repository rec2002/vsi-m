<?php
namespace common\widgets;

use Yii;
use common\modules\members\models\Members;

class Infromer extends \yii\bootstrap\Widget
{
    public function run()
    {

        if (in_array(Yii::$app->controller->action->id, array('create', 'addorder'))) return false;

        if (!sizeof(@$_SESSION['suggested']) || !isset($_SESSION['suggested'])) $_SESSION['suggested'] = array();
        return $this->render('informer', ['total'=>sizeof($_SESSION['suggested']), 'model'=>array_slice($_SESSION['suggested'], -3, 3, true)]);
    }
}