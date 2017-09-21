/**
 * Created by win7 on 2017/8/15.
 */
(function(){

    //滑动导航控制
    $(".nav_btn,.mask_right").click(function(){
        $(".idx_main").toggleClass("nav_animate");
        $(".mask_right").toggleClass("mask_sh");
    })

    //iphone微信端上拉下拉，搜索框顶起监听
    $(window).scroll(function() {
        if($("body").scrollTop() < 0){
            if($(".xf_search").hasClass("xf_open")){
                $(".nav_hd").css({"top":"0"});
            }
            else {
                $(".nav_hd").addClass("th_head");
                var bdint = Math.abs($("body").scrollTop());
                $(".th_head").css({"top": bdint, "margin-top": "-.02rem"})
            }
        }
        if($("body").scrollTop() >= 0)
        {
            $(".nav_hd").removeClass("th_head");
        }
    });


    //弹窗事件

    //认领报告
    $(".rl_btn").click(function(){
        //ReportClaim
        $.ajax({
            type: 'post',
            url: "/check/report-claim/",// 请求的action路径
            dataType: "json",
            data: queryPargam,
            error: function () {// 请求失败处理函数
            },
            success: function (result) {
                if(result.err==0) {
                    rzopen();
                }else{
                    /*
                    *  todo 提示信息
                    * */
                }
            }
        });
    })

    $(".alogin_btn").click(function(){
        rzclose();
    })

    $(".qh_btn").click(function(){
        qhopen();
    })
    $(".al_btn").click(function(){
        qhclose();
    })

    $(".alert_body li").click(function(){
        $(this).siblings().removeClass("al_ck");
        $(this).addClass("al_ck");
    });

    //认领弹窗弹出 关闭
    function rzopen(){
        $(".rz_alert,.alert_mask").fadeIn();
    }
    function rzclose(){
        $(".rz_alert,.alert_mask").fadeOut();
    }

    //切换店铺弹窗弹出  关闭
    function qhopen(){
        $(".alert_body,.alert_mask").fadeIn();
    }
    function qhclose(){
        $(".alert_body,.alert_mask").fadeOut();
    }

    // 判断页面选中
    var PageUrl_bg,Page_arr,str
    if (typeof this.href === "undefined") {
        PageUrl_bg = document.location.toString().toLowerCase();
    }else {
        PageUrl_bg = this.href.toString().toLowerCase();
    }
    str=pop(PageUrl_bg).toString().split('?')[0];

    //报告页面选中
    $('.link_list a').each(function(){
        var $urlpop_bg=pop($(this).attr('href')).toString().split('?')[0];
        if(str==$urlpop_bg){
            $(this).parent().siblings().find("a").removeClass('lk_select');
            $(this).addClass('lk_select');
        }
    })

    //var navMap=['site','fastreport','check','shop','ucenter','message','user'];
    //左侧导航选中
    $('.nl_list a').each(function(){
        var $urlpop=pop($(this).attr('href')).toString().split('?')[0];
        if(str==$urlpop){
            $(this).siblings().removeClass('nal_select');
            $(this).addClass('nal_select');
        }
    })

    function pop(obj){
        var o= obj.split('/').pop();
        if(o.indexOf('-')!=-1){
            o=o.split('-')[0]+'.html';
        }
        return o;
    }
})();