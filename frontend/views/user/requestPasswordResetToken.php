<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '找回密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/swiper-3.4.2.min.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/swiper-3.4.2.jquery.min.js"></script>
    <title><?= Html::encode($this->title) ?></title>
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
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--内容模板-->
        <div class="input_box in_psd tel_box">
            <div class="lp_title">
                <span>我们已经发送校验码到您的手机：</span>
                <span>183xxxx5620</span>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form','action' => ['user/reset-password'],'method'=>'post']); ?>
            <div class="ib_full">
                <?=$form->field($model, 'mobile')->textInput(['placeholder'=>'请输入手机号'])->label(false);?>
            </div>

            <div class="ib_full yzm_box">
                <?= $form->field($model, 'mobile')->hiddenInput(['value'=>'18658133898'])->label(false);?>

                <input type="text" id="passwordresetrequestform-verifycode" class="form-control" name="PasswordResetRequestForm[verifyCode]" placeholder="请输入验证码">
                <?=Html::buttonInput('获取验证码', ['class' => 'yzm_btn yb_ck', 'name' => 'send-button', 'id' => 'sendCode']) ?>
            </div>
            <?= Html::submitButton('下一步', ['class' => 'lg_btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>

        <!--深度报告按钮-->
        <a href="./bg_all.html" class="sd_btn"><span>店铺深度报告</span></a>

    </div>
</div>

<script>
    $(function(){
        //手机验证
        var countdown=60;
        function settime(obj) {
            if (countdown == 0) {
                obj.removeAttribute("disabled");
                obj.value="获取验证码";
                countdown = 60;
                $(obj).addClass("yb_ck");
                return;
            } else {
                obj.setAttribute("disabled", true);
                obj.value="重新发送(" + countdown + ")";
                $(obj).removeClass("yb_ck");
                countdown--;
            }
            setTimeout(function() {
                    settime(obj) }
                ,1000)
        }

        $(".yzm_btn").click(function(){
            var url="<?=Url::toRoute(['sms/create'])?>";
            var csrfToken = "<?=Yii::$app->request->csrfToken?>";
            var mobile=$("#signupform-mobile").val();
            var queryParam={mobile:mobile,usage:"userPasswordReset",_csrf:csrfToken};
            doPostBack(url,queryParam);
            settime(this);
        })

        //提交发送短信
        function doPostBack(url,queryParam) {
            $.ajax({
                async : false,
                cache : false,
                type : 'GET',
                url : url,// 请求的action路径
                dataType:"json",
                data:queryParam,
                error : function() {// 请求失败处理函数
                },
                success:function(result){
                    console.log(result);
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
    });
</script>
</body>
</html>