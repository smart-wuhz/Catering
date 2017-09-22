<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\SmsLog;
use common\helps\Sms;
use yii\web\Response;

/**
 * SmsController implements the CRUD actions for SmsLog model.
 */
class SmsController extends Controller
{
    /**
     * Creates a new SmsLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->isAjax) {
            $model = new SmsLog();
            $smsArray = [
                'mobile' => Yii::$app->request->post('mobile'),
                //'usage' => 'userRegister'
                'usage' => Yii::$app->request->post('usage'),
            ];
            if ($model->validate($smsArray)) {
                $sms = new Sms($smsArray);
                $result = $sms->send() ? ['status' => 0, 'msg' => 'success'] : ['status' => 1, 'msg' => 'error'];
            } else {
                $result = ['status' => 1, 'msg' => $model->errors];
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->data = $result;
            Yii::$app->response->send();
        }
    }
}
