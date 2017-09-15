<?php
/**
 *
 * Author: wuhz
 * Date: 2017/8/25 0025
 * Time: 16:47
 */

namespace frontend\controllers;
use yii\web\Controller;


class CheckController extends UcenterController
{
    //测评
    public function actionIndex()
    {
        return $this->render('index');
    }
}