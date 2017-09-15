<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
    <title>数据接入</title>
</head>
<body>
<!---->
<div class="idx_main  page_full">

    <!--公共导航(满屏)-->
    <div id="header"></div>

    <div class="body_main  ">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd ">
            <a href="#" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="/" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--登录注册切换-->

        <div class="login_swbox swiper-container">
            <div class="nav_swipper">
                <a class="login_link cknav">接入接口</a>
                <a class="register_link">录入数据</a>
            </div>

            <!--内容切换-->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="jr_banner">
                        <img src="/images/jr_banner.png">
                    </div>
                    <div class="pictit">
                        <img src="/images/pictit.png">
                    </div>

                    <!--接入系统滑动-->
                    <div class="swiper-container jr_swp">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/images/jqr_a.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_b.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_c.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_d.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_e.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_f.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_g.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_h.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_b.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_c.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_d.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_g.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_h.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_g.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_f.png"></div>
                            <div class="swiper-slide"><img src="/images/jqr_b.png"></div>
                        </div>
                    </div>

                    <!--接入系统底部-->
                    <div class="jr_bottom">
                        <span class="jr_tt">如没有您所用的系统，请留下您用的系统名称，我们会尽快处理！</span>
                        <div class="input_box">
                            <?php $form = ActiveForm::begin(['action' => ['feedback/create'],'method'=>'post']); ?>
                            <div class="ib_full">
                                <?= $form->field($feedback, 'title')->textInput(['placeholder' =>'请输入您所用的系统名称'])->label(false) ?>
                            </div>
                            <div class="ib_full">
                                <!--<input placeholder="请输入您的邮箱" type="text"/>-->
                                <?= $form->field($feedback, 'email')->textInput(['placeholder' =>'请输入您的邮箱'])->label(false) ?>
                            </div>
                           <!-- <a href="#" class="lg_btn">提交</a>-->
                            <?=Html::submitButton('提交', ['class' => 'lg_btn']) ?>
                            <?php ActiveForm::end(); ?>
                            <a href="tel:4008210689" class="tel_lin">客服电话：400 8210 689</a>
                        </div>
                    </div>

                </div>

                <!--录入数据-->
                <div class="swiper-slide">
                    <div class="lr_item">
                        <div class="lri_tit">
                            基础数据（必填）
                        </div>
                        <div class="lri_top">
                            <div class="max_inp">
                                <label>店铺名称：</label>
                                <input type="text" placeholder="输入店名或地址">
                            </div>
                            <div class="lri_toptwo">
                                <div class="ltt">
                                    <label>今日收入：</label>
                                    <input type="text" placeholder="输入营业额">
                                    <i>元</i>
                                </div>
                                <div class="ltt">
                                    <label>今日支出：</label>
                                    <input type="text" placeholder="输入花费">
                                    <i>元</i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="add_item">
                        <div class="lri_tit">
                            进阶数据（选填）
                        </div>
                        <div class="add_box">
                            <label>变动数据</label>
                            <a href="#" class="add_btn ab_one">添加+</a>
                        </div>
                        <div class="input_list ipl_one">
                            <ul>
                                <li><input placeholder="输入菜名" /><input placeholder="输入单价" /><input placeholder="输入成本" /></li>
                                <li><input placeholder="输入菜名" /><input placeholder="输入单价" /><input placeholder="输入成本" /></li>
                            </ul>
                        </div>
                    </div>

                    <div class="add_item">
                        <div class="lri_tit">
                            固定成本
                        </div>
                        <div class="add_box">
                            <label>变动数据</label>
                            <a href="#" class="add_btn ab_two">添加+</a>
                        </div>
                        <div class="input_list ipl_two">
                            <ul>
                                <li><input placeholder="请输入成本名称" /><input placeholder="输入成本" /></li>
                                <li><input placeholder="请输入成本名称" /><input placeholder="输入成本" /></li>
                            </ul>
                        </div>
                    </div>

                    <a href="#" class="lg_btn" style="margin-top: .1rem;margin-bottom: .1rem;">提交</a>

                </div>


            </div>
        </div>

    </div>
</div>

<script>
    (function(){

        var mySwiper = new Swiper('.login_swbox', {
            onSlideChangeStart: function(swiper){
                var swb_index = mySwiper.activeIndex;
                $(".nav_swipper").find("a").removeClass("cknav");
                $(".nav_swipper").find("a").eq(swb_index).addClass("cknav");
            }
        });
        var swb_index = mySwiper.activeIndex;
        $(".nav_swipper").find("a").removeClass("cknav");
        $(".nav_swipper").find("a").eq(swb_index).addClass("cknav");

        $(".nav_swipper").find("a").each(function(index){
            $(this).click(function(){
                $(".nav_swipper").find("a").removeClass("cknav");
                $(this).addClass("cknav");
                mySwiper.slideTo(index);
            })
        });

//        接入系统导航
        var swiper = new Swiper('.jr_swp', {
            slidesPerView: 4,
            slidesPerColumn: 2,
            paginationClickable: true
        });


//        添加元素
        $(".ab_one").click(function(){
            $(".ipl_one ul").append("<li><input placeholder='输入菜名' /><input placeholder='输入单价' /><input placeholder='输入成本' /></li>");
        })

        $(".ab_two").click(function(){
            $(".ipl_two ul").append(" <li><input placeholder='请输入成本名称' /><input placeholder='输入成本' /></li>");
        })

    })();
</script>
</body>
</html>