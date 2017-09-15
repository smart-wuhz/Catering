<?php

namespace frontend\controllers;

use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Shop;
use frontend\models\Feedback;
use common\models\Region;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends Controller
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
                    'delete' => ['get'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete','updatedefault'],
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
     * Lists all Shop models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => Shop::findAll(['status' => '1'])
        ]);
    }

    /**
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shop();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $regionName = Region::getNameByRegionid($model->region_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'regionName' => $regionName
            ]);
        }
    }

    /**
     * Update Default shop an existing Shop model.
     * @param string $id
     * @return mixed
     */
    public function actionUpdateDefault()
    {
        if (Yii::$app->request->isAjax) {
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();  //开启事务

            try {
                $id = (int)Yii::$app->request->post('shopid');
                $model = Shop::findOne(['id' => $id, 'user_id' => Yii::$app->user->identity->id]);
                $model->default = '1';

                if (!$model->save()) {
                    $error = array_values($model->getFirstErrors())[0];
                    throw new Exception($error);//抛出异常
                }

                $all = Shop::find()->where(['user_id' => Yii::$app->user->identity->id])->where(['<>', 'id', $id])->all();
                foreach ($all as $item) {
                    $item->default = 0;
                    // skipping validation as no user input is involved
                    if (!$item->update(false)) {
                        $error = array_values($item->getFirstErrors())[0];
                        throw new Exception($error);//抛出异常
                    }
                }
                $transaction->commit();

                return Json::encode(['status' => '0', 'msg' => 'OK']);

            } catch (Exception $e) {
                $transaction->rollBack();
                return Json::encode(['status' => '1', 'msg' => $e->getMessage()]);
            }
        }
        return Json::encode(['status' => '0', 'msg' => 'OK']);
    }


    //店铺入住
    public function actionEnter()
    {
        $model = new Shop();
        $feedback = new Feedback();
        return $this->render('enter', [
            'model' => $model,
            'feedback' => $feedback,
        ]);
    }


    /**
     * Deletes an existing Shop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
