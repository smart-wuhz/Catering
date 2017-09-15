<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property integer $type
 * @property string $content
 * @property string $description
 * @property integer $support_count
 * @property integer $comment_count
 * @property integer $weight
 * @property integer $status
 * @property integer $verify_status
 * @property integer $is_del
 * @property integer $creator
 * @property string $ctime
 * @property integer $modifier
 * @property string $mtime
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'support_count', 'comment_count', 'weight', 'status', 'verify_status', 'is_del', 'creator', 'modifier'], 'integer'],
            [['content', 'description'], 'string'],
            [['ctime', 'mtime'], 'safe'],
            [['title'], 'string', 'max' => 64],
            [['pic'], 'string', 'max' => 255],
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
            'pic' => 'Pic',
            'type' => 'Type',
            'content' => 'Content',
            'description' => 'Description',
            'support_count' => 'Support Count',
            'comment_count' => 'Comment Count',
            'weight' => 'Weight',
            'status' => 'Status',
            'verify_status' => 'Verify Status',
            'is_del' => 'Is Del',
            'creator' => 'Creator',
            'ctime' => 'Ctime',
            'modifier' => 'Modifier',
            'mtime' => 'Mtime',
        ];
    }
}
