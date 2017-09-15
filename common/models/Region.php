<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%system_region}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property integer $grade
 * @property integer $sort_order
 * @property integer $status
 * @property string $en_name
 * @property string $initial
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'grade', 'sort_order', 'status'], 'integer'],
            [['name', 'en_name'], 'string', 'max' => 64],
            [['initial'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '地区id',
            'name' => '地区名称',
            'pid' => '父级地区id',
            'grade' => '地区级别：1、省 2、市 3、区县',
            'sort_order' => '序号',
            'status' => '状态：0、未使用 1、使用',
            'en_name' => '英文名全称',
            'initial' => '英文名首字母',
        ];
    }


    /**
     * 根据地区 ID 获取完整的地区名称路径
     *
     * @param integer $region_id 地区 ID
     * @param boolean $is_contain_country 返回结果中是否包含国家
     * @param boolean $is_contain_lastgrade 返回结果中是否包含最后一级节点
     *
     * @return string
     */
    public static function getNameAllByRegionid($region_id, $is_contain_country = false, $is_contain_lastgrade = true)
    {
        $region_id = (int)$region_id;

        /* 获取当前地区信息 */
        $region_now = self::findAll(['id' => $region_id])->select(['id', 'grade', 'name', 'pid'])->all()->toArray();

        if (empty($region_now)) {
            return null;
        }

        /* 若当前地区已经是顶级，则直接返回地区名称 */
        if ($region_now['grade'] == 1) {
            return $region_now['region_name'];
        }

        /* 获取所有父级信息 */
        $hid_arr = explode(':', $region_now['pid']);
        unset($hid_arr[0], $hid_arr[$region_now['grade']]); // 去掉首尾
        $region_parents = self::findAll(['id' => $hid_arr])->select(['grade', 'name'])->all()->toArray();

        if (empty($region_parents)) {
            return null;
        }

        /* 对结果进行排序 */
        $grade_arr = [];
        foreach ($region_parents as $k => $v) {
            $grade_arr[] = $v['grade'];
        }
        array_multisort($grade_arr, SORT_ASC, $region_parents);

        /* 处理国家 */
        if (false == $is_contain_country) {
            unset($region_parents[0]);
        }

        /* 返回地区路径名称 */
        $result_arr = [];
        foreach ($region_parents as $k => $v) {
            $result_arr[] = $v['name'];
        }

        return implode(' ', $result_arr);
    }

    /**
     * 根据地区 ID 字符串 [310000,310100,310115] 获取地区名称
     * @param $region_id
     * @return null
     */
    public static function getNameByRegionid($region_id = '')
    {
        if (empty($region_id)) {
            return '';
        }
        $rids = explode(',', $region_id);

        $str = [];
        foreach ($rids as $val) {
            $item = self::find()->where(['id' => $val])->select(['name'])->one()->toArray();
            $str[] = $item['name'];
        }
        return implode(',', $str);
    }
}