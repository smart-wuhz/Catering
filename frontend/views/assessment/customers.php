<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--底部内容 竞争-->

<div class="dd_last">

    <div class="bgl_item">
        您的店铺有<i><?= $this->params['common']['rangeMin']?>% - <?= $this->params['common']['rangeMax']?>%</i>的提升空间
    </div>
    <div class="ddl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>

</div>

<!--多边图（两块）-->

<div class="dbx_box d_two">
    <div class="dbx_one">
        <span class="fff">客群</span>
        <span class="red"><?=$this->params['common']['customers']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="red"><?=Html::encode($customers['desc']['result'])?></span>
        <span class="fff"><?=Html::encode($customers['desc']['msg'])?></span>
    </div>
</div>

<!--客群底部-->
<div class="kq_box">
    <div class="kq_tit">客群</div>
    <ul>
        <!--<li>男人</li>
        <li>大学生</li>
        <li>附近居民</li>
        <li>女人</li>
        <li>研究生</li>
        <li>人均100元以下</li>
        <li>过路客</li>
        <li>40~50岁</li>
        <li>人均300元以上</li>
        <li>小学生</li>
        <li>60~70岁</li>
        <li>人均100~200元</li>
        <li>中学生</li>
        <li>30~40岁</li>
        <li>人均200~300元</li>-->
        <?php foreach ($customers['data'] as $val):?>
            <li><?=Html::encode($val)?></li>
        <?php endforeach;?>
    </ul>
</div>
