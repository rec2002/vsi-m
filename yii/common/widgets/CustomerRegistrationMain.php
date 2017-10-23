<?php
namespace common\widgets;

use Yii;
use \common\modules\members\models\CustomerRegistration;


class CustomerRegistrationMain extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $model = new CustomerRegistration(['scenario' => 'home-page']);
        return $this->render('custregistration',   [
            'model' => $model,
        ]);

    }

}