<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nav".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $title
 * @property string $link
 * @property string $remark
 * @property string $icon
 * @property string $icon_bg
 * @property integer $sort_order
 * @property integer $status
 * @property string $ctime
 * @property string $mtime
 */
class Nav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nav}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'sort_order', 'status'], 'integer'],
            [['remark'], 'string'],
            [['ctime', 'mtime'], 'safe'],
            [['title', 'link'], 'string', 'max' => 765],
            [['icon', 'icon_bg'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'title' => 'Title',
            'link' => 'Link',
            'description' => 'remark',
            'icon' => 'Icon',
            'icon_bg' => 'Icon Bg',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'ctime' => 'Ctime',
            'mtime' => 'Mtime',
        ];
    }

    /**
     * @ 获取所有导航
     */
    public static function navList()
    {
        $rows = (new \yii\db\Query())
            ->select(['id', 'pid', 'title', 'link', 'icon','icon_bg'])
            ->from(self::tableName())
            ->where(['pid' => '1', 'status' => '1'])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        foreach ($rows as $key => $value) {
            $item = (new \yii\db\Query())
                ->select(['title', 'link', 'icon','icon_bg'])
                ->from(self::tableName())
                ->where(['pid' => $value['id'], 'status' => '1'])
                ->orderBy(['sort_order' => SORT_ASC])
                ->all();
            $rows[$key]['item']=$item;
        }
        return $rows;
    }
}
