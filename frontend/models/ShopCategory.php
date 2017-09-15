<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%shop_category}}".
 *
 * @property string $id
 * @property string $pid
 * @property string $name
 * @property string $create_at
 */
class ShopCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['name'], 'required'],
            [['create_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'PID',
            'name' => 'Name',
            'create_at' => 'Create At',
        ];
    }

    public static function cateList($parentid=0)
    {
        return static::findAll(['pid'=>$parentid]);
    }
}
