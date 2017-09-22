<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '重置密码';
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
    <title><?=$this->title?></title>
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

        <!--内容模板-->
        <div class="input_box in_psd">
            <?php $form = ActiveForm::begin(['id' => 'restpwd-form', 'action' => ['user/reset-password'], 'method'=>'post',]);?>
            <div class="input_tit">请输入新密码</div>
            <div class="ib_full">
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'请输入新密码'])->label(false); ?>
            </div>

            <div class="input_tit" style="margin-top: .3rem">请再次确认新密码</div>
            <div class="ib_full">
                <?= $form->field($model, 'repassword')->passwordInput(['placeholder'=>'请再次确认新密码'])->label(false); ?>
            </div>
            <?=Html::submitButton('提交', ['class' => 'lg_btn']) ?>
            <?php ActiveForm::end();?>

            <!--忘记密码-->
           <!-- <div class="lost_psd">
                <a href="<? Url::toRoute(['user/request-password-reset']) ?>" class="los_btn">忘记密码？</a>
            </div>-->

        </div>

        <!--深度报告按钮-->
        <!--<a href="<?/* Url::toRoute(['fastreport/index'])*/?>" class="sd_btn"><span>店铺深度报告</span></a>-->

    </div>
</div>
</body>
</html>