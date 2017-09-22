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
    <title><?=Html::encode('报告入口')?></title>
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/echarts.js"></script>
</head>
<body>
<div class="idx_main  page_full">

    <?= $this->render('left') ?>

    <!--公共导航(满屏)-->
    <div id="header"></div>

    <div class="body_main">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd ">
            <a href="javascript:void(0);" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="/" class="idx"><img src="/images/idx.png"></a>
            <a href="<?= Url::toRoute(['fastreport/index']) ?>" class="tsd_btn">店铺深度报告</a>
        </div>

        <!--八张图内容-->
        <div class="num_fs">
            <a href="javascript:void(0);" class="rl_btn">认领报告</a>
            <?php if(!Yii::$app->user->isGuest) :?>
            <a href="javascript:void(0);" class="qh_btn">切换店铺</a>
            <?php endif;?>

            <div class="jqm-round-wrap">
                <div class="jqm-round-bg"></div>
                <canvas id="jqm-round-sector0" class="jqm-round-sector"></canvas>
                <div class="jqm-round-circle">
                    <b><?php
                        $str=mb_substr($this->params['common']['name'], 0, 4,  'UTF-8' );
                        if (strlen($this->params['common']['name'])>4){
                            $str.='..';
                        }
                        echo Html::encode($str);?>
                    </b>
                    <span><p><?= $this->params['common']['score'] ?></p>分</span>
                </div>
            </div>

        </div>

        <!--八个链接-->
        <div class="link_list">
            <ul>
                <li>
                    <a href="<?= Url::toRoute(['assessment/rent']) ?>">
                        <i>房租</i><i><?= $this->params['common']['rent']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/traffic']) ?>">
                        <i>交通</i><i><?= $this->params['common']['traffic']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/comment']) ?>">
                        <i>评价</i><i><?= $this->params['common']['comment']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/latent']) ?>">
                        <i>潜力</i><i><?= $this->params['common']['latent']['score'] ?></i>
                    </a>
                </li>

                <li>
                    <a href="<?= Url::toRoute(['assessment/customers']) ?>">
                        <i>客群</i><i><?= $this->params['common']['customers']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/environment']) ?>">
                        <i>环境</i>
                        <i><?= $this->params['common']['environment']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/place']) ?>">
                        <i>地段</i><i><?= $this->params['common']['place']['score'] ?></i>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute(['assessment/compete']) ?>">
                        <i>竞争</i><i><?= $this->params['common']['compete']['score'] ?></i>
                    </a>
                </li>
            </ul>
        </div>
        <!--底部内容 竞争-->
        <?= $content ?>
    </div>
</div>
<!--    评分加载js-->
<script type="text/javascript" src="/js/circle.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script>
    $(function () {
        var queryPargam = {};
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var csrfParam = $('meta[name="csrf-param"]').attr("content");
        queryPargam[csrfParam] = csrfToken;

        //切换店铺
        $(".alert_body .ensure").on('click', function () {
            var shopid = $(".alert_body .al_ck").attr('shopid');
            var orgid = $(".alert_body .al_ck").attr('orgid');
            if (shopid && orgid) {
                queryPargam['shopid'] = shopid;
                queryPargam['orgid'] = orgid;
                $.ajax({
                    async: false,
                    cache: false,
                    type: 'post',
                    url: "<?=Url::toRoute(['assessment/change'])?>",// 请求的action路径
                    dataType: "json",
                    data: queryPargam,
                    error: function () {// 请求失败处理函数
                    },
                    success: function (result) {
                        console.log(result);
                        location.href = "<?=Url::toRoute(['assessment/index'])?>";
                    }
                });
            }
            alertAction('alert_body',false);
        })
        $(".alert_body .cancel").on('click', function () {
            alertAction('alert_body',false);
        });

        //认领报告
        $(".rl_btn").click(function(){
            $.ajax({
                type: 'post',
                url: "<?=Url::toRoute(['check/report-claim'])?>",// 请求的action路径
                dataType: "json",
                data: queryPargam,
                error: function () {// 请求失败处理函数
                },
                success: function (result) {
                    if(result.err==0) {
                        //认领成功
                        alertAction('rz_alert');
                    }else{
                        alertAction('no-login');
                    }
                }
            });
        })

        //登录弹出 打开|关闭
        $(".no-login .ensure").on('click', function () {
            location.href="/user/login";
            alertAction('no-login',false);
        });

        $(".no-login .cancel").on('click', function () {
            alertAction('no-login',false);
        });

        //rz_alert 认领成功 | 失败
        $(".rz_alert .ensure").on('click', function () {
            location.href="/shop/index";
            alertAction('rz_alert',false);
        });

        $(".rz_alert .cancel").on('click', function () {
            alertAction('rz_alert',false);
        });
    });

    /*
    * 弹窗 操作事件
    * className 需要操作的弹窗 class 名称
    * bool 打开| 关闭 默认true 打开
    * */
    function alertAction(className,bool=true) {
        if(bool) {
            $("." + className + ",.alert_mask").fadeIn();
        }else {
            $("." + className + ",.alert_mask").fadeOut();
        }
    }

</script>
</body>
</html>