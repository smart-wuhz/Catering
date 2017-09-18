<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sms_log}}".
 *
 * @property string $id
 * @property string $mobile
 * @property integer $code
 * @property string $usage
 * @property string $result
 * @property string $error_code
 * @property string $error_msg
 * @property integer $used
 * @property integer $use_time
 * @property integer $create_time
 */
class SmsLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sms_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'code'], 'required'],
            [['code', 'used', 'use_time', 'create_time'], 'integer'],
            [['mobile', 'usage'], 'string', 'max' => 20],
            ['mobile', 'match', 'pattern'=>'/^1[34578][0-9]{9}$/','message'=>'请输入正确的手机号'],
            [['result'], 'string', 'max' => 80],
            [['error_code', 'error_msg'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => '手机号',
            'code' => '验证码',
            'usage' => '用途',
            'result' => '发送结果',
            'error_code' => '错误码',
            'error_msg' => '错误信息',
            'used' => '是否使用',
            'use_time' => '使用时间',
            'create_time' => '发送时间',
        ];
    }
}
