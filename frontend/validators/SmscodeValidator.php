<?php
namespace frontend\validators;

use common\models\SmsLog;
use yii\validators\Validator;

/**
 * 短信验证码验证器
 * Class SmscodeValidator
 */
class SmscodeValidator extends Validator
{
    /**
     * 对应Smslog表中的usage字段，用来匹配不同用途的验证码
     * @var string sms code type
     */
    public $usage;

    /**
     * Model或者form中提交的手机号字段名称
     * @var string
     */
    public $phoneAttribute = 'mobile';

    /**
     * 验证码过期时间
     * @var int
     */
    public $expireTime = 10800;

    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $fieldName = $this->phoneAttribute;
        $cellPhone = $model->$fieldName;

        $smsLog = SmsLog::find()->where([
            'mobile' => $cellPhone,
            'usage' => $this->usage
        ])->orderBy('create_time DESC')->one();

        /** @var $smsLog SmsLog */
        $time = time();
        if(
            is_null($smsLog) ||
            ($smsLog->code != $model->$attribute) ||
            ($smsLog->create_time > $time || $time > ($smsLog->create_time + $this->expireTime) )
        ) {
            $this->addError($model, $attribute,'验证码有误');
        }else{
            $smsLog->used = 1;
            $smsLog->use_time = $time;
            $smsLog->save();
        }
    }
}