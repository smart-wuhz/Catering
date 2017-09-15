<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
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
    <title><?=Html::encode('修改手机号')?></title>
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
            <a href="./" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--内容模板-->
        <div class="input_box in_psd tel_box">
            <?php $form = ActiveForm::begin(['id' => 'update-form','action' => ['ucenter/update-mobile'],'method'=>'post']);?>
            <div class="ib_full">
                <input placeholder="国家和地区" type="password"/><a href="#" class="tel_ck">+86&nbsp;></a>
            </div>
            <div class="ib_full">
                <?=$form->field($model, 'mobile')->textInput(['placeholder'=>'请输入新的手机号'])->label(false);?>
            </div>
            <?=Html::submitButton('下一步', ['class' => 'lg_btn']) ?>
            <?php ActiveForm::end();?>
        </div>
        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="sd_btn"><span>店铺深度报告</span></a>

    </div>
</div>
</body>
</html>