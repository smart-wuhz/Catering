<!--底部内容 地段-->

<div class="dd_last">

    <div class="bgl_item">
        您的店铺有<i><?= $this->params['common']['rangeMin']?>% - <?= $this->params['common']['rangeMax']?>%</i>的提升空间
    </div>
    <div class="ddl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=\yii\helpers\Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>

</div>

<!--多边图（两块）-->

<div class="dbx_box d_two">
    <div class="dbx_one">
        <span class="fff">环境</span>
        <span class="green"><?=$this->params['common']['environment']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="green"><?=$environment['desc']['result']?></span>
        <span class="fff"><?=$environment['desc']['msg']?></span>
    </div>
</div>

<!--地图图片-->

<div class="map_box">
    <img src="/images/map_hj.png">
</div>

