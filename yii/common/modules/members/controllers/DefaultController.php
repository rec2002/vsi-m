<?php

namespace common\modules\members\controllers;

use yii\web\Controller;

/**
 * Default controller for the `members` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['/members/login']);
        //return $this->render('login');
    }
}
