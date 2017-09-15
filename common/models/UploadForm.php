<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['file'], 
                'file',
                'extensions' => 'jpg, png, gif, bmp', 
                'mimeTypes' => 'image/jpeg, image/png',
            ],
        ];
    }
    /*
     * 文件上传
     * @return array 文件路径数组
     * */
    public function upload($pic='file')
    {
        $model = new static();
        $model->file = UploadedFile::getInstances($model, $pic);
        $path =array();

        if ($model->file && $model->validate()) {
            $filePath = $this->fileExists(Yii::$app->basePath . '/uploads/');  //上传路径
            if(count($model->file)) {
                //多文件上传
                foreach ($model->file as $file) {
                    $path = $filePath . $file->baseName . '.' . $file->extension;
                    $file->saveAs($path);
                    $path[] = $file->baseName . '.' . $file->extension;
                }
            }else {
                //单文件上次
                $model->file->saveAs($filePath . $model->file->baseName . '.' . $model->file->extension);
                $path[] = $model->file->baseName . '.' . $model->file->extension;
            }
        }

        return $path;
    }

    /**
     * 检测目录是的存在，否则创建
     * 
     **/
    public function fileExists($uploadpath)
    {
        if (!file_exists($uploadpath)) {
            @mkdir($uploadpath, '0755', true);
        }
        return $uploadpath;
    }
}