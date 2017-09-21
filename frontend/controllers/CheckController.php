<?php

namespace frontend\controllers;

use common\helps\Tools;
use yii\helpers\Json;
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
                'only' => ['index', 'delete'],
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
        $report = [
            'baseReport' => [
                [
                    'id' => '1',
                    'orgid' => 'AAAAAA',
                    'title' => '家之味大时代报告',
                    'time' => '2017-09-17 17:25:17',
                    'score' => '9.6'
                ],
                [
                    'id' => '2',
                    'orgid' => 'AAAAAA',
                    'title' => '爱情海报告',
                    'time' => '2017-09-18 17:25:17',
                    'score' => '9.6'
                ],
                [
                    'id' => '3',
                    'orgid' => 'AAAAAA',
                    'title' => '爱情海报告111',
                    'time' => '2017-09-19 17:25:17',
                    'score' => '8.6'
                ]

            ],
            'deepReport' => [
                [
                    'id' => '4',
                    'orgid' => 'AAAAAA',
                    'title' => '家之味大时代报告',
                    'time' => '2017-09-15 17:25:17',
                    'score' => '9.6'
                ],
                [
                    'id' => '6',
                    'orgid' => 'AAAAAA',
                    'title' => '爱情海报告',
                    'time' => '2017-09-14 17:25:17',
                    'score' => '9.3'
                ]
            ]
        ];
        if (Yii::$app->request->isAjax) {
            $params['uid']=Yii::$app->user->identity->id;

//            $time = Yii::$app->request->post('time');
//            if(!empty($time)){
//                $params['time']=$time;
//            }
//
//            $url = Yii::$app->params['apiHost'] . '/XXX/XXX';
//            $pargam = Json::encode($pargam);
//            $result = Tools::curl($url, $params);

            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = [
                'err' => '0',
                'msg' => 'OK',
                'result' => $report
            ];
            Yii::$app->response->send();
        }
        $list = Shop::findAll(['status' => '1', 'user_id' => Yii::$app->user->id]);
        return $this->render('index', [
            'shopList' => $list,
        ]);
    }

    /*
     * 报告删除
     * */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
//            $pargam = [
//                'id' => Yii::$app->request->post('dataID')
//            ];
//            $url = Yii::$app->params['apiHost'] . '/XX/XX';
//            $pargam = Json::encode($pargam);
//            $reslut = Tools::curl($url, $pargam);

            $res = ($reslut['status'] == '200') ? ['status' => 0, 'msg' => 'OK'] : ['status' => 1, 'msg' => 'Error'];

            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = $res;
            Yii::$app->response->send();
        }
    }

    /*
     * 报告认领
     * */
    public function actionReportClaim()
    {
        if(Yii::$app->request->isAjax){
            if(isset(Yii::$app->user->identity->id) && !empty(Yii::$app->user->identity->id) ){
                $uid =Yii::$app->user->identity->id;
                /*
                 * todo 认领报告
                 * */

            }else{
                $reslut=['status' => 1, 'msg' => 'Error'];
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = $res;
            Yii::$app->response->send();
        }
    }
}