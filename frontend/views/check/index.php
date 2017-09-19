<?php
use yii\helpers\Url;
use yii\helpers\Html;
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
    <link href="/css/data/animate.min.css" type="text/css" rel="stylesheet"><!--动画库---css-->
    <!---------------------------------------------------------------------------------------------->
    <script src="/js/data/mobiscroll_002.js" type="text/javascript"></script>
    <script src="/js/data/mobiscroll_004.js" type="text/javascript"></script>
    <link href="/css/data/mobiscroll_002.css" rel="stylesheet" type="text/css">
    <link href="/css/data/mobiscroll.css" rel="stylesheet" type="text/css">
    <script src="/js/data/mobiscroll.js" type="text/javascript"></script>
    <script src="/js/data/mobiscroll_003.js" type="text/javascript"></script>
    <script src="/js/data/mobiscroll_005.js" type="text/javascript"></script>
    <link href="/css/data/mobiscroll_003.css" rel="stylesheet" type="text/css">
    <script src="/js/data/data.js" type="text/javascript"></script>
    <title><?=Html::encode('我的报告')?></title>
</head>
<body>
<!---->
<div class="idx_main ">

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
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <div class="sx_mask">&nbsp;</div>

        <!--推荐筛选弹窗-->
        <div class="tj_alert tj_ddd">
            <div class="al_tit">
                <a href="javascript:void(0)" class="albtn_left">取消</a>
                <a href="javascript:void(0)" class="albtn_right">确定</a>
            </div>
            <div class="alsx_body swiper-container tj_swp" >
                <div class="dwwo">&nbsp;</div>
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">下滑选择推荐</li>
                    <li class="swiper-slide" data-id="1">最新</li>
                    <li class="swiper-slide" data-id="2">评分最高</li>
                    <li class="swiper-slide" data-id="3">最新</li>
                    <li class="swiper-slide" data-id="4">评分最高</li>
                    <li class="swiper-slide">已加载全部推荐</li>
                </ul>
            </div>
        </div>

        <!--店铺筛选弹窗-->
        <div class="tj_alert dp_ddd">
            <div class="al_tit">
                <a href="javascript:void(0)" class="albtn_left">取消</a>
                <a href="javascript:void(0)" class="albtn_right">确定</a>
            </div>
            <div class="alsx_body swiper-container dp_swp" id="shopOder">
                <div class="dwwo">&nbsp;</div>
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">下滑选择店铺</li>
                    <?php foreach ($shopList as $value):?>
                        <li class="swiper-slide" data-id="<?=$value['id']?>"
                         org-id="<?=$value['orgid']?>" ><?=$value['name']?></li>
                    <?php endforeach;?>
                    <li class="swiper-slide">已加载全部店铺</li>
                </ul>
            </div>
        </div>

        <!--时间筛选弹窗-->
        <div class="tj_alert tm_ddd">
            <div class="al_tit">
                <a href="javascript:void(0)" class="albtn_left">取消</a>
                <a href="javascript:void(0)" class="albtn_right">确定</a>
            </div>
            <div class="alsx_body swiper-container tm_swp" id="timeOder">
                <div class="dwwo">&nbsp;</div>
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">下滑选择时间</li>
                    <li class="swiper-slide" data-id="1">日</li>
                    <li class="swiper-slide" data-id="2">周</li>
                    <li class="swiper-slide" data-id="3">月</li>
                    <li class="swiper-slide" data-id="4">季</li>
                    <li class="swiper-slide" data-id="5">年</li>
                    <li class="swiper-slide time_sx">自定义</li>
                    <li class="swiper-slide">已加载所有时间</li>
                </ul>
            </div>
        </div>

        <!--报告列表切换-->

        <div class="login_swbox swiper-container sx_box">
            <div class="nav_swipper">
                <a class="login_link cknav">基础报告</a>
                <a class="register_link">进阶报告</a>
            </div>

            <div class="bg_sx">
                <a href="javascript:void(0)" class="sx_item tj_sx bgsx_ck">推荐排序</a>
                <a href="javascript:void(0)" class="sx_item dp_sx">店铺筛选</a>
                <a href="javascript:void(0)" class="sx_item tm_sx">时间排序</a>
            </div>

            <input name="appDate" id="appDate"  type="text" value="" style="opacity: 0;position: absolute;z-index: 1;right: 100vh;top: 0;">

            <!--内容切换-->
            <div class="swiper-wrapper">
                <div class="swiper-slide">

                    <!--我的店铺-->
                    <div class="mb_box bg_swp" id="baseReport">
                        <!--<div class="mb_item mb_two dp_box">
                            <div class="mbi_name">
                                <span class="mbi_left">家之味大时代报告</span>
                                <span class="dp_right">11:04</span>
                                <span class="dp_right">2017-08-04</span>
                            </div>
                            <div class="dp_dz">
                                <span class="mbi_left">总评：9.6分</span>
                            </div>

                            <div class="dp_ckbox">
                                <a href="#" class="dp_right">删除</a>
                                <a href="#" class="dp_right">查看</a>
                            </div>
                        </div>
                        <div class="mb_item mb_two dp_box">
                            <div class="mbi_name">
                                <span class="mbi_left">家之味大时代报告</span>
                                <span class="dp_right">11:04</span>
                                <span class="dp_right">2017:-08-04</span>
                            </div>
                            <div class="dp_dz">
                                <span class="mbi_left">总评：9.6分</span>
                            </div>

                            <div class="dp_ckbox">
                                <a href="#" class="dp_right">删除</a>
                                <a href="#" class="dp_right">查看</a>
                            </div>
                        </div>-->
                    </div>

                </div>
                <div class="swiper-slide">

                    <!--我的店铺-->
                    <div class="mb_box bg_swp" id="deepReport">
                        <!--<div class="mb_item mb_two dp_box">
                            <div class="mbi_name">
                                <span class="mbi_left">家之味大时代报告</span>
                                <span class="dp_right">11:04</span>
                                <span class="dp_right">2017-08-04</span>
                            </div>
                            <div class="dp_dz">
                                <span class="mbi_left">总评：9.6分</span>
                            </div>

                            <div class="dp_ckbox">
                                <a href="#" class="dp_right">删除</a>
                                <a href="#" class="dp_right">查看</a>
                            </div>
                        </div>
                        <div class="mb_item mb_two dp_box">
                            <div class="mbi_name">
                                <span class="mbi_left">家之味大时代报告</span>
                                <span class="dp_right">11:04</span>
                                <span class="dp_right">2017:-08-04</span>
                            </div>
                            <div class="dp_dz">
                                <span class="mbi_left">总评：9.6分</span>
                            </div>

                            <div class="dp_ckbox">
                                <a href="#" class="dp_right">删除</a>
                                <a href="#" class="dp_right">查看</a>
                            </div>
                        </div>-->
                    </div>

                </div>


            </div>
        </div>

    </div>
