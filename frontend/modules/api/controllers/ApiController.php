<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use yii\web\Response;
use Yii;

/**
 * Assessment  controller for the `api` module
 */
class ApiController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function init()
    {
        Yii::$app->response->format=Response::FORMAT_JSON;
    }
}
