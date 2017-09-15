<?php

namespace frontend\controllers;

use common\helps\Tools;
use yii\web\Response;
use yii\web\Controller;
use Yii;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /*
     *  首页
     * */
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
            $name = Yii::$app->request->post('name');
            Yii::$app->session['default_shop'] = [
                'orgID' => Yii::$app->params['superOrgID'],
                'restaurantName' => $name
            ];
            return $this->redirect(['assessment/index']);
        }
        return $this->render('index');
    }

    /*
     * 关于我们
     * */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
     * 请求接口 获取相关信息
     * */
    public function actionShopList()
    {
        if (Yii::$app->request->isAjax) {
            $url = Yii::$app->params['apiHost'] . '/api/getShopList/';
            $data = array(
                'name' => '家之味',
                'lat' => '',  //纬度
                'lon' => '',//经度
            );
            //$result = Tools::curl($url, $data, 10, 'json');

            $data = [
                '家之味',
                '爱情海',
                '上海市浦东新区南泉北路1101号',
                '上海市浦东新区浦东南路1101号'
            ];

            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = [
                'err' => '0',
                'msg' => 'OK',
                'data' => $data
            ];
            Yii::$app->response->send();
        }
    }
}