<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Error Controller
 */
class ErrorController extends Controller
{

    public function init()
    {
        parent::init();
        $this->layout = false;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}