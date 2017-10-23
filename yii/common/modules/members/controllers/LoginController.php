<?php

namespace common\modules\members\controllers;


/**
 * Default controller for the `members` module
 */
class LoginController extends \common\modules\members\controllers\DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('login');
    }
}
