<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%cookstyle}}".
 *
 * @property string $id
 * @property integer $classid
 * @property string $name
 * @property integer $parentid
 */
class Cookstyle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cookstyle}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classid', 'parentid'], 'integer'],
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
            'classid' => 'Classid',
            'name' => 'Name',
            'parentid' => 'Parentid',
        ];
    }

    public static function cookList($parentid=0)
    {
        return static::findAll(['parentid'=>$parentid]);
    }
}
