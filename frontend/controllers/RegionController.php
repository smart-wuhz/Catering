<?php

namespace frontend\controllers;

use common\models\Region;
use Yii;
use yii\web\Response;

class RegionController extends \yii\web\Controller
{
    public function init()
    {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * 根据父级 ID 获取子级地区
     */
    public function actionGetRegionByPid()
    {
        $pid = Yii::$app->request->post('pid', '0');
        $regions = Region::findAll(['pid' => $pid]);

        Yii::$app->response->data =[
            'status' => '0',
            'msg' => 'OK',
            'data' => $regions
        ];
        Yii::$app->response->send();
    }


    /*
     * 获取所有省份
     * */
    public function actionGetProvinces()
    {
        $province=Region::find()->where(['pid'=>0,'grade'=>'1','status'=>'1'])->select(['id','name'])->all();

        Yii::$app->response->data =[
            'status' => '0',
            'msg' => 'OK',
            'data' => $province
        ];
        Yii::$app->response->send();
    }

    /*
     * 获取所有市
     * */
    public function actionGetCitys()
    {
        $province=Region::find()->where(['pid'=>0,'grade'=>'1','status'=>'1'])->select(['id','name'])->all();

        $data=[];
        foreach ($province as $k=>$val){
            $data[$val->id]=Region::find()->where(['pid'=>$val->id])->select(['id','name'])->all();
        }

        Yii::$app->response->data =[
            'status' => '0',
            'msg' => 'OK',
            'data' => $data
        ];
        Yii::$app->response->send();
    }

    /*
     * 获取所有市
     * */
    public function actionGetDists()
    {
        $citys=Region::find()->where(['grade'=>'2','status'=>'1'])->select(['id','name'])->all();

        $data=[];
        foreach ($citys as $k=>$val){
            $data[$val->id]=Region::find()->where(['pid'=>$val->id])->select(['id','name'])->all();
        }

        Yii::$app->response->data =[
            'status' => '0',
            'msg' => 'OK',
            'data' => $data
        ];
        Yii::$app->response->send();
    }

    /*
     * 获取所有
     * */
    public function actionGetAll()
    {
        $data=Region::find()->where(['pid'=>0,'grade'=>'1','status'=>'1'])->select(['id','name'])->asArray()->all();
        if($data) {
            foreach ($data as $key => $val) {
                $child = Region::find()->where(['pid' => $val['id'],'grade'=>'2'])->select(['id', 'name'])->asArray()->all();
                if ($child) {
                    foreach ($child as $k => $v) {
                        $grandson = Region::find()->where(['pid' => $v['id'],'grade'=>'3'])->select(['id', 'name'])->asArray()->all();
                        if ($grandson) {
                            $child[$k]['child'] = $grandson;
                        }
                    }
                }
                $data[$key]['child'] = $child;
            }
        }
        Yii::$app->response->data =[
            'status' => '0',
            'msg' => 'OK',
            'data' => $data
        ];
        Yii::$app->response->send();

    }
}