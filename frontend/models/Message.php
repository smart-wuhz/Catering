<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%system_message}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $message
 * @property integer $is_read
 * @property integer $is_del
 * @property string $creator
 * @property integer $created_at
 * @property integer $updated_at
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'is_read', 'is_del', 'creator', 'created_at', 'updated_at'], 'integer'],
            [['message'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'uid' => 'Uid',
            'message' => '消息内容',
            'is_read' => '是否已读',
            'is_del' => '是否删除：0、未删除 1、删除',
            'creator' => '创建人',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
