<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
    <title><?=Html::encode('修改资料')?></title>
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

        <?php $form = ActiveForm::begin(['id' => 'update-form','action' => ['ucenter/update'],'method'=>'post']);?>
        <!--编辑输入框-->
        <div class="inp_bj"><?=$type?>
            <?php
            $input='';
            switch ($type){
                case 'username':
                    echo $input=$form->field($model, 'username')->textInput(['placeholder'=>'请输入昵称'])->label(false);
                     break;
                case 'email':
                    echo $input=$form->field($model, 'email')->textInput(['placeholder'=>'请输入邮箱'])->label(false);
                    break;
            }?>
           <!-- <input type="text" placeholder="请输入昵称">-->
        </div>
        <?=Html::submitButton('保存', ['class' => 'lg_btn']) ?>
        <?php ActiveForm::end();?>

        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="sd_btn"><span>店铺深度报告</span></a>
    </div>
</div>
</body>
</html>