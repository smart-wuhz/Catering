<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '消息列表';
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
    <script type="text/javascript" src="/js/slide2del.js"></script>
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
            <a href="/" class="idx"><img src="/images/idx.png"></a>
        </div>


        <!--消息列表-->
        <div class="news_main">
            <ul>
                <?php if($dataProvider):
                    foreach ($dataProvider as $k=>$item):
                ?>
                <li class="news_item" data-id="<?=$item['id']?>">
                    <div class="news_body">
                        <div class="nb_top">
                            <span class="nbt_left">【系统消息】</span>
                            <span class="nbt_right"><?=date('Y-m-d',$item->created_at)?></span>
                        </div>
                        <div class="nb_down"><?php
                            $str=mb_substr($item->message, 0, 28,  'UTF-8' );
                            if (strlen($item->message)>28){$str.='...';}
                            echo Html::encode($str);?>
                        </div>
                    </div>
                    <div class="nb_del">删除</div>
                </li>
                <?php endforeach; endif;?>
            </ul>
        </div>

        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="sd_btn"><span>店铺深度报告</span></a>

    </div>
</div>

<script>
    (function(){
        $(".news_item").slide2del({
            sItemClass: ".news_item",
            sDelBtnClass: ".nb_del",
            delHandler: function (target) {
                var id=target.attr('data-id');
                target.remove();
                ajaxDel(id);
            },
            itemClickHandler: function (target) {
                console.log("你点击了选项：" + target.attr('data-id'));
            }
        });

        $(".news_main .news_item").click(function () {
            var id =$(this).attr('data-id');
            redirect(id);
        });
    })();

    //ajax 删除
    function ajaxDel(shopid) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var csrfParam = $('meta[name="csrf-param"]').attr("content");
        if(shopid){
            $.ajax({
                type : 'post',
                url : "<?=Url::toRoute(['message/delete'])?>",// 请求的action路径
                dataType:"json",
                data:"id="+shopid+"&"+csrfParam+"="+csrfToken,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    console.log(result);
                }
            });
        }
    }

    //页面跳转
    function redirect(id) {
        location.href='/index.php/message/view?id='+id;
    }
</script>

</body>
</html>