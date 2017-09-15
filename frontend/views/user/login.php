<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '登录 | 注册';
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
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<!---->
<div class="idx_main ">

    <!--公共导航-->
    <div id="header"></div>

    <div class="body_main ">

        <!--登录注册验证弹窗提示-->
        <div class="lg_alert">
            <span>账号密码不匹配</span>
        </div>

        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd">
            <a href="javascript:void(0)" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="<?=Url::to(['assessment/index'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--登录注册切换-->

        <div class="login_swbox swiper-container">
            <div class="nav_swipper">
                <a class="login_link cknav">登录</a>
                <a class="register_link">注册</a>
            </div>

            <!--内容切换-->
            <div class="swiper-wrapper login_swp">
                <div class="swiper-slide dl_box">
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => ['user/login'], 'method'=>'post',]);?>
                    <div class="input_box">
                        <div class="ib_full name_inp">
                            <?= $form->field($model, 'username')->textInput(['placeholder'=>'手机号/用户名/邮箱'])->label(false);?>
                        </div>
                        <div class="ib_full pasd_inp">
                            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'密码'])->label(false); ?>
                        </div>
                        <?=Html::submitButton('登录', ['class' => 'lg_btn']) ?>

                        <!--记住账号-->
                        <div class="lost_psd">
                            <div class="lis_name">
                                <!--<input type="hidden" name="LoginForm[rememberMe]" value="0">
                                <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="" calss="lis_ckbox">
                                <i></i>记住账号-->
                                <?=$form->field($model, 'rememberMe')->checkbox([
                                    'calss'=>'lis_ckbox',
                                    'template' => "{input}\n{label}\n<i></i>\n{hint}\n{error}",
                                    'label' => '记住账号',
                                ])?>
                            </div>
                            <?=Html::a('忘记密码?', ['user/request-password-reset'],['class' => 'los_btn'])?>
                        </div>

                        <!--第三方登录-->
                        <div class="login_ft">
                            <div class="lgf_tit">
                                <div class="lgft_txt">使用其他账号登录</div>
                            </div>
                            <div class="ft_link">
                                <a href="#" class="wx_link"><img src="/images/qq.png"><span>QQ</span></a>
                                <a href="#" class="wx_link"><img src="/images/wx.png"><span>微信</span></a>
                                <a href="#" class="wx_link"><img src="/images/wb.png"><span>微博</span></a>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end();?>
                </div>

                <div class="swiper-slide zc_box">
                    <?php $sign = ActiveForm::begin(['id' => 'signup-form','action' => ['user/signup'],'method'=>'post','enableAjaxValidation'=>true]);?>
                    <div class="input_box">
                        <div class="ib_full">
                            <?= $sign->field($signup, 'mobile')->textInput(['placeholder'=>'请输入手机号'])->label(false);?>
                        </div>
                        <div class="ib_full yzm_box">
                            <input type="text" id="signupform-verifyCode" class="form-control" name="SignupForm[verifyCode]" placeholder="请输入验证码" aria-required="true">
                            <?= Html::buttonInput('获取验证码', ['class' => 'yzm_btn yb_ck', 'name' => 'send-button', 'id' => 'sendCode']) ?>
                        </div>
                        <div class="ib_full">
                            <?= $form->field($signup, 'password')->passwordInput(['placeholder'=>'请输入密码'])->label(false); ?>
                        </div>
                        <div class="ib_full">
                            <?= $form->field($signup, 'repassword')->passwordInput(['placeholder'=>'请再次输入密码'])->label(false); ?>
                        </div>
                        <?=Html::submitButton('提交', ['class' => 'lg_btn']) ?>

                        <!--记住账号-->
                        <div class="lost_psd">
                            <div class="lis_name">
                                <?= $form->field($signup, 'agreement')->checkbox(['calss'=>'lis_ckbox','label' => '我认真阅读并接受<a href="#">《好多数据协议》</a>'])?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end();?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    (function () {
        var mySwiper = new Swiper('.login_swbox', {
            onSlideChangeStart: function (swiper) {
                var swb_index = mySwiper.activeIndex;
                $(".nav_swipper").find("a").removeClass("cknav");
                $(".nav_swipper").find("a").eq(swb_index).addClass("cknav");
            }
        });
        var swb_index = mySwiper.activeIndex;
        $(".nav_swipper").find("a").removeClass("cknav");
        $(".nav_swipper").find("a").eq(swb_index).addClass("cknav");

        var type="<?=$type?>";
        if(type=='signup') {
            mySwiper.slideTo(1);
        }
        $(".nav_swipper").find("a").each(function (index) {
            $(this).click(function () {
                $(".nav_swipper").find("a").removeClass("cknav");
                $(this).addClass("cknav");
                mySwiper.slideTo(index);
            })
        });


//        手机验证
        var countdown = 60;

        function settime(obj) {
            if (countdown == 0) {
                obj.removeAttribute("disabled");
                obj.value = "获取验证码";
                countdown = 60;
                $(obj).addClass("yb_ck");
                return;
            } else {
                obj.setAttribute("disabled", true);
                obj.value = "重新发送(" + countdown + ")";
                $(obj).removeClass("yb_ck");
                countdown--;
            }
            setTimeout(function () {
                    settime(obj)
            }, 1000)
        }

        $(".yzm_btn").click(function () {
            var url="<?=Url::toRoute(['sms/create'])?>";
            var csrfToken = "<?=Yii::$app->request->csrfToken?>";

            var mobile=$("#signupform-mobile").val();
            var queryParam={mobile:mobile,usage:"userRegister","<?=Yii::$app->request->csrfParam?>":csrfToken};
            doPostBack(url,queryParam);
            settime(this);
        })

        //检测此账号是否注册
        function dbCheckMobileExists(url,queryParam){
            $.ajax({
                async : false,
                cache : false,
                type : 'POST',
                url : url,// 请求的action路径
                data:queryParam,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    if(result=='Success'){
                        return true;
                    }
                    else{
                        alert('该手机号码不存在！');
                        return false;
                    }
                }
            });
        }

        //提交发送短信
        function doPostBack(url,queryParam) {
            $.ajax({
                async : false,
                cache : false,
                type : 'POST',
                url : url,// 请求的action路径
                dataType:"json",
                data:queryParam,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    if(result.status =='0'){
                        alert('短信发送成功，验证码10分钟内有效,请注意查看手机短信。如果未收到短信，请在60秒后重试！');
                    }
                    else{
                        alert('短信发送失败，请和网站客服联系！');
                        return false;
                    }
                }
            });
        }

        //校验手机号是否合法
        function isPhoneNum(){
            var phonenum = $("#loginform-mobile").val();
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if(!myreg.test(phonenum)){
                alert('请输入有效的手机号码！');
                $("#loginform-mobile").focus();
                return false;
            }else{
                return true;
            }
        }

    })();
</script>
</body>
</html>