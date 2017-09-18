<?php
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>整体报告</title>
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/ec.css">
    <link rel="stylesheet" href="/css/swiper-3.4.2.min.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/echarts.js"></script>
    <script type="text/javascript" src="/js/miaov.js"></script>
    <script type="text/javascript" src="/js/swiper-3.4.2.jquery.min.js"></script>
</head>
<body>

<div class="idx_main">
    <!--公共导航(满屏)-->
    <div id="header"></div>

    <div class="body_main">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd ">
            <a href="javascript:void(0);" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="<?=Url::toRoute(['/'])?>" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--八张图内容-->
        <div class="num_fs">
            <!--<div class="nf_box">-->
            <!--<span class="nf_city">家之味</span>-->
            <!--<span class="nf_num">9.8分</span>-->
            <!--</div>-->

            <a href="#" class="qh_btn">切换店铺</a>

            <div class="jqm-round-wrap">

                <div class="jqm-round-bg"></div>

                <canvas id="jqm-round-sector0" class="jqm-round-sector"></canvas>

                <div class="jqm-round-circle">
                    <b><?=$data['name']?></b>
                    <span><p><?=$data['score']?></p>分</span>
                </div>

            </div>

        </div>

        <!--店铺提示语-->
        <div class="bgall_tit">
            <div class="btt_txt">
                <span><?=$data['desc']['cost']?>，</span>
                <span><?=$data['desc']['profit']?></span>
                <a href="#">展开更多>></a>
            </div>
        </div>

        <div class="year_sh">
            <a href="#" class="ys_ck">日</a>
            <a href="#" class="">周</a>
            <a href="#" class="">月</a>
            <a href="#" class="">季</a>
            <a href="#" class="">年</a>
        </div>

        <!--营业定况-->
        <div class="bgall_box">
            <div class="bgb_tit">
                营业情况定位
            </div>
            <div class="yy_box">
                <div class="yyb_body yyb_left">
                    <div class="yy_top"><i>&nbsp;</i>最高营业额<num><?=$data['business']['bvolume']['max']?></num></div>
                    <div class="yy_mid sj_a"><b>&nbsp;</b><i>&nbsp;</i>本店营业额<num><?=$data['business']['bvolume']['self']?></num></div>
                    <div class="yy_bottom"><i>&nbsp;</i>最低营业额<num><?=$data['business']['bvolume']['min']?></num></div>
                </div>
                <div class="yyb_body yyb_right">
                    <div class="yy_top"><i>&nbsp;</i>最高利润<num><?=$data['business']['profit']['max']?></num></div>
                    <div class="yy_mid sj_b"><b>&nbsp;</b><i>&nbsp;</i>本店利润<num><?=$data['business']['profit']['self']?></num></div>
                    <div class="yy_bottom"><i>&nbsp;</i>最低利润<num><?=$data['business']['profit']['min']?></num></div>
                </div>
            </div>
        </div>

        <!--菜品分析-->
        <div class="bgall_box">
            <div class="bgb_tit">
                菜品分析
            </div>

            <!--利润面积玫瑰图-->
            <div id="mj_mg" style="width: 100%;height: 3.2rem"></div>


            <!--菜品区分-->
            <div class="cp_box">
                <div class="cp_tit">菜品区分</div>
                <!--区分表-->
                <div class="cb_body">
                    <div class="cpb_tit">
                        <div class="cpbt_tit">主打</div>
                        <div class="cpbt_tit">放弃</div>
                    </div>
                    <table cellpadding="0"cellspacing="0" class="cbtable_a">
                        <thead>
                        <th>菜名</th><th>销量</th><th>利润</th>
                        </thead>
                        <tbody>
                        <?php foreach ($data['dishes']['division']['main'] as $item):?>
                        <tr>
                            <td><?=$item['name']?></td><td><?=$item['sales']?></td><td><?=$item['profit']?></td>
                        </tr>
                        <?php endforeach;?>
