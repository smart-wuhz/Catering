<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!--底部内容 地段-->
<div class="dd_last">

    <div class="bgl_item">
        您的店铺有<i><?= $this->params['common']['rangeMin']?>% - <?=$this->params['common']['rangeMax']?>%</i>的提升空间
    </div>
    <div class="ddl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>

</div>

<!--多边图（两块）-->

<div class="dbx_box d_two">
    <div class="dbx_one">
        <span class="fff">交通</span>
        <span class="green"><?=$this->params['common']['traffic']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="green"><?=Html::encode($traffic['desc']['result'])?></span>
        <span class="fff"><?=Html::encode($traffic['desc']['msg'])?></span>
    </div>
</div>


<!--交通报告底部-->
<div class="jt_box">
    <ul>
        <li>
            <div class="jt_icon"><img src="/images/jt_one.png"></div>
            <div class="jt_color jt_red"><?=count($traffic['data']['subway']['list'])?>条地铁线</div>
            <div class="jt_last"><?=Html::encode(implode('号线/',$traffic['data']['subway']['list']))?>号线</div>
        </li>
        <li>
            <div class="jt_icon"><img src="/images/jt_two.png"></div>
            <div class="jt_color jt_yellow"><?=count($traffic['data']['bus']['list'])?>个公交站</div>
            <div class="jt_last"><?=Html::encode(implode('路/',$traffic['data']['bus']['list']))?>路</div>
        </li>
        <li>
            <div class="jt_icon"><img src="/images/jt_three.png"></div>
            <div class="jt_color jt_green"><?=$traffic['data']['parking']['total']?>个停车场</div>
            <div class="jt_last w_auto"><?=Html::encode($traffic['data']['parking']['seat']='3000')?>个停车位</div>
        </li>
    </ul>
</div>

</div>
</div>