</div>

<script> 
    // ????? 全局变量在函数内部改动后，值不变  ？？？？？？
    var activeIndex; 

    $(function(){
        //推荐筛选
        $(".tj_sx").click(function(){
            tjsxalertOpne();
        })

        //店铺筛选
        $(".dp_sx").click(function(){
            dpsxalertOpne();
        })

        //时间筛选
        $(".tm_sx").click(function(){
            tmsxalertOpne();
        })

        //筛选取消
        $(".albtn_left").click(function(){
            tjsxalertClose();
            dpsxalertClose();
            tmsxalertClose();
        })

        //当前活动页面 0为基础报告 1为进阶报告
        var mySwiper = new Swiper('.login_swbox', {
            onSlideChangeStart: function(swiper){
                activeIndex = mySwiper.activeIndex;
                console.log(activeIndex);
                $(".nav_swipper").find("a").removeClass("cknav");
                $(".nav_swipper").find("a").eq(activeIndex).addClass("cknav");
            }
        });
        
        $(".nav_swipper").find("a").each(function(index){
            $(this).click(function(){
                $(".nav_swipper").find("a").removeClass("cknav");
                $(this).addClass("cknav");
                mySwiper.slideTo(index);
            })
        });

        //筛选选中切换
        $(".bg_sx a").click(function(){
            $(".bg_sx").find("a").removeClass("bgsx_ck");
            $(this).addClass("bgsx_ck");
        })

        //自定义时间选择    
        $(".time_sx").click(function(){
            tmsxalertClose();
            $("#appDate")[0].focus();
        })

         //请求
        var data = {
            'activeIndex':activeIndex
        };
        ajaxRequset(data);

        //推荐确认
        $(".tj_ddd").delegate("a[class='albtn_right']",'click',function(){
            var cateID=$(".tj_ddd .swiper-slide-next").attr('data-id');
            data.recommend=cateID; 
            console.log(data); 
            ajaxRequset(data);  
            tjsxalertClose();    
        });

        //店铺筛选确认
        $(".dp_ddd").delegate("a[class='albtn_right']",'click',function(){
            var id=$(".dp_ddd .swiper-slide-next").attr('data-id');
            var orgID=$(".dp_ddd .swiper-slide-next").attr('org-id');
            data.orgID=orgID; 
            data.id=id;
            console.log(data); 
            ajaxRequset(data);  
            dpsxalertOpne();    
        });

        //时间筛选确认
        $(".tm_ddd").delegate("a[class='albtn_right']",'click',function(){
            var time=$(".tm_ddd .swiper-slide-next").attr('data-id');
            data.time=time;
            //console.log(data); 
            ajaxRequset(data);  
            tmsxalertClose();    
        });

    });


    //推荐筛选弹窗开关
    function tjsxalertOpne(){
        $(".sx_mask,.tj_ddd").addClass("al_open");
        var swiper_tj = new Swiper('.tj_swp', {
            direction: 'vertical',
            slidesPerView: 3,
            paginationClickable: true,
            mousewheelControl: true
        });
    }

    function tjsxalertClose(){
        $(".sx_mask,.tj_ddd").removeClass("al_open");
    }

    //店铺筛选
    function dpsxalertOpne(){
        $(".sx_mask,.dp_ddd").addClass("al_open");
        var swiper_dp = new Swiper('.dp_swp', {
            direction: 'vertical',
            slidesPerView: 3,
            paginationClickable: true,
            mousewheelControl: true
        });

    }
    function dpsxalertClose(){
        $(".sx_mask,.dp_ddd").removeClass("al_open");
    }

    //时间筛选
    function tmsxalertOpne(){
        $(".sx_mask,.tm_ddd").addClass("al_open");
        var swiper_tm = new Swiper('.tm_swp', {
            direction: 'vertical',
            slidesPerView: 3,
            paginationClickable: true,
            mousewheelControl: true
        });
    }
    function tmsxalertClose(){
        $(".sx_mask,.tm_ddd").removeClass("al_open");
    }

    //ajaxRequset
    function ajaxRequset(queryPargam)
    {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var csrfParam = $('meta[name="csrf-param"]').attr("content");
        if (queryPargam) {
            queryPargam[csrfParam] = csrfToken;
            $.ajax({
                type: 'post',
                url: "<?=Url::toRoute(['check/index'])?>",// 请求的action路径
                dataType: "json",
                data: queryPargam,
                error: function () {// 请求失败处理函数
                },
                success: function (result) {
                    if(result.err==0) {
                        //基础报告
                        var baseStr='';
                        for (var i = 0; i < result.result.baseReport.length; i++) {
                            var item=result.result.baseReport;
                            baseStr += '<div class="mb_item mb_two dp_box">'
                                    + '	<div class="mbi_name">'
                                    + '		<span class="mbi_left">'+item[i].title+'</span>'
                                    + '		<span class="dp_right">'+item[i].time.substring(11,16)+'</span>'
                                    + '		<span class="dp_right">'+item[i].time.substring(0,10)+'</span>'
                                    + '	</div>'
                                    + '	<div class="dp_dz">'
                                    + '		<span class="mbi_left">总评：'+item[i].score+'分</span>'
                                    + '	</div>'
                                    + '	<div class="dp_ckbox">'
                                    + '		<a href="javascript:void(0)" class="dp_right delRport" data-id="'+item[i].id+'">删除</a>'
                                    + '		<a href="#" class="dp_right">查看</a>'
                                    + '	</div>'
                                    + '</div>'
                        }
                        $("#baseReport").empty().append(baseStr);

                        //深度报告
                        var deepStr='';
                        for (var i = 0; i < result.result.deepReport.length; i++) {
                            var item=result.result.deepReport;
                            deepStr += '<div class="mb_item mb_two dp_box">'
                                + '	<div class="mbi_name">'
                                + '		<span class="mbi_left">'+item[i].title+'</span>'
                                + '		<span class="dp_right">'+item[i].time.substring(11,16)+'</span>'
                                + '		<span class="dp_right">'+item[i].time.substring(0,10)+'</span>'
                                + '	</div>'
                                + '	<div class="dp_dz">'
                                + '		<span class="mbi_left">总评：'+item[i].score+'分</span>'
                                + '	</div>'
                                + '	<div class="dp_ckbox">'
                                + '		<a href="javascript:void(0)" class="dp_right delRport" data-id="'+item[i].id+'">删除</a>'
                                + '		<a href="#" class="dp_right">查看</a>'
                                + '	</div>'
                                + '</div>'
                        }
                        $("#deepReport").empty().append(deepStr);

                    }else{
                        alert(result.msg);
                    }
                }
            });
        }
    }
</script>
</body>
</html>