<!--
                        <tr>
                            <td>鲅鱼水饺</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>鲅鱼水饺</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>油淋鸟贝</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>刺身海胆</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>温拌海螺</td><td>100</td><td>2000</td>
                        </tr>-->
                        </tbody>
                    </table>
                    <table cellpadding="0"cellspacing="0" class="cbtable_b">
                        <thead>
                        <th>菜名</th><th>销量</th><th>利润</th>
                        </thead>
                        <tbody>
                        <?php foreach ($data['dishes']['division']['less'] as $item):?>
                            <tr>
                                <td><?=$item['name']?></td><td><?=$item['sales']?></td><td><?=$item['profit']?></td>
                            </tr>
                        <?php endforeach;?>

                       <!-- <tr>
                            <td>野菜包子</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>胶东皮冻</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>蒸小生蚝</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>胶东猪头肉</td><td>100</td><td>2000</td>
                        </tr>
                        <tr>
                            <td>蜂窝玉米</td><td>100</td><td>2000</td>
                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--单品TOP5-->
        <div class="tp_box tp_swp swiper-container">
            <div class="cp_tit">单品Top5</div>
            <div class="tp_btn tps_btn">
                <a href="javascript:void (0);" class="tpb_ck">销量</a>
                <a href="javascript:void (0);" class="">利润</a>
            </div>
            <div class="tp_top">
                <div class="tpt_left">行业Top5</div>
                <div class="tpt_right">本店Top5</div>
            </div>
            <div class="swiper-wrapper">
                <div class="tp_zs swiper-slide">
                    <ul class="tp_left">
                        <?php foreach ($data['single_top5']['sales']['trade'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>
                        <!--<li>
                            <span class="tlli_a">刺身</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">海鲜疙瘩汤</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">鲅鱼水饺</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">蛏王</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">油淋鸟贝</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                    <ul class="tp_right">
                        <?php foreach ($data['single_top5']['sales']['self'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj_d">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">海鲜疙瘩汤</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">葱油天鹅蛋</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">刺身海胆</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">鱼锅饼子</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">葱油千层饼</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>
                </div>

                <div class="tp_zs swiper-slide">
                    <ul class="tp_left">
                        <?php foreach ($data['single_top5']['profit']['trade'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">刺身</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">海鲜疙瘩汤</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">鲅鱼水饺</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">蛏王</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">油淋鸟贝</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                    <ul class="tp_right">
                        <?php foreach ($data['single_top5']['profit']['self'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj_d">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">海鲜疙瘩汤</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">葱油天鹅蛋</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">刺身海胆</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">鱼锅饼子</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">葱油千层饼</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>
                </div>



            </div>
        </div>

        <!--套餐TOP5-->
        <div class="tp_box tc_swp swiper-container">
            <div class="cp_tit">套餐Top5</div>
            <div class="tp_btn tcs_btn">
                <a href="javascript:void (0);" class="tpb_ck">利润</a>
                <a href="javascript:void (0);" class="">销量</a>
            </div>
            <div class="tp_top">
                <div class="tpt_left">行业Top5</div>
                <div class="tpt_right">本店Top5</div>
            </div>
            <div class="swiper-wrapper">
                <div class="tp_zs swiper-slide">
                    <ul class="tp_left tc_ul_a">
                        <?php foreach ($data['setmeal_top5']['sales']['trade'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">蛏王套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">扇贝套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">帝王蟹套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">海肠套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                    <ul class="tp_right tc_ul_b">
                        <?php foreach ($data['setmeal_top5']['sales']['self'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj_d">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">野菜包子套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">刺身套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">温拌海螺套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                </div>

                <div class="tp_zs swiper-slide">
                    <ul class="tp_left tc_ul_a">
                        <?php foreach ($data['setmeal_top5']['profit']['trade'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>

                        <!--<li>
                            <span class="tlli_a">蛏王套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">扇贝套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">帝王蟹套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">海肠套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                    <ul class="tp_right tc_ul_b">
                        <?php foreach ($data['setmeal_top5']['profit']['self'] as $key=>$item):?>
                            <li>
                                <span class="tlli_a"><?=$item['name']?></span>
                                <i class="li_sj_d">&nbsp;</i>
                                <b>0<?=$key+1?></b>
                            </li>
                        <?php endforeach;?>
                        <!--<li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>01</b>
                        </li>
                        <li>
                            <span class="tlli_a">野菜包子套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>02</b>
                        </li>
                        <li>
                            <span class="tlli_a">鸟贝套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>03</b>
                        </li>
                        <li>
                            <span class="tlli_a">刺身套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>04</b>
                        </li>
                        <li>
                            <span class="tlli_a">温拌海螺套餐</span>
                            <i class="li_sj_d">&nbsp;</i>
                            <b>05</b>
                        </li>-->
                    </ul>

                </div>


            </div>
        </div>

        <!--区间营业分析-->
        <div class="bgall_box">
            <div class="bgb_tit">
                区间营业分析
            </div>
            <div id="yy_ec"></div>
        </div>

        <!--酒水消费-->
        <div class="bgall_box">
            <div class="bgb_tit">
                酒水消费
            </div>
            <div class="qj_a">
                <div class="qja_tit cp_tit">本店酒水占比</div>
                <div class="rd_box">
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_a">
                            <span style="height: <?=$data['drinks']['self']['sales']?>;"><i>销量<?=$data['drinks']['self']['sales']?></i></span>
                        </div>
                    </div>
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_b">
                            <span style="height: <?=$data['drinks']['self']['bvolume']?>;"><i>营业额<?=$data['drinks']['self']['bvolume']?></i></span>
                        </div>
                    </div>
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_c">
                            <span style="height: <?=$data['drinks']['self']['profit']?>;"><i>利润<?=$data['drinks']['self']['profit']?></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="qj_b">
                <div class="qja_tit cp_tit">竞店酒水平均占比</div>
                <div class="rd_box">
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_a">
                            <span style="height: <?=$data['drinks']['compete']['sales']?>;"><i>销量<?=$data['drinks']['compete']['sales']?></i></span>
                        </div>
                    </div>
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_b">
                            <span style="height: <?=$data['drinks']['compete']['bvolume']?>;"><i>营业额<?=$data['drinks']['compete']['bvolume']?></i></span>
                        </div>
                    </div>
                    <div class="rd_body">
                        <div class="rd_item"></div>
                        <div class="rd_value cl_c">
                            <span style="height: <?=$data['drinks']['compete']['profit']?>;"><i>利润<?=$data['drinks']['compete']['profit']?></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tp_box jtp_swp swiper-container">
                <div class="cp_tit">单品TOP5</div>
                <div class="tp_btn jsp_btn">
                    <a href="javascript:void (0);" class="tpb_ck">销量</a>
                    <a href="javascript:void (0);" class="">营业额</a>
                    <a href="javascript:void (0);" class="">利润</a>
                </div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="js_left">
                            <div class="jsl_tit">本店销量TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['sales']['slef'] as $item):?>
                                <li>
                                    <span class="jst_left"><?=$item['name']?></span>
                                    <span class="jst_right"><?=$item['num']?></span>
                                </li>
                                <?php endforeach;?>

                               <!-- <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>

                        <div class="js_right">
                            <div class="jsl_tit">本市场畅销TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['sales']['city'] as $item):?>
                                    <li>
                                        <span class="jst_left"><?=$item['name']?></span>
                                        <span class="jst_right"><?=$item['num']?></span>
                                    </li>
                                <?php endforeach;?>

                               <!-- <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="js_left">
                            <div class="jsl_tit">本店营业额TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['bvolume']['slef'] as $item):?>
                                    <li>
                                        <span class="jst_left"><?=$item['name']?></span>
                                        <span class="jst_right"><?=$item['num']?></span>
                                    </li>
                                <?php endforeach;?>

                                <!--<li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>

                        <div class="js_right">
                            <div class="jsl_tit">本市场营业额TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['bvolume']['city'] as $item):?>
                                    <li>
                                        <span class="jst_left"><?=$item['name']?></span>
                                        <span class="jst_right"><?=$item['num']?></span>
                                    </li>
                                <?php endforeach;?>
<!--
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="js_left">
                            <div class="jsl_tit">本店利润TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['profit']['slef'] as $item):?>
                                    <li>
                                        <span class="jst_left"><?=$item['name']?></span>
                                        <span class="jst_right"><?=$item['num']?></span>
                                    </li>
                                <?php endforeach;?>
                                <!--
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>

                        <div class="js_right">
                            <div class="jsl_tit">本市场利润TOP5</div>
                            <ul>
                                <?php foreach ($data['drinks']['singletop']['profit']['city'] as $item):?>
                                    <li>
                                        <span class="jst_left"><?=$item['name']?></span>
                                        <span class="jst_right"><?=$item['num']?></span>
                                    </li>
                                <?php endforeach;?>
                                <!--
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">三得利超爽</span>
                                    <span class="jst_right">70</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>
                                <li>
                                    <span class="jst_left">红星二锅头</span>
                                    <span class="jst_right">100</span>
                                </li>-->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--成本分析率-->
        <div class="bgall_box">
            <div class="bgb_tit">
                成本分析率<i>成本率=总成本/营业额*100%</i>
            </div>

            <div class="cb_rd">
                <div class="cp_tit">菜品成本率</div>
                <div class="cb_img">
                    <img src="/images/cbrd_a.png">
                </div>
                <div class="rdxf_txt">最佳成本率↓营业利率最高时的成本率</div>
                <ul class="cb_ul">
                    <li>
                        <span>竞店最高</span>
                        <span><?=$data['costs_analyse']['dish']['competeMax']?></span>
                    </li>
                    <li>
                        <span>最佳</span>
                        <span class="cb_color"><?=$data['costs_analyse']['dish']['best']?></span>
                    </li>
                    <li>
                        <span>本店</span>
                        <span class="cb_color"><?=$data['costs_analyse']['dish']['self']?>25%</span>
                    </li>
                    <li>
                        <span>竞价最低</span>
                        <span><?=$data['costs_analyse']['dish']['competeMin']?></span>
                    </li>
                </ul>
            </div>

            <div class="cb_rd cbrd_b">
                <div class="cp_tit">酒水成本率</div>
                <div class="cb_img">
                    <img src="/images/cbrd_b.png">
                </div>
                <ul class="cb_ul">
                    <li>
                        <span>竞店最高</span>
                        <span><?=$data['costs_analyse']['drinks']['competeMax']?></span>
                    </li>
                    <li>
                        <span>最佳</span>
                        <span class="cb_color"><?=$data['costs_analyse']['drinks']['best']?></span>
                    </li>
                    <li>
                        <span>本店</span>
                        <span class="cb_color"><?=$data['costs_analyse']['drinks']['self']?></span>
                    </li>
                    <li>
                        <span>竞价最低</span>
                        <span><?=$data['costs_analyse']['drinks']['competeMin']?></span>
                    </li>
                </ul>
            </div>

        </div>

        <!--就餐人数-->
        <div class="bgall_box">
            <div class="bgb_tit">
                就餐人数
            </div>
            <div class="jc_btn">
                <a href="javascript:void(0);" class="jc_ck">近一月</a>
                <a href="javascript:void(0);" class="">近3月</a>
                <a href="javascript:void(0);" class="">近一年</a>
            </div>
            <div id="jc_ec"></div>
        </div>

        <!--翻台率-->
        <div class="bgall_box">
            <div class="bgb_tit">
                翻台率
            </div>

            <div class="ft_gl">
                <div class="ft_item">
                    <div class="ft_lable">本店翻台率</div>
                    <div class="ft_img">
                        <span class="ft_bx imc_a" style="width:<?=$data['turn_rate']['self']?>;">&nbsp;<i class="ft_num"><?=$data['turn_rate']['self']?></i></span>
                    </div>
                </div>
                <div class="ft_item">
                    <div class="ft_lable">竞店翻台率</div>
                    <div class="ft_img">
                        <span class="ft_bx imc_b" style="width:<?=$data['turn_rate']['compete']?>;">&nbsp;<i class="ft_num"><?=$data['turn_rate']['compete']?></i></span>
                    </div>
                </div>
                <div class="ft_item">
                    <div class="ft_lable">同菜系翻台率</div>
                    <div class="ft_img">
                        <span class="ft_bx imc_c" style="width:<?=$data['turn_rate']['same_series']?>;">&nbsp;<i class="ft_num"><?=$data['turn_rate']['same_series']?></i></span>
                    </div>
                </div>
            </div>
            <div class="ftc_box">
                <div class="cp_tit">本店翻台趋势图</div>
                <div id="ft_ec"></div>
            </div>
        </div>

        <!--房租合理性-->
        <div class="bgall_box">
            <div class="bgb_tit">
                房租合理性
            </div>
            <div id="hl_ec"></div>
            <div class="hl_xf">
                房租/营业额应保持在25%以内，占比过高则营运压力大
            </div>
        </div>

        <!--评分详情-->
        <div class="bgall_box">
            <div class="bgb_tit">
                评分详情
            </div>
            <div id="pf_ec"></div>

            <div class="pf_gjc">
                <div class="cp_tit">关键词</div>
                <div id="gjc_move" class="gjc_body">
                    <?php foreach ($data['keywords'] as $val):?>
                        <a href="javascript:void(0);" class="color_<?=chr(rand(97,111))?>"><?=$val?></a>
                    <?php endforeach;?>
                    <!--<a href="javascript:void(0);" class="color_a">请客</a>
                    <a href="javascript:void(0);" class="color_b">价格实惠</a>
                    <a href="javascript:void(0);" class="color_c">干净卫生</a>
                    <a href="javascript:void(0);" class="color_d">现做现卖</a>
                    <a href="javascript:void(0);" class="color_e">干净卫生</a>
                    <a href="javascript:void(0);" class="color_f">请客</a>
                    <a href="javascript:void(0);" class="color_g">价格实惠</a>
                    <a href="javascript:void(0);" class="color_g">干净卫生</a>
                    <a href="javascript:void(0);" class="color_c">现做现卖</a>
                    <a href="javascript:void(0);" class="color_a">干净卫生</a>
                    <a href="javascript:void(0);" class="color_d">请客</a>
                    <a href="javascript:void(0);" class="color_a">价格实惠</a>
                    <a href="javascript:void(0);" class="color_b">干净卫生</a>
                    <a href="javascript:void(0);" class="color_a">现做现卖</a>
                    <a href="javascript:void(0);" class="color_h">干净卫生</a>-->
                </div>
            </div>
        </div>

        <!--报告二收缩部分-->

        <div class="all_bgmore" style="display: none;">
            <!--八个链接-->
            <div class="link_list">
                <ul>
                    <li><a href="./bg_g.html"><i>地段</i><i>8</i></a></li>
                    <li><a href="./bg_b.html"><i>交通</i><i>4</i></a></li>
                    <li><a href="./bg_h.html"><i>竞争</i><i>9</i></a></li>
                    <li><a href="./bg_e.html"><i>客群</i><i>2</i></a></li>
                    <li><a href="./bg_f.html"><i>环境</i><i>6</i></a></li>
                    <li><a href="./bg_d.html"><i>潜力</i><i>15</i></a></li>
                </ul>
            </div>

            <!--底部内容 房租-->
            <div class="bg_last">
                <div class="bgl_item">
                    您的店铺有<i>15% - 20%</i>的提升空间
                </div>
                <div class="bgl_mor">
                    扩大测评范围，提高盈利能力，请<a href="./jr.html" class="bgl_jh">激活您的数据</a>
                </div>
                <div class="bgl_mid">
                    大数据处理，提供您的<i>专属决策</i>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>提高您的每日流水</span>
                </div>
            </div>
        </div>

        <a href="javascript:void(0)" class="pf_btn tb_pgbtn">展开更多评分</a>

        <a href="javascript:void(0);" class="go_top" style="display: none;"><img src="/images/gotop.png"></a>

    </div>
</div>

<script>
    (function(){

//        底部展开收缩
        $(".tb_pgbtn").click(function(){
            $(".all_bgmore").slideToggle("slow");
            var now_sp = $('.all_bgmore').offset().top;
            $('html,body').animate({scrollTop: now_sp},"slow");

            var btn_txt = $(".tb_pgbtn").text();
            if(btn_txt=="展开更多评分"){
                $(".tb_pgbtn").text("收起更多评分");
            }
            else{
                $(".tb_pgbtn").text("展开更多评分");
            }

        })

//        返回顶部
        $(window).scroll(function() {
            if($(window).scrollTop() >= 200){
                $('.go_top').fadeIn();
            }else{
                $('.go_top').fadeOut();
            }
        });

        $('.go_top').click(function(){$('html,body').animate({scrollTop: 0},"slow")});


//        营业情况定位浮标

        var maxl_yye = $(".yyb_left .yy_top num").text();
        var bdl_yye = $(".sj_a num").text();

        var maxr_yye = $(".yyb_right .yy_top num").text();
        var bdr_yye = $(".sj_b num").text();

        var l_top = (1-(bdl_yye/maxl_yye)).toFixed(2)*100;
        var r_top = (1-(bdr_yye/maxr_yye)).toFixed(2)*100;
        $(".sj_a").css({"top":l_top +"%"});
        $(".sj_b").css({"top":r_top +"%"});


//        top切换

        var mySwiper = new Swiper('.tp_swp', {
            onSlideChangeStart: function(swiper){
                var swb_index = mySwiper.activeIndex;
                $(".tps_btn").find("a").removeClass("tpb_ck");
                $(".tps_btn").find("a").eq(swb_index).addClass("tpb_ck");
            }
        });
        var swb_index = mySwiper.activeIndex;
        $(".tps_btn").find("a").removeClass("tpb_ck");
        $(".tps_btn").find("a").eq(swb_index).addClass("tpb_ck");

        $(".tps_btn").find("a").each(function(index){
            $(this).click(function(){
                $(".tps_btn").find("a").removeClass("tpb_ck");
                $(this).addClass("tpb_ck");
                mySwiper.slideTo(index);
            })
        });

        //        套餐切换

        var mySwiper_tc = new Swiper('.tc_swp', {
            onSlideChangeStart: function(swiper){
                var swb_index = mySwiper_tc.activeIndex;
                $(".tcs_btn").find("a").removeClass("tpb_ck");
                $(".tcs_btn").find("a").eq(swb_index).addClass("tpb_ck");
            }
        });
        var swb_index = mySwiper_tc.activeIndex;
        $(".tcs_btn").find("a").removeClass("tpb_ck");
        $(".tcs_btn").find("a").eq(swb_index).addClass("tpb_ck");

        $(".tcs_btn").find("a").each(function(index){
            $(this).click(function(){
                $(".tcs_btn").find("a").removeClass("tpb_ck");
                $(this).addClass("tpb_ck");
                mySwiper_tc.slideTo(index);
            })
        });


        //        酒水单品切换

        var mySwiper_js = new Swiper('.jtp_swp', {
            onSlideChangeStart: function(swiper){
                var swb_index = mySwiper_js.activeIndex;
                $(".jsp_btn").find("a").removeClass("tpb_ck");
                $(".jsp_btn").find("a").eq(swb_index).addClass("tpb_ck");
            }
        });
        var swb_index = mySwiper_js.activeIndex;
        $(".jsp_btn").find("a").removeClass("tpb_ck");
        $(".jsp_btn").find("a").eq(swb_index).addClass("tpb_ck");

        $(".jsp_btn").find("a").each(function(index){
            $(this).click(function(){
                $(".jsp_btn").find("a").removeClass("tpb_ck");
                $(this).addClass("tpb_ck");
                mySwiper_js.slideTo(index);
            })
        });


//        就餐人数切换查询
        $(".jc_btn a").click(function(){
            $(this).siblings().removeClass("jc_ck");
            $(this).addClass("jc_ck");
        })


//        时间段查询切换
        $(".year_sh a").click(function(){
            $(this).siblings().removeClass("ys_ck");
            $(this).addClass("ys_ck");
        })

        //        房租趋势图

        // 基于准备好的dom，初始化echarts实例
        var myChart_mg = echarts.init(document.getElementById('mj_mg'));
        var myChart_yy = echarts.init(document.getElementById('yy_ec'));
        var myChart_jc = echarts.init(document.getElementById('jc_ec'));
        var myChart_ft = echarts.init(document.getElementById('ft_ec'));
        var myChart_hl = echarts.init(document.getElementById('hl_ec'));
        var myChart_pf = echarts.init(document.getElementById('pf_ec'));

        // 指定图表的配置项和数据

//        利润面积图
        option_mg = {
            tooltip : {
                trigger: 'item',
                formatter: "{b}: {c}%"
            },
            calculable : false,
            series : [
                {
                    type:'treemap',
                    breadcrumb:false,
                    roam:false,
                    nodeClick: false,
                    itemStyle: {
                        normal: {
                            label: {
                                show: true,
                                formatter: "{b}: {c}%"
                            },
                            borderWidth: 1
                        },
                        emphasis: {
                            label: {
                                show: true
                            }
                        }
                    },
                    /*data:[
                        {
                            name: '葱油天鹅蛋',
                            value: 6
                        },
                        {
                            name: '鲅鱼水饺',
                            value: 4
                        },
                        {
                            name: '油淋鸟贝',
                            value: 4
                        },
                        {
                            name: '刺身海胆 ',
                            value: 2
                        },
                        {
                            name: '温拌海螺',
                            value: 2
                        }
                    ]*/
                    data:<?=Json::encode($data['dishes']['form'])?>
                }
            ]
        };


//        营业区域分析
        option_yyec = {
            title: {
                text: ''
            },
            tooltip : {
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
                data:['利润','成本','营业额'],
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
            toolbox: {

//                保存为图片
//                feature: {
//                    saveAsImage: {}
//                }
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
                    boundaryGap : false,
                    //data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                    data: <?=Json::encode($data['btween_analyse']['xAxis'])?>
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel: {
                        show: true,
                        interval: 'auto',
                        formatter: '{value}'
                    }
                }
            ],
            series : [
                {
                    name:'利润',
                    type:'line',
                    stack: '总量',
                    areaStyle: {normal: {}},
                    itemStyle : {
                        normal : {
                            color:'#73c2aa'
                        }
                    },
                    //data: [200, 400, 300, 600, 200, 300, 400]
                    data: <?=Json::encode($data['btween_analyse']['profit'])?>
                },
                {
                    name:'成本',
                    type:'line',
                    stack: '总量',
                    areaStyle: {normal: {}},
                    itemStyle : {
                        normal : {
                            color:'#ceb939'
                        }
                    },
                    //data: [200, 400, 500, 600, 700, 300, 500]
                    data: <?=Json::encode($data['btween_analyse']['costs'])?>
                },
                {
                    name:'营业额',
                    type:'line',
                    stack: '总量',
                    itemStyle : {
                        normal : {
                            color:'#1fe0f1'
                        }
                    },
                    label: {
                        normal: {
                            show: true,
                            position: 'top'
                        }
                    },
                    areaStyle: {normal: {}},
                    //data: [400, 500, 800, 300,220, 300, 200]
                    data:<?=Json::encode($data['btween_analyse']['bvolume'])?>
                }
            ]
        };

//        就餐人数
        option_jc = {
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                x: '20',
                //data:['1~2人就餐','3~4人就餐','5~6人就餐','7~8人就餐','其他'],
                data:<?=Json::encode($data['customer']['last_month']['legend'])?>,
                textStyle:{
                    fontSize:'12',
                    color:'#fff'
                }
            },
            series: [
                {
                    name:'就餐人数',
                    type:'pie',
                    radius: ['60%', '80%'],
                    center: ['60%', '45%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '12',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    /*data:[
                        {value:335, name:'1~2人就餐'},
                        {value:310, name:'3~4人就餐'},
                        {value:234, name:'5~6人就餐'},
                        {value:135, name:'7~8人就餐'},
                        {value:1548, name:'其他'}
                    ]*/
                    data:<?=Json::encode($data['customer']['last_month']['data'])?>
                }
            ]
        };

//        本店翻台率趋势图
        option_ftec = {
            title: {
                text: ''
            },
            tooltip : {
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
                data:['本店翻台率'],
                textStyle:{
                    fontSize:'12',
                    color:'#fff'
                },
                show:false
            },
//            字体颜色
            textStyle:{
                fontSize:'10',
                color:'#fff'
            },
            toolbox: {

//                保存为图片
//                feature: {
//                    saveAsImage: {}
//                }
            },
            grid: {
                top:'5%',
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月','8月', '9月', '10月', '11月', '12月'],
                    show:false
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel: {
                        show: true,
                        interval: 'auto',
                        formatter: '{value} %'
                    }
                }
            ],
            series : [
                {
                    name:'本店翻台率',
                    type:'line',
                    stack: '总量',
                    itemStyle : {
                        normal : {
                            color:'#a69836'
                        }
                    },
                    label: {
                        normal: {
                            show: false,
                            position: 'top'
                        }
                    },
                    areaStyle: {normal: {}},
                    //data: [100, 200, 150, 280,300, 360, 420, 370,300, 400, 500, 520]
                    data: <?=Json::encode($data['turn_rate']['trend'])?>
                }
            ]
        };

//        房租合理性
        option_hl = {
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} %"
            },
            legend: {
                orient : 'vertical',
                x : 'center',
                data:['房租'],
                textStyle:{
                    fontSize:'12',
                    color:'#fff'
                },
                show:false
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    magicType : {
                        show: true,
                        type: ['pie', 'funnel'],
                        option: {
                            funnel: {
                                x: '25%',
                                width: '50%',
                                funnelAlign: 'left',
                                max: 100
                            }
                        }
                    }
                }
            },
            calculable : true,
            series : [
                {
                    name:'房租合理性',
                    type:'pie',
                    radius : '70%',
                    center: ['50%', '40%'],
                    itemStyle : {
                        normal : {
                            label : {
                                position : 'inner',
                                formatter: "{b}: {c}%",
                                textStyle:{
                                    fontSize:'13',
                                    color:'#fff'
                                }
                            },
                            labelLine : {
                                show : true
                            }
                        }
                    },
                   /* data:[
                        {value:45, name:'房租'},
                        {value:100, name:'营业额'}
                    ]*/
                    data:<?=Json::encode($data['rationality']['data'])?>
                }
            ],
            color:['#ffc853', '#f19429']
        };

//        评分详情

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
        option_pf = {
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
                itemGap : document.getElementById('pf_ec').offsetWidth /22,
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
                    data:<?=Json::encode($data['comment_dateil']['frist']['environment'])?>
                },
                {
                    name:'环境',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[6, 7, 5.5]
                    data:<?=Json::encode($data['comment_dateil']['second']['environment'])?>
                },
                {
                    name:'服务',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    data:<?=Json::encode($data['comment_dateil']['frist']['service'])?>
                },
                {
                    name:'服务',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    data:<?=Json::encode($data['comment_dateil']['second']['service'])?>
                },
                {
                    name:'卫生',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[9.5, 9, 9.8]
                    data:<?=Json::encode($data['comment_dateil']['frist']['health'])?>
                },
                {
                    name:'卫生',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[5.5, 6, 5.2]
                    data:<?=Json::encode($data['comment_dateil']['second']['health'])?>
                },
                {
                    name:'菜品',
                    type:'bar',
                    stack: '总量',
                    itemStyle : dataStyle,
                    //data:[9, 9.1, 9.5]
                    data:<?=Json::encode($data['comment_dateil']['frist']['cookstyle'])?>
                },
                {
                    name:'菜品',
                    type:'bar',
                    stack: '总量',
                    itemStyle: placeHoledStyle,
                    //data:[6, 5.9, 5.5]
                    data:<?=Json::encode($data['comment_dateil']['second']['cookstyle'])?>
                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart_mg.setOption(option_mg);
        myChart_yy.setOption(option_yyec);
        myChart_jc.setOption(option_jc);
        myChart_ft.setOption(option_ftec);
        myChart_hl.setOption(option_hl);
        myChart_pf.setOption(option_pf);


    })();
</script>
<script type="text/javascript" src="/js/circle.js"></script>

</body>
</html>