<?php

namespace backend\modules\manage\controllers;

use yii\web\Controller;

/**
 * Setting controller for the `manage` module
 */
class SettingController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * user edit profile
     *
     * @return string
     */
    public function actionProfile()
    {
        return $this->render('profile');
    }
}
