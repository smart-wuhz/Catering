<?php

namespace common\helps;

class Tools
{
    //curl请求    $cookiePath保存cookie的路径，$cookieFlag是否带cookie请求
    public static function curl($url, $data = array(), $timeout = 10, $type = '', $header = array(), $file = 0, $cookiePath = '', $cookieFlag = 0, $userPWD = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($timeout > 0) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        }
        if (strstr($url, 'https://')) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }
        $user_agent = "Haoduo Curl/1.0";
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

        curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $header = $header ? $header : array();

        if ($type == 'json') {
            $header[] = 'Content-Type: application/json; charset=utf-8';
            $header[] = 'Cache-Control: no-cache';
        } elseif ($type == 'xml') {
            $header[] = 'Content-Type: text/xml; charset=utf-8';
        }

        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        if (!empty($cookiePath)) {
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiePath);
        }
        if ($cookieFlag == 1) {
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiePath);
        }

        if (!empty($userPWD)) {//http Digest
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, $userPWD);
        } else {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "superadmin:1qazXSW@");
        }
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        return $error ? $error : json_decode($result, true);
    }
}