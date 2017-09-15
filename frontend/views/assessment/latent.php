<?php
use yii\helpers\Url;
use yii\helpers\Json;
?>
<link rel="stylesheet" href="/css/ec.css">
<!--底部内容 竞争-->
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
        <span class="fff">潜力</span>
        <span class="green"><?=$this->params['common']['latent']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="green"><?=$latent['desc']['result']?></span>
        <span class="fff"><?=$latent['desc']['msg']?></span>
    </div>
</div>

<!--房租底部-->
<div id="ql_ec"></div>

<script>
    (function(){

        //房租趋势图

        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('ql_ec'));

        // 指定图表的配置项和数据

        option = {
            tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                }
            },
            legend: {
                data:['本店潜力值','同系标准值'],
                textStyle:{
                    fontSize:'12',
                    color:'#fff'
                }
            },
            //            字体颜色
            textStyle:{
                fontSize:'10',
                color:'#fff'
            },
            grid: {
                top:'20%',
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis : [
                {
                    type : 'category',
                    data : ['','','','','','','']
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name:'本店潜力值',
                    type:'bar',
                    //data:[30, 20, 50, 38, 40, 31, 56],
                    data:<?=Json::encode($latent['data']['self'])?>,
                    barGap:'0%',
                    itemStyle : {
                        normal : {
                            color:'#73c2aa'
                        }
                    }
                },
                {
                    name:'同系标准值',
                    type:'bar',
                    //data:[20, 15, 25, 19, 25, 20, 31],
                    data:<?=Json::encode($latent['data']['sameIndustry'])?>,
                    barGap:'0%',
                    itemStyle : {
                        normal : {
                            color:'#ceb939'
                        }
                    }
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option)

    })();
</script>
