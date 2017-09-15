<?php
use yii\helpers\Url;
?>
<!--底部内容 房租-->
<div class="bg_last">
    <div class="bgl_item">
        您的店铺有<i><?= $this->params['common']['rangeMin']?>% - <?=$this->params['common']['rangeMax']?>%</i>的提升空间
    </div>
    <div class="bgl_mor">
        扩大测评范围，提高盈利能力，请<a href="<?=Url::toRoute(['shop/enter'])?>" class="bgl_jh">激活您的数据</a>
    </div>
    <div class="bgl_mid">
        大数据处理，提供您的<i>专属决策</i>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span>提高您的每日流水</span>
    </div>
</div>