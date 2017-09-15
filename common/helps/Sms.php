<?php

namespace common\helps;
use common\models\SmsLog;

class Sms
{
    public $mobile;
    public $usage;
    private $length;

    public function __construct($length = '6')
    {
        $this->length = $length ? $length : 6;
    }

    /*
     *  send sms code
     * */
    public static function send()
    {

    }


    /*
     * save verifyCode
     * */
    public  function saveVerifyCode()
    {
        $model = new SmsLog();
        if ($model->validate()) {
            $model->mobile = $this->mobile;
            $model->code = $this->generateCode();
            $model->usage = $this->usage;
            $model->create_time = time();
            return $model->save() ? true : false;
        } else {
            return false;
        }
    }

    /*
     * 生成6位数验证码
     * */
    private function generateCode()
    {
        $length = self::$length;
        return rand(pow(10, ($length - 1)), pow(10, $length) - 1);
    }
}