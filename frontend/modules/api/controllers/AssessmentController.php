<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use yii\web\Response;
use Yii;

/**
 * Assessment  controller for the `api` module
 */
class AssessmentController extends ApiController
{
    public $output;

    public function init()
    {
        parent::init();
        $this->output = array(
            'name' => '家之味',
            'score' => '5.2',
            'rent' => ['score' => 3, 'desc' => [], 'data' => []],
            'traffic' => ['score' => 3, 'desc' => [], 'data' => []],
            'comment' => ['score' => 3, 'desc' => [], 'data' => []],
            'latent' => ['score' => 3, 'desc' => [], 'data' => []],
            'customers' => ['score' => 3, 'desc' => [], 'data' => []],
            'environment' => ['score' => 3, 'desc' => [], 'data' => []],
            'place' => ['score' => 3, 'desc' => [], 'data' => []],
            'compete' => ['score' => 3, 'desc' => [], 'data' => []],
            'rangeMin' => '10',
            'rangeMax' => '15'
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->response->data = [
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        ];
        Yii::$app->response->send();
    }

    /**
     * Renders the rent view for the module
     * @return string
     */
    public function actionRent()
    {
        $this->output['rent']['data'] = [
            'xaxis' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            'houseup' => ['10', '20', '60', '5', '10', '70', '80', '10', '20', '60', '5', '10'],
            'consumeup' => ['10', '20', '60', '5', '10', '70', '80', '10', '20', '60', '5', '10'],
        ];
        $this->output['rent']['desc'] = [
            'result' => '客户分类少', 'msg' => '对应客群匹配度低'
        ];

        Yii::$app->response->data = [
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        ];
        Yii::$app->response->send();
    }

    /**
     * Renders the traffic view for the module
     * @return string
     */
    public function actionTraffic()
    {
        $this->output['traffic']['data'] = [
            'subway' => ['total' => '3', 'list' => ['1', '2', '9'], 'unit' => '号线'],
            'bus' => ['total' => '3', 'list' => ['1', '981', '11'], 'unit' => '路'],
            'parking' => ['total' => '3', 'seat' => '30000']
        ];
        $this->output['traffic']['desc'] = [
            'result' => '交通便利', 'msg' => '符合本店营业'
        ];
        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }


    /**
     * Renders the comment view for the module
     * @return string
     */
    public function actionComment()
    {
        $this->output['comment']['data'] = [
            'environment' => [9, 8, 9],
            'service' => [10, 8, 9],
            'health' => [10, 8, 9],
            'cookstyle' => [8, 8, 9],
        ];
        $this->output['comment']['desc'] = [
            'result' => '评论良好', 'msg' => '基本符合本店经营状况'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }


    /**
     * Renders the latent view for the module
     * @return string
     */
    public function actionLatent()
    {
        $this->output['latent']['data'] = [
            'self' => [30, 20, 50, 38, 40, 31, 56],
            'sameIndustry ' => [20, 15, 25, 19, 25, 20, 31],
        ];
        $this->output['latent']['desc'] = [
            'result' => '潜力值高', 'msg' => '达到同行标准值'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }

    /**
     * Renders the customer view for the module
     * @return string
     */
    public function actionCustomer()
    {
        $this->output['customer']['data'] = [
            '男人', '大学生', '附近居民',
            '女人', '研究生', '人均100元以下',
            '过路客', '40~50岁', '人均300元以上',
            '小学生', '60~70岁', '人均100~200元',
            '中学生', '30~40岁', '人均200~300元',
        ];
        $this->output['customer']['desc'] = [
            'result' => '客户分类少', 'msg' => '对应客群匹配度低'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }

    /**
     * Renders the environment view for the module
     * @return string
     */
    public function actionEnvironment()
    {
        $this->output['environment']['data'] = [

        ];
        $this->output['environment']['desc'] = [
            'result' => '环境优良', 'msg' => '符合本店营业'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }

    /**
     * Renders the place view for the module
     * @return string
     */
    public function actionPlace()
    {
        $this->output['place']['data'] = [

        ];
        $this->output['place']['desc'] = [
            'result' => '满分地段', 'msg' => '商业区->主商圈', 'match' => '98%'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }

    /**
     * Renders the compete view for the module
     * @return string
     */
    public function actionCompete()
    {
        $this->output['compete']['data'] = [
            'direct' => '200',
            'indirect' => '80',
            'seat' => '2000',
            'lessVegetable' => ['麻辣小龙虾', '红烧鲫鱼', '蜜汁鲍鱼', '糖醋排骨', '炭烤八爪鱼', '三鲜水饺', '烟熏鱼', '红烧带鱼']
        ];
        $this->output['compete']['desc'] = [
            'result' => '竞争压力强', 'msg' => '与同系店铺相比，得分偏低'
        ];

        Yii::$app->response->data = array(
            'err' => '0',
            'msg' => 'OK',
            'result' => $this->output
        );
        Yii::$app->response->send();
    }
}