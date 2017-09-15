<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '消息详情';
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
            <a href="#" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="/" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--消息详情-->
        <div class="ns_main" data-id="<?=$model->id?>">
            <div class="ns_txt"><?=Html::encode($model->message)?></div>
            <div class="ns_down">
                <div class="nsd_left"><?=date('Y-m-d H:i',$model->created_at)?></div>
                <button class="nsd_btn">删除</button>
            </div>
        </div>

        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="sd_btn"><span>店铺深度报告</span></a>
    </div>
</div>
<script>
    $(function () {
        $(".ns_main .nsd_btn").click(function () {
            var id =$(".ns_main").attr('data-id');
            $(".body_main .ns_main").remove();
            ajaxDel(id);
        });
    })
    //ajax 删除
    function ajaxDel(shopid) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var csrfParam = $('meta[name="csrf-param"]').attr("content");
        if(shopid){
            $.ajax({
                type : 'post',
                url : '/index.php/message/delete',// 请求的action路径
                dataType:"json",
                data:"id="+shopid+"&"+csrfParam+"="+csrfToken,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    location.href="<?=Url::toRoute(['message/index'])?>";
                }
            });
        }
    }
</script>
</body>
</html>