<?php

namespace frontend\controllers;

use common\helps\Tools;
use frontend\models\Shop;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use yii\web\Response;
use yii\helpers\Json;

//初级测评

class AssessmentController extends Controller
{
    public $layout = 'assessment';

    public static $common = ['common' => [], 'shoplist' => []];

    public function init()
    {
        parent::init();
        static::$common = [
            'common' => $this->getCommonData(),   //公共页面数据
            'shoplist' => $this->getShopList()    //店铺列表
        ];

        //获取默认店铺数据，存入session
        $this->setDefaultShop();
        $view = Yii::$app->view->params = static::$common;
    }

    /*
    *  首页
    * */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*房租 */
    public function actionRent()
    {
//        $rent = [
//            'data' => [
//                'xaxis' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
//                'houseup' => ['10', '20', '60', '5', '10', '70', '80', '10', '20', '60', '5', '10'],
//                'consumeup' => ['10', '20', '60', '5', '10', '70', '80', '10', '20', '60', '5', '10'],
//            ],
//            'desc' => [
//                'result' => '客户分类少', 'msg' => '对应客群匹配度低'
//            ],
//        ];
        $url = Yii::$app->params['apiHost'] . '/api/assessment/rent';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $rent = $result['result']['rent'];

        return $this->render('rent', ['rent' => $rent]);
    }

    /*交通 b*/
    public function actionTraffic()
    {
        /*$traffic = [
            'data' => [
                'subway' => ['list' => ['1', '2', '9']],
                'bus' => ['list' => ['1', '981', '11']],
                'parking' => ['total' => '3', 'seat' => '30000']
            ],
            'desc' => [
                'result' => '交通便利', 'msg' => '符合本店营业'
            ],
        ];*/

        $url = Yii::$app->params['apiHost'] . '/api/assessment/traffic';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $traffic = $result['result']['traffic'];

        return $this->render('traffic', ['traffic' => $traffic]);
    }

    /*评价*/
    public function actionComment()
    {
//        $comment = [
//            'data' => [
//                'environment' => [9, 8, 9],
//                'service' => [10, 8, 9],
//                'health' => [10, 8, 9],
//                'cookstyle' => [8, 8, 9],
//            ],
//            'desc' => ['result' => '评论良好', 'msg' => '基本符合本店经营状况']
//        ];
//        foreach ($comment['data'] as $key => $val) {
//            foreach ($val as $ke => $item) {
//                $comment['data2'][$key][] = 15 - $item;
//            }
//        }
        $url = Yii::$app->params['apiHost'] . '/api/assessment/comment';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $comment = $result['result']['comment'];

        foreach ($comment['data'] as $key => $val) {
            foreach ($val as $ke => $item) {
                $comment['data2'][$key][] = 15 - $item;
            }
        }

        return $this->render('comment', ['comment' => $comment]);
    }

    /*潜力*/
    public function actionLatent()
    {
//        $latent = [
//            'data' => [
//                'self' => [30, 20, 50, 38, 40, 31, 56],
//                'sameIndustry' => [20, 15, 25, 19, 25, 20, 31],
//            ],
//            'desc' => ['result' => '潜力值高', 'msg' => '达到同行标准值']
//        ];
        $url = Yii::$app->params['apiHost'] . '/api/assessment/latent';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $latent = $result['result']['latent'];

        return $this->render('latent', ['latent' => $latent]);
    }

    /*客群*/
    public function actionCustomers()
    {
//        $customers = [
//            'data' => [
//                '男人', '大学生', '附近居民',
//                '女人', '研究生', '人均100元以下',
//                '过路客', '40~50岁', '人均300元以上',
//                '小学生', '60~70岁', '人均100~200元',
//                '中学生', '30~40岁', '人均200~300元',
//            ],
//            'desc' => ['result' => '客户分类少', 'msg' => '对应客群匹配度低']
//        ];

        $url = Yii::$app->params['apiHost'] . '/api/assessment/customers';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $customers = $result['result']['customers'];

        return $this->render('customers', ['customers' => $customers]);
    }

