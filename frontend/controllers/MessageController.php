<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Message;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends UcenterController
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','update','delete','isread'],
                'rules' => [
                    // 允许认证用户
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // 默认禁止其他用户
                ],
            ],
        ];
    }

    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider=Message::findAll([
            'uid'=>Yii::$app->user->identity->id,
            'is_read'=>'0',
            'is_del'=>'0'
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
     * @return mixed
     */
    public function actionView()
    {
        $id=(int)Yii::$app->request->get('id');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionIsRead()
    {
        if(Yii::$app->request->isAjax){
            $id =Yii::$app->request->post('id');
            $model = $this->findModel($id);
            $model->is_read=1;
            $result=$model->save() ? ['status' => '0', 'msg' => 'OK'] :['status' => '1', 'msg' => 'Error'];
            return Json::encode($result);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if(Yii::$app->request->isAjax) {
            $id=Yii::$app->request->post('id');
            $bool =$this->findModel($id)->delete();

            $result=$bool ? ['status' => '0', 'msg' => 'OK'] :['status' => '1', 'msg' => 'Error'];
            return Json::encode($result);
        }
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
