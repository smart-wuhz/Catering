<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Shop;
use Yii;
use yii\web\Response;

class CheckController extends UcenterController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','delete'],
                'rules' => [
                    // 允许认证用户
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                    // 默认禁止其他用户
                ]
            ]
        ];
    }

    //测评
    public function actionIndex()
    {
        $report =[
            'baseReport'=>[
                [
                    'id'=>'1',
                    'orgid'=>'AAAAAA',
                    'title'=>'家之味大时代报告',
                    'time'=>'2017-09-17 17:25:17',
                    'score'=>'9.6'
                ],
                [
                    'id'=>'2',
                    'orgid'=>'AAAAAA',
                    'title'=>'爱情海报告',
                    'time'=>'2017-09-18 17:25:17',
                    'score'=>'9.6'
                ],
                [
                    'id'=>'3',
                    'orgid'=>'AAAAAA',
                    'title'=>'爱情海报告111',
                    'time'=>'2017-09-19 17:25:17',
                    'score'=>'8.6'
                ]

            ],
            'deepReport'=>[
                [
                    'id'=>'4',
                    'orgid'=>'AAAAAA',
                    'title'=>'家之味大时代报告',
                    'time'=>'2017-09-15 17:25:17',
                    'score'=>'9.6'
                ],
                [
                    'id'=>'6',
                    'orgid'=>'AAAAAA',
                    'title'=>'爱情海报告',
                    'time'=>'2017-09-14 17:25:17',
                    'score'=>'9.3'
                ]
            ]
        ];
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format=Response::FORMAT_JSON;
            Yii::$app->response->data = [
                'err' => '0',
                'msg' => 'OK',
                'result' => $report
            ];
            Yii::$app->response->send();
        }
        $list = Shop::findAll(['status' => '1', 'user_id' => Yii::$app->user->id]);
        return $this->render('index',[
            'shopList' =>$list,
        ]);
    }

    /*
     * 报告删除
     * */
    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){

        }
    }
}