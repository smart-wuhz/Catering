<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $pic
 * @property integer $sort_order
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order'], 'integer'],
            [['name'], 'string', 'max' => 64],
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
            'name' => 'Name',
            'pic' => 'Pic',
            'sort_order' => 'Sort Order',
        ];
    }

    /*
     * 分类列表
     * */
    public static function categoryList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
