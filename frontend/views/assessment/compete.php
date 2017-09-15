<!--底部内容 竞争-->
<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="dd_last">

    <div class="bgl_item">
        您的店铺有<i><?=Html::encode($this->params['common']['rangeMin'])?>% - <?=Html::encode($this->params['common']['rangeMax'])?>%</i>的提升空间
    </div>
    <div class="ddl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>
</div>

<!--多边图（两块）-->

<div class="dbx_box d_two">
    <div class="dbx_one">
        <span class="fff">竞争</span>
        <span class="red"><?=Html::encode($this->params['common']['compete']['score'])?></span>
    </div>
    <div class="dbx_three">
        <span class="red"><?=Html::encode($compete['desc']['result'])?></span>
        <span class="fff"><?=Html::encode($compete['desc']['msg'])?></span>
    </div>
</div>

<!--竞争底部-->
<div class="jz_foot">

    <div class="jzf_one">
        <div class="jzfo_a">竞争压力</div>
        <div class="jzfo_b">
            <span>直接竞争</span>
            <span><?=Html::encode($compete['data']['direct'])?>家</span>
        </div>
        <div class="jzfo_c">
            <span>间接竞争</span>
            <span><?=Html::encode($compete['data']['indirect'])?>家</span>
        </div>
    </div>

    <div class="jzf_two">
        <div class="jzft_tit">本店缺少菜品</div>
        <ul>
            <!--<li><span>麻辣小龙虾</span></li>
            <li><span>红烧鲫鱼</span></li>
            <li><span>蜜汁鲍鱼</span></li>
            <li><span>糖醋排骨</span></li>
            <li><span>炭烤八爪鱼</span></li>
            <li><span>三鲜水饺</span></li>
            <li><span>烟熏鱼</span></li>
            <li><span>红烧带鱼</span></li>-->
            <?php foreach ($compete['data']['lessVegetable'] as $val):?>
                <li><span><?=Html::encode($val)?></span></li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="jzf_three">
        本区共有<i><?=Html::encode($compete['data']['seat'])?></i>个座位
    </div>
</div>