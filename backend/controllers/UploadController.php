<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Response;

class UploadController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();
        $path =array();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'pic');

            if ($model->file && $model->validate()) {
                $filePath = $this->fileExists(Yii::$app->basePath . '/uploads/');  //上传路径
                
                if (count($model->file)) {
                    //多文件上传
                    foreach ($model->file as $file) {
                        $path = $filePath . $file->baseName . '.' . $file->extension;
                        $file->saveAs($path);
                        $path[] = $file->baseName . '.' . $file->extension;
                    }
                } else {
                    //单文件上次
                    $model->file->saveAs($filePath . $model->file->baseName . '.' . $model->file->extension);
                    $path[] = $model->file->baseName . '.' . $model->file->extension;
                }
            }
        }
        Yii::$app->response->format=Response::FORMAT_JSON;
        return ['path'=>$path];
    }

    public function fileExists($uploadpath)
    {
        if (!file_exists($uploadpath)) {
            @mkdir($uploadpath, '0755', true);
        }
        return $uploadpath;
    }
}