<?php
use \yii\helpers\Url;
?>
<!--弹窗-->
<div class="alert_mask" style="display: none;"></div>

<!--切换店铺弹窗-->
<div class="alert_body" style="display: none;">
    <ul>
        <?php if(isset($this->params['shoplist']) && !empty(isset($this->params['shoplist']))){
            foreach ($this->params['shoplist'] as $key=>$val):?>
        <li <?php if(Yii::$app->session['shop']['id']==$val['id']):?> class="al_ck" <?php endif;?> shopid="<?=$val['id']?>" orgid="<?=$val['orgid']?>">
            <span><?=$val['name']?></span>
            <span><?=$val['address']?></span>
        </li>
        <?php endforeach; };?>
    </ul>
    <div class="al_btn">
        <a href="javascript:void(0)" class="al_false cancel">取消</a>
        <a href="javascript:void(0)" class="al_false ensure">确定</a>
    </div>
</div>


<!--未登录弹窗-->
<div class="alert_login no-login" style="display: none;">
    <div class="al_img"><img src="/images/lg_ar.png"></div>
    <div class="alg_body">
        <div class="conform">您还未登录，请先去登录</div>
        <div class="conform no_add">亲，你还没添加店铺，赶快去添加吧</div>
        <div href="javascript:void(0)" class="alogin_btn">
            <a href="javascript:void(0)" class="al_cof cancel">取消</a>
            <a href="javascript:void(0)" class="al_cof ensure">确定</a>
        </div>
    </div>
</div>

<!--认证弹窗-->
<div class="alert_login rz_alert" style="display: none;">
    <div class="al_img"><img src="/images/rz_ar.png"></div>
    <div class="alg_body">
        <div class="conform">认证成功，请到<a href="<?=Url::toRoute(['shop/index'])?>">我的报告</a>查看</div>
        <div href="javascript:void(0)" class="alogin_btn">
            <a href="javascript:void(0)" class="al_cof cancel">取消</a>
            <a href="javascript:void(0)" class="al_cof ensure">确定</a>
        </div>
    </div>
</div>

<!--切换失败-->
<div class="alert_login" style="display: none;">
    <div class="al_img"><img src="/images/qhflase_ar.png"></div>
    <div class="alg_body">
        <div class="conform">切换店铺失败，请重新切换</div>
        <div href="#" class="alogin_btn">
            <a href="#" class="al_cof cancel">取消</a>
            <a href="#" class="al_cof ensure">确定</a>
        </div>
    </div>
</div>

<!--搜索bug弹窗-->
<div class="sh_bug sh_alert" style="display: none">
    <a href="javascript:void(0)" class="sh_close"><img src="/images/cox.png"></a>
    <img src="/images/sh_bug.png">
</div>

<!--找不到店铺弹窗-->
<div class="sh_bug nodp_alert" style="display:none;">
    <a href="javascript:void(0)" class="sh_close"><img src="/images/cox.png"></a>
    <img src="/images/no_dp.png">
</div>


<div class="allnleft">
    <div class="nl_img">
        <a href="#" class="nli_top"><img src="/images/master.png"></a>
        <span class="lf_login">
            <?php if(Yii::$app->user->isGuest){ ?>
            <a href="<?=Url::toRoute(['user/login'])?>" class="nl_login">登录</a>
            <span class="hig">|</span>
            <a href="<?=Url::toRoute(['user/login','type'=>'signup'])?>" class="nl_res">注册</a>
            <?php }else{ ?>
                <span class="hig">您好,</span>
                <a href="<?=Url::toRoute(['ucenter/index'])?>" class="nl_login"><?=Yii::$app->user->identity->username?></a>
            <?php };?>
        </span>
    </div>
    <div class="nl_list">
        <a href="<?=Url::toRoute(['site/index'])?>" class="nla_a nal_select">首页</a>
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="nla_b">HDE分析</a>
        <a href="<?=Url::toRoute(['check/index'])?>" class="nla_c">我的测评</a>
        <a href="<?=Url::toRoute(['shop/index'])?>" class="nla_d">我的商铺</a>
        <a href="<?=Url::toRoute(['ucenter/index'])?>" class="nla_e">个人中心</a>
        <a href="<?=Url::toRoute(['message/index'])?>" class="nla_f">消息</a>
        <a href="<?=Url::toRoute(['user/logout'])?>" class="nla_g">退出</a>
    </div>
</div>
<script type="text/javascript" src="/js/main.js"></script>