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
        <span class="fff">客群</span>
        <span class="red"><?=$this->params['common']['rent']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="red"><?=$rent['desc']['result']?></span>
        <span class="fff"><?=$rent['desc']['msg']?></span>
    </div>
</div>
<!--房租底部-->
<div id="fz_ec"></div>
<script>
    (function () {

        //房租趋势图

        // 基于准备好的dom，初始化echarts实例
        var myChart_fz = echarts.init(document.getElementById('fz_ec'));

        // 指定图表的配置项和数据
        option_fzec = {
            title: {
                text: ''
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'cross',
                    label: {
                        backgroundColor: '#d0bd43'
                    }
                },
                formatter: '{b}:\n{c}%'
            },
            legend: {
                data: ['房屋增长比例', '消费增长比例'],
                textStyle: {
                    fontSize: '12',
                    color: '#fff'
                }
            },
//            字体颜色
            textStyle: {
                fontSize: '10',
                color: '#fff'
            },
            toolbox: {
            },
            grid: {
                top: '20%',
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    boundaryGap: false,
                    //data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
                    data:<?=Json::encode($rent['data']['xaxis'])?>,
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    axisLabel: {
                        show: true,
                        interval: 'auto',
                        formatter: '{value} %'
                    }
                }
            ],
            series: [
                {
                    name: '房屋增长比例',
                    type: 'line',
                    stack: '总量',
                    areaStyle: {normal: {}},
                    itemStyle: {
                        normal: {
                            color: '#d0bd43'
                        }
                    },
                    //data: [10, 20, 60, 5, 10, 70, 80, 10, 20, 60, 5, 10]
                    data: <?=Json::encode($rent['data']['houseup'])?>,
                },
                {
                    name: '消费增长比例',
                    type: 'line',
                    stack: '总量',
                    itemStyle: {
                        normal: {
                            color: '#82c198'
                        }
                    },
                    label: {
                        normal: {
                            show: true,
                            position: 'top'
                        }
                    },
                    areaStyle: {normal: {}},
                    //data: [20, 60, 5, 10, 20, 60, 5, 10, 20, 60, 5, 10]
                    data: <?=Json::encode($rent['data']['consumeup'])?>,
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart_fz.setOption(option_fzec)

    })();
</script>
