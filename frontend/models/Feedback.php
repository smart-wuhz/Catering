<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property string $id
 * @property string $title
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'email'], 'string', 'max' => 255],
            ['email','match','pattern'=>'/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/','message'=>'邮箱格式不正确'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'email' => 'Email',
            'status' => '1已处理，0未处理',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
