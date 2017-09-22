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
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <title>关于我们</title>
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
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--关于我们-->
        <div class="ab_body">
            <div class="ab_tit">
                <img src="/images/about.png">
            </div>
            <div class="ab_box">
                <p>电话：<a href="tel:4008210689">400-8210-689</a> </p>
                <p>邮箱：service.hd@haoduoshuju.com</p>
                <p>公司名称：上海格敏其信息技术有限公司</p>
                <p>公司地址：上海市   浦东新区   浦东南路1101号</p>
                <p style="margin-top: .1rem">公司介绍</p>
                <div class="ab_js">上海格敏其信息技术有限公司（以下简称“格敏其”）于2015年5月11号成立于中国（上海）自贸区张江孵化园区，核心团队来自于知名的大数据和互联网公司，并于国内著名大学大数据团队拥有良好的合作关系。<br>    “格敏其”独立研发并运营“好多数据平台”和“HDE（Haoduo Data Engine）”。好多数据引擎简称HDE， HDE独创“好多”核心算法和“好多”行业模型。公司以“好多数据，就是生产力”为企业使命，以“好多数据，让世界更真诚”为企业愿景，积极地将企业的数据应用衍生到各个领域，为企业的奔跑加上HDE的引擎，助推经济的发展。</div>

            </div>
            <div class="ew_box">
                <img src="/images/about_ew.png">
                <span>微信号</span>
            </div>
        </div>

        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>?" class="sd_btn"><span>店铺深度报告</span></a>
    </div>
</div>
</body>
</html>