    /*环境*/
    public function actionEnvironment()
    {
//        $environment = [
//            'data' => [],
//            'desc' => ['result' => '环境优良', 'msg' => '符合本店营业']
//        ];

        $url = Yii::$app->params['apiHost'] . '/api/assessment/environment';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $environment = $result['result']['environment'];

        return $this->render('environment', ['environment' => $environment]);
    }

    /*地段*/
    public function actionPlace()
    {
//        $place = [
//            'data' => [],
//            'desc' => ['result' => '满分地段', 'msg' => '商业区->主商圈', 'match' => '98%']
//        ];
        $url = Yii::$app->params['apiHost'] . '/api/assessment/place';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $place = $result['result']['place'];

        return $this->render('place', ['place' => $place]);
    }

    /*竞争*/
    public function actionCompete()
    {
        /*$compete = [
            'data' => [
                'direct' => '200',
                'indirect' => '80',
                'seat' => '2000',
                'lessVegetable' => ['麻辣小龙虾', '红烧鲫鱼', '蜜汁鲍鱼', '糖醋排骨', '炭烤八爪鱼', '三鲜水饺', '烟熏鱼', '红烧带鱼']
            ],
            'desc' => ['result' => '竞争压力强', 'msg' => '与同系店铺相比，得分偏低']
        ];*/

        $url = Yii::$app->params['apiHost'] . '/api/assessment/compete';

        $data = Json::encode(Yii::$app->session['default_shop']);

        $result = Tools::curl($url, $data, 10, 'json');
        $compete = $result['result']['compete'];

        return $this->render('compete', ['compete' => $compete]);
    }

    /*
     * 切换店铺
     * */
    public function actionChange()
    {
        if (Yii::$app->request->isAjax) {
            $id = (int)Yii::$app->request->post('shopid');
            $orgid = Yii::$app->request->post('orgid');

            $shop = Shop::find()->select(['id', 'name', 'orgid'])->where(['id' => $id, 'orgid' => $orgid])->asArray()->one();

            if ($shop && Yii::$app->session['default_shop']) {
                Yii::$app->session['default_shop'] = [
                    'orgID' => $shop['orgid'],
                    'restaurantName' => $shop['name']
                ];
                $data = ['status' => 0, 'msg' => 'OK', 'data' => $shop];
            } else {
                $data = ['status' => 0, 'msg' => 'Error'];
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = $data;
            Yii::$app->response->send();
        }
    }

    /*
     *  获取公共数据
     * */
    private function getCommonData()
    {
//        return array(
//            'name' => '家之味',
//            'score' => '5.2',
//            'rent' => ['score' => 10],
//            'traffic' => ['score' => 8],
//            'comment' => ['score' => 6],
//            'latent' => ['score' => 5],
//            'customers' => ['score' => 7],
//            'environment' => ['score' => 5],
//            'place' => ['score' => 4],
//            'compete' => ['score' => 6],
//            'rangeMin' => '10',
//            'rangeMax' => '15'
//        );

        if (empty(static::$common['common'])) {

            $data = Json::encode(Yii::$app->session['default_shop']);

            $url = Yii::$app->params['apiHost'] . '/api/assessment/index';
            $result = Tools::curl($url, $data, 10, 'json');
            return $result['result'];
        }
        return [];
    }

    /*
     * 获取店铺列表
     * */
    private function getShopList()
    {
        if (empty(static::$common['shoplist']) &&
            (isset(Yii::$app->user->identity->id) && !empty(Yii::$app->user->identity->id))
        ) {
            $uid = Yii::$app->user->identity->id;
            return Shop::find()->where(['user_id' => $uid])->select(['id', 'orgid', 'name', 'address'])->asArray()->all();
        }
        return [];
    }

    /*
     * 默认店铺
     * */
    private function setDefaultShop()
    {
        if (empty(Yii::$app->session['default_shop'])) {
            $uid = Yii::$app->user->identity->id;
            $shop = Shop::find()->where(['user_id' => $uid, 'default' => '1'])->select(['id', 'orgid', 'name'])->asArray()->one();

            Yii::$app->session['default_shop'] = [
                'orgID' => $shop['orgid'],
                'restaurantName' => $shop['name'],
            ];
        }
    }
}