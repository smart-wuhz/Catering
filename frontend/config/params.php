<?php
return [
    'adminEmail' => 'admin@example.com',

    //api 请求地址
    'apiHost'=>'https://106.14.105.200:8990',

    //superOrgId 超级orgID
    'superOrgID'=>'AAAAAAA',

    //短信配置
    'smser' => [
        'url' => 'https://api.haoduoshuju.com/life/sms/send', 
        'uid'=>'101403',
        'apiKey' => 'B2B1935C9C215A15',
        
        //短信模板
	    'smsTemplte'=>[
	    	'verifyCode'=>'【好多数据】验证码：{code}，切勿泄漏给他人，有效期10分钟，如非本人操作请忽略。',
            'userPasswordReset'=>'【好多数据】验证码：{code}，切勿泄漏给他人，有效期10分钟，如非本人操作请忽略。',
	    ],
 	],
];
