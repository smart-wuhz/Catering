<?php
use \yii\helpers\Url;
use yii\helpers\Html;
$this->title = '个人中心';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?=Html::csrfMetaTags()?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/swiper-3.4.2.min.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/swiper-3.4.2.jquery.min.js"></script>
    <title><?=Html::encode($this->title)?></title>
</head>
<body>
<div class="idx_main ">

    <!--公共导航-->
    <div id="header"></div>

    <div class="body_main ">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd">
            <a href="javascript:void(0)" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--个人中心-->
        <div class="mb_box">

            <div class="mb_item">
                <span class="mbi_left">昵称</span>
                <a href="<?=Url::toRoute(['ucenter/update','id'=>$model->id,'type'=>'username'])?>">
                <span class="mbi_right arr_right"><?=$model->username?></span>
                </a>
            </div>

            <div class="mb_item">
                <span class="mbi_left">邮箱</span>
                <a href="<?=Url::toRoute(['ucenter/update','id'=>$model->id,'type'=>'email'])?>">
                    <span class="mbi_right arr_right"><?=substr_replace($model->email,'****','-12','4')?></span>
                </a>
            </div>

            <div class="mb_item">
                <span class="mbi_left">手机号码</span>
                <a href="<?=Url::toRoute(['ucenter/update','id'=>$model->id,'type'=>'mobile'])?>">
                    <span class="mbi_right arr_right"><?=substr_replace($model->mobile,'****','3','4')?></span>
                </a>
            </div>
        </div>

    </div>
</div>
</body>
</html>