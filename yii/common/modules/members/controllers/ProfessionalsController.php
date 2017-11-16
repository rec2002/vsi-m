<?php

namespace common\modules\members\controllers;

class ProfessionalsController extends \common\modules\members\controllers\DefaultController
{
    public function actionIndex()
    {
        return $this->render('prof-list');
    }

}
