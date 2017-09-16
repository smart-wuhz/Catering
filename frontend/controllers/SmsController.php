<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\SmsLog;
use common\helps\Sms;

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
        if(Yii::$app->request->isAjax) {
            if ( $model->validate(Yii::$app->request->post())) {
                
                $smsArray=[
                    'mobile' => Yii::$app->request->post('mobile'),
                    //'usage' => 'userRegister'
                    'usage'=>Yii::$app->request->post('usage'),
                ];
                $sms =new Sms($smsArray);

                $result =$sms->send() ? ['status' => 0, 'msg' => 'success'] : ['status' => 1, 'msg' => 'error'];
                return json_encode($result);
            } else {
                return json_encode(['status' => 1, 'msg' => $model->errors]);
            }
        }
    }

    /**
     * Finds the SmsLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SmsLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SmsLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
