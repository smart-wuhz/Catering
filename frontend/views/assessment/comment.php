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
        <span class="fff">评论</span>
        <span class="red"><?=$this->params['common']['comment']['score']?></span>
    </div>
    <div class="dbx_three">
        <span class="red"><?=$comment['desc']['result']?></span>
        <span class="fff"><?=$comment['desc']['msg']?></span>
    </div>
</div>

<!--评论底部-->

<div id="pl_ec"></div>

</div>
</div>

<script>
    (function(){

        //        房租趋势图

        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('pl_ec'));

        // 指定图表的配置项和数据

        var placeHoledStyle = {
            normal:{
                barBorderColor:'rgba(0,0,0,0)',
                color:'rgba(0,0,0,0)'
            },
            emphasis:{
                barBorderColor:'rgba(0,0,0,0)',
                color:'rgba(0,0,0,0)'
            }
        };
        var dataStyle = {
            normal: {
                label : {
                    show: true,
                    position: 'insideLeft',
                    formatter: '{c}'
                }
            }
        };

        option = {
            tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                    type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                },
                formatter : '{b}<br/>{a0}:{c0}<br/>{a2}:{c2}<br/>{a4}:{c4}<br/>{a6}:{c6}'
            },
            legend: {
                y: 25,
                x:70,
                itemGap : document.getElementById('pl_ec').offsetWidth /22,
                textStyle:{
                    fontSize:'12',
                    color:'#fff'
                },
                data:['环境', '服务','卫生', '菜品']
            },
            textStyle:{
                fontSize:'12',
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
                    type : 'value',
                    position: 'top',
                    splitLine: {show: false},
                    axisLabel: {show: false}
                }
            ],
            yAxis : [
                {
                    type : 'category',
                    splitLine: {show: false},
                    data : ['本店', '竞店(均值)', '最高']
                }
            ],
            series : [
                {
                    name:'环境',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[9, 8, 9.5]
                    data:<?=Json::encode($comment['data']['environment'])?>
                },
                {
                    name:'环境',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[6, 7, 5.5]
                    data:<?=Json::encode($comment['data2']['environment'])?>
                },
                {
                    name:'服务',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[8.9, 8.5, 9]
                    data:<?=Json::encode($comment['data']['service'])?>
                },
                {
                    name:'服务',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                   /// data:[6.1, 6.5, 6]
                    data:<?=Json::encode($comment['data2']['service'])?>
                },
                {
                    name:'卫生',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[9.5, 9, 9.8]
                    data:<?=Json::encode($comment['data']['health'])?>
                },
                {
                    name:'卫生',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[5.5, 6, 5.2]
                    data:<?=Json::encode($comment['data2']['health'])?>
                },
                {
                    name:'菜品',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[9, 9.1, 9.5]
                    data:<?=Json::encode($comment['data']['cookstyle'])?>
                },
                {
                    name:'菜品',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[6, 5.9, 5.5]
                    data:<?=Json::encode($comment['data2']['cookstyle'])?>
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option)
    })();
</script>