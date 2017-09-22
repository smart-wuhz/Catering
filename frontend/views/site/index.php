<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/swiper-3.4.2.min.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/swiper-3.4.2.jquery.min.js"></script>
    <script type="text/javascript" src="/js/autocomplete.js"></script>
    <title><?=Html::encode('首页')?></title>
</head>
<body>
<div class="idx_main">

    <!--公共导航-->
    <div id="header"></div>

    <div class="body_main">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>

        <!--头部导航-->
        <div class="nav_hd">
            <a href="javascript:void(0)" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="/" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--banner图-->
        <div class="swiper-container inx_swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-no-swiping">
                    <a href="<?= Url::toRoute(['shop/enter']) ?>" class="banner_img"><img src="/images/banner2.png"></a>
                </div>
            </div>
        </div>

        <!--搜索悬浮栏-->
        <div class="xf_search">
            <div class="xfs_top">
                <form action="<?=Url::toRoute(['site/index'])?>" id="siteForm" method="post">
                    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
                    <input class="xfc_ipt" placeholder="" name="name">
                </form>
                <t class="back_index">取消</t>
                <b class="xf_clean">&nbsp;</b>
            </div>
            <ul class="his_ul"></ul>
            <a href="javascript:void(0)" class="xf_shbtn">测评打分</a>
        </div>

        <!--新修搜索框-->
        <div class="new_sh">
            <form action="<?=Url::toRoute(['site/index'])?>" id="submitForm" method="post">
                <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
                <input class="nsh_ipt" placeholder="请输入店名/地址" name="name"/>
            </form>
            <a href="javascript:void(0)" class="nsh_btn">测评打分</a>
        </div>

        <!--深度报告按钮-->
        <a href="<?= Url::toRoute(['fastreport/index']) ?>" class="sd_btn"><span>店铺深度报告</span></a>
        <div class="idx_sh"></div>
    </div>
</div>
<script>
    (function () {
        //banner配置
        var swiper_idx = new Swiper('.inx_swiper', {});

        //搜索历史记录
        var history = ['百度1', '百度2', '百度3', '百度4', '百度5', '百度6', '百度7', '呵呵呵呵呵呵呵', '百度', '新浪', 'a1', 'a2', 'a3', 'a4', 'b1', 'b2', 'b3', 'b4'];
        var proposals = ['百度1', '百度2', '百度3', '百度4', '百度5', '百度6', '百度7', '呵呵呵呵呵呵呵', '百度', '新浪', 'a1', 'a2', 'a3', 'a4', 'b1', 'b2', 'b3', 'b4'];


        $('#search-form').autocomplete({
            hints: proposals,
            onSubmit: function (text) {
//                    $('#message').html('Selected: <b>' + text + '</b>');

//                    点击搜索按钮后添加搜索历史数组
                alert("添加了历史：" + text)
            }
        });


        $(".nsh_ipt").focus(function () {

            //获取列表
            getShopList();
            $(".xf_search").toggleClass("xf_open");
            $(".xfc_ipt")[0].focus();

        });

        $(".back_index").click(function () {
            $(".xf_search").toggleClass("xf_open");
        })
        $(".xf_clean").click(function () {
            $(".xfc_ipt").val("");
            $(".xfc_ipt")[0].focus();
        })

        // 选择店铺 或者地址
        var restaurantName;
        $(".xf_search ul").on("click", "li", function () {
            restaurantName = $(this).find('a').html();
            $("input[name='name']").val(restaurantName);
        });

        //js 提交表单
        $(".xf_shbtn").on('click',function () {
            $("#siteForm").submit();
        });

        $(".nsh_btn").on('click',function () {
            $("#submitForm").submit();
        });

    })();

    //ajax 获取关键字店铺
    function getShopList() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var queryParam = {"<?=Yii::$app->request->csrfParam?>": csrfToken};
        $.ajax({
            type: 'post',
            url: "<?=Url::toRoute(['site/shop-list'])?>",// 请求的action路径
            dataType: "json",
            data: queryParam,
            error: function () {// 请求失败处理函数
            },
            success: function (result) {
                if (result.err == 0) {
                    var str = '';
                    for (var i = 0; i < result.data.length; i++) {
                        str += '<li class="his_li"><a href="javascript:void(0)" class="his_link">' + result.data[i] + '</a></li>';
                    }
                    $(".xf_search .his_ul").empty().append(str);
                } else {
                    alert(result.msg);
                }
            }
        });
    }
</script>
</body>
</html>