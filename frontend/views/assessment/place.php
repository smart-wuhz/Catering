<!--底部内容 地段-->

<div class="dd_last">

    <div class="bgl_item">
        您的店铺有<i><?= $this->params['common']['rangeMin']?>% - <?= $this->params['common']['rangeMax']?>%</i>的提升空间
    </div>
    <div class="ddl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=\yii\helpers\Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>

</div>

<!--多边图（三块）-->

<div class="dbx_box d_three">
    <div class="dbx_one">
        <span class="fff">地段</span>
        <span class="green"><?=$this->params['common']['place']['score']?></span>
    </div>
    <div class="dbx_two">
        <span class="fff">匹配度</span>
        <span class="green"><?=$place['desc']['match']?></span>
    </div>
    <div class="dbx_three">
        <span class="fff"><?=$place['desc']['result']?></span>
        <span class="green"><?=$place['desc']['msg']?></span>
    </div>
</div>

<!--地图图片-->

<div class="map_box">
    <img src="/images/map.png">
</div>
