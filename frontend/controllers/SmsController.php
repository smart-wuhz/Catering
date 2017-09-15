<?php

namespace frontend\controllers;

use Yii;
use common\models\SmsLog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SmsController implements the CRUD actions for SmsLog model.
 */
class SmsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new SmsLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SmsLog();
        if(Yii::$app->request->isAjax) {
            if ( $model->validate(Yii::$app->request->get())) {
                $model->mobile = Yii::$app->request->get('mobile');
                //$model->code=$this->generate_code();
                $model->code = '888888';
                //$model->usage = 'userRegister';
                $model->usage=Yii::$app->request->get('usage');
                $model->create_time = time();

                if ($model->save()) {
                    return json_encode(['status' => 0, 'msg' => 'success']);
                } else {
                    return json_encode(['status' => 1, 'msg' => 'error']);
                }
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
