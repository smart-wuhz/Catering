<?php

namespace common\helps;
use common\models\SmsLog;
use common\helps\Tools;
use Yii;

class Sms
{
    public $mobile;
    public $usage;

    private $verifyCode;
    private $length;

    /*
     * 短信息发送 
     * @pargam array $param ['mobile'=>'','usage'=>'']
     * @pargam int   $length  默认 6  
     * */    
    public function __construct( $param=array(), $length = '6')
    {
        $this->length = $length ? $length : 6;
        $this->mobile = isset($param['mobile']) ? $param['mobile'] :'';
        $this->usage  = isset($param['usage']) ? $param['usage'] :'';
        $this->verifyCode=$this->generateCode();
    }

    /*
     * send sms code
     * return bool 
     * */
    public function send()
    {
        if($this->saveVerifyCode()){
            return false;
        }

        $mkey = Yii::$app->params['smser']->apiKey;
        $url = Yii::$app->params['smser']->url;

        $params = array(
              'mobile'=>$this->mobile,
              'msg'=>$this->createContent(),
              'uid'=>Yii::$app->params['smser']->uid,
        );
        $signStr = $this->createSign ( $params, $mkey );
        $params["sign"] = strtoupper ( md5 ( $signStr ) );
        $paramstring = http_build_query ( $params );
        $content = Tools::curl( $url, $paramstring ); 

        //成功
        return ($result && ($result ["err"] == "0")) ? true :false;
    }


    /*
     * save verifyCode
     * */
    public  function saveVerifyCode()
    {
        $model = new SmsLog();
        $param=[
            'mobile'=>$this->mobile,
            'usage'=>$this->usage,
        ];
        if ($model->load($param) &&$model->validate()) {
             $model->mobile = $this->mobile;
            $model->code = $this->verifyCode;
            $model->usage = $this->usage;
            $model->create_time = time();
            return $model->save() ? true : false;   
        }else{
            return false;
        }
    }

    /*
     * 生成6位数验证码
     * */
    protected function generateCode()
    {
        return rand(pow(10, ($length - 1)), pow(10, $this->length) - 1);
    }

    /*
     * 生成短信内容
     * */
    protected function createContent($smsType='verifyCode')
    {   
        $content='';
        switch ($smsType) {
                case 'value':
                    # code...
                    break;
                
                default:
                    $content =Yii::$app->params['smser']->verifyCode;
                    break;
            } 
        $content=str_replace('{code}',$this->verifyCode,$content); 
        
        return $content;   
    }   

    /**
     * 短息发送生成待签名参数串
     * 
     * @access private
     * @param array $param 业务参数
     * @param string $mkey 商户md5密钥
     *  return string
     */
    private function createSign($param = array(), $mkey = "") 
    {
        ksort ( $param );
        $string = "";
        foreach ( $param as $key => $val ) {
            if ($key != "" && $val != "") {
                $string .= $key . "=" . $val . "&";
            }
        }
        $string .= "key=" . $mkey;
        return $string;
    }
}