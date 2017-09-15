<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

// 运行此控制器的命令 yii curl/init
class CurlController extends Controller
{
    public function actionInit()
    {
        $url = 'https://106.14.105.200:8990/hde/datas';
        $data = 'eyJoZWFkZXIiOnsib3JnSWQiOiJBQUFBQUFBIn0sImNvbnRlbnQiOiJhYmNnZCJ9';
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_USERPWD, "superadmin:1qazXSW@");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//这个是重点。
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno' . curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话

        print_r($tmpInfo);
    }

    public function ii(){

        $food_item =array(
            'header' => array('orgId'=>'AAAAAAA','dataCategory'=>'bill_detail ','singleOrBatch'=>'S'),
            'content' => array()
        );

        foreach ($list as $key=>$value) {
            $tempArray = array_keys($value);
            foreach ($tempArray as $v) {
                $list[$key][$v] = iconv("GB2312", "UTF-8//IGNORE", $value[$v]);
            }
        }
        $tempArr = array();
        $i=0;
        foreach($list as $v) {
            $tempArr[$i]['fi_name']=$v['spellName'];
            $tempArr[$i]['fi_price']=$v['salePrice1'];
            $tempArr[$i]['fi_unit']=$v['unitno'];
            $tempArr[$i]['fi_code']=$v['itemno'];
            $tempArr[$i]['fi_zh_name']=$v['foodname'];
            $i++;
        }
        $food_item['content'] =json_encode($tempArr);
        $data = base64_encode(json_encode($food_item));
        $url='https://106.14.105.200:8990/hde/datas';
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_USERPWD, "superadmin:1qazXSW@");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//这个是重点。
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
    }
}