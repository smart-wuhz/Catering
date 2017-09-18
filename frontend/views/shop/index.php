<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '我的店铺';
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
            <a href=" javascript:void(0)" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--我的店铺-->
        <?php
        
foreach ($dataProvider as $key => $item) :
            ?>
        <div class="mb_box">
            <div class="mb_item mb_two dp_box">
                <div class="mbi_name">
                    <span class="mbi_left"><?=$item['name']?></span>
                    <span class="dp_right"><?=$item->cookstyle->name;?></span>
                    <span class="dp_right"><?=$item->shopcate->name;?></span>
                </div>
                <div class="dp_dz">
                    <span class="mbi_left"><?=$item['address']?></span>
                </div>

                <div class="dp_ckbox">
                    <div class="dbck_ed">
                        <input class="ck_dp" type="radio" name="default" shopid="<?=$item['id']?>" <?php
            
if ($item['default']) :
                ?> checked <?php endif;
            
            ?>>
                        <label></label>
                        <i>设为默认</i>
                    </div>
                    <a href="<?=Url::toRoute(['shop/delete','id' => $item['id']])?>" class="dp_right dp_del">删除</a>
                    <a href="<?=Url::toRoute(['shop/update','id' => $item['id']])?>" class="dp_right dp_bj">编辑</a>
                </div>
            </div>
            <?php
        
endforeach
        ;
        ?>
            <a href="<?=Url::toRoute(['shop/create'])?>" class="dp_btn">新增店铺</a>

        </div>
    </div>
</div>
<script>
    (function () {
        $(".dp_box .dbck_ed").click(function () {
            $(this).parent().parent("").siblings(".dp_box").find(".ck_dp").attr("checked", false)
            $(this).find(".ck_dp").attr("checked", true);
            var shopid =$(this).find(".ck_dp").attr('shopid');
            console.log(shopid);
            updateDefault(shopid);
        })
    })();

    //更新默认店铺
    function updateDefault(shopid) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var csrfParam = $('meta[name="csrf-param"]').attr("content");
        if(shopid){
            $.ajax({
                type : 'post',
                url : '/index.php/shop/update-default',// 请求的action路径
                dataType:"json",
                data:"shopid="+shopid+"&"+csrfParam+"="+csrfToken,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    console.log(result);
                }
            });
        }
    }
</script>

</body>
</html>
