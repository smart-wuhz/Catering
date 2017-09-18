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
        $report =[
            [
                'id'=>'1',
                'orgid'=>'AAAAAA',
                'title'=>'家之味大时代报告',
                'time'=>'1505726717',
                'score'=>'9.6'
            ],
            [
                'id'=>'2',
                'orgid'=>'AAAAAA',
                'title'=>'爱情海报告',
                'time'=>'1505726745',
                'score'=>'9.6'
            ]
        ];

        return $this->render('index');
    }
}