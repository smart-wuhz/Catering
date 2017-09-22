<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\models\Cookstyle;
use frontend\models\ShopCategory;
$this->title = '编辑店铺';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?=Html::csrfMetaTags()?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/LArea.css">
    <link rel="stylesheet" href="/css/swiper-3.4.2.min.css">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/swiper-3.4.2.jquery.min.js"></script>
    <title><?=Html::encode($this->title)?></title>
</head>
<body>
<div class="idx_main ">

    <!--公共导航-->
    <div id="header"></div>

    <div class="sx_mask">&nbsp;</div>
    <!--筛选弹窗-->

    <!--餐厅类型-->
    <div class="tj_alert ct_ddd">
        <div class="al_tit">
            <a href="javascript:void(0)" class="albtn_left">取消</a>
            <a href="javascript:void(0)" class="albtn_right ct_end">确定</a>
        </div>
        <div class="alsx_body swiper-container tj_swp">
            <div class="dwwo">&nbsp;</div>
            <ul class="swiper-wrapper">
                <li class="swiper-slide">下滑选择推荐</li>
                <?php foreach (ShopCategory::cateList() as $key=>$value):?>
                    <li class="swiper-slide" data-id="<?=$value['id']?>"><?=$value['name']?></li>
                <?php endforeach;?>
                <li class="swiper-slide">已加载全部推荐</li>
            </ul>
        </div>
    </div>

    <!--主营菜系弹窗-->

    <div class="tj_alert zy_ddd">
        <div class="al_tit">
            <a href="#" class="albtn_left">取消</a>
            <a href="#" class="albtn_right zy_end">确定</a>
        </div>
        <div class="alsx_body swiper-container dp_swp">
            <div class="dwwo">&nbsp;</div>
            <ul class="swiper-wrapper">
                <li class="swiper-slide">下滑选择菜系</li>
                <?php foreach (Cookstyle::cookList('223') as $key=>$value):?>
                    <li class="swiper-slide" data-id="<?=$value['id']?>"><?=$value['name']?></li>
                <?php endforeach;?>
                <li class="swiper-slide">已加载全部菜系</li>
            </ul>
        </div>
    </div>

    <div class="body_main ">
        <!--右侧遮罩层-->
        <div class="mask_right ">
            &nbsp;
        </div>
        <!--头部导航-->
        <div class="nav_hd">
            <a href="javascript:void(0)" class="nav_btn"><img src="/images/nav_btn.png"></a>
            <a href="/" class="idx"><img src="/images/idx.png"></a>
        </div>

        <!--个人中心-->
        <?php $form = ActiveForm::begin(['id' => 'form-update','action' => ['shop/update','id'=>$model->id],'method'=>'post']); ?>
        <div class="mb_box add_dp">
            <div class="mb_item">
                <span class="mbi_left">店铺名称</span>
                <span class="mbi_right">
                    <?= $form->field($model, 'name')->textInput(['placeholder' =>'请输入店铺名称'])->label(false) ?>
                </span>
            </div>

            <div class="mb_item mb_two">
                <div class="mbi_name">
                    <span class="mbi_left">餐厅类型</span>
                    <span class="mbi_right arr_right ct_albtn"><?=$model->shopcate->name?></span>
                    <?= $form->field($model, 'category_id')->hiddenInput(['id' =>'category_id'])->label(false) ?>
                </div>
                <div class="mbi_psd">
                    <span class="mbi_left">主营菜系</span>
                    <span class="mbi_right arr_right zy_albtn"><?=$model->cookstyle->name?></span>
                    <?= $form->field($model, 'cookstyle_id')->hiddenInput(['id' =>'cookstyle_id'])->label(false) ?>
                </div>
            </div>

            <div class="mb_item mb_two">
                <div class="mbi_name" id="select_region">
                    <span class="mbi_left">所在区域</span>
                    <span class="mbi_right arr_right">
                        <input id="demo1" type="text" readonly=""  value="<?=$regionName?>">
                        <?= $form->field($model, 'region_id')->hiddenInput(['id' =>'value1'])->label(false) ?>
                    </span>
                </div>
                <div class="mbi_psd">
                    <span class="mbi_left">
                        <?= $form->field($model, 'address')->textInput(['placeholder' =>'请填写详细地址，不少于5个字'])->label(false) ?>
                    </span>
                </div>
            </div>
        </div>
        <?=Html::submitButton('保存', ['class' => 'bgdel_btn']) ?>
        <?php ActiveForm::end(); ?>

        <!--深度报告按钮-->
        <a href="<?=Url::toRoute(['fastreport/index'])?>" class="sd_btn"><span>店铺深度报告</span></a>

    </div>
</div>
<!--<script type="text/javascript" src="/js/city/LAreaData1.js"></script>
<script type="text/javascript" src="/js/city/LAreaData2.js"></script>-->
<script type="text/javascript" src="/js/city/LAreaData.js"></script>
<script type="text/javascript" src="/js/city/province.js"></script>
<script type="text/javascript" src="/js/city/citys.js"></script>
<script type="text/javascript" src="/js/city/dists.js"></script>

<script type="text/javascript" src="/js/city/LArea.js"></script>
<script>
    $(function(){
        // 选择弹窗
        function tjsxalertOpne(){
            $(".sx_mask,.ct_ddd").addClass("al_open");
            var swiper_tj = new Swiper('.tj_swp', {
                direction: 'vertical',
                slidesPerView: 3,
                paginationClickable: true,
                mousewheelControl: true
            });
            selected('category_id','tj_swp',swiper_tj);
        }
        function tjsxalertClose(){
            $(".sx_mask,.ct_ddd").removeClass("al_open");
        }

        function dpsxalertOpne(){
            $(".sx_mask,.zy_ddd").addClass("al_open");
            var swiper_dp = new Swiper('.dp_swp', {
                direction: 'vertical',
                slidesPerView: 3,
                paginationClickable: true,
                mousewheelControl: true
            });
            selected('cookstyle_id','dp_swp',swiper_dp);
        }
        function dpsxalertClose(){
            $(".sx_mask,.zy_ddd").removeClass("al_open");
        }

        //餐饮类型
        $(".ct_albtn").click(function(){
            tjsxalertOpne();
        })

        //主营菜系
        $(".zy_albtn").click(function(){
            dpsxalertOpne();
        })


        $(".albtn_left").click(function(){
            tjsxalertClose();
            dpsxalertClose();
        })

        //餐厅类型文字修改
        $(".ct_end").click(function(){
            var ct_txt = $(".ct_ddd .swiper-slide-next").text();
            $(".ct_albtn").text(ct_txt);
            tjsxalertClose();

            var id =$(".ct_ddd .swiper-slide-next").attr('data-id');
            $("#category_id").val(id);
        })

        //菜系文字切换
        $(".zy_end").click(function(){
            var zy_txt = $(".zy_ddd .swiper-slide-next").text();
            $(".zy_albtn").text(zy_txt);
            dpsxalertClose();

            var id =$(".zy_ddd .swiper-slide-next").attr('data-id');
            $("#cookstyle_id").val(id);
        })

        var area1 = new LArea();
        area1.value=[<?=$model->region_id?>];//控制初始位置，注意：该方法并不会影响到input的value
        area1.init({
            'trigger': '#demo1', //触发选择控件的文本框，同时选择完毕后name属性输出到该位置
            'valueTo': '#value1', //选择完毕后id属性输出到该位置
            'keys': {
                id: 'id',
                name: 'name'
            }, //绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
            'type': 1, //数据源类型
            'data': LAreaData.data //数据源
        });

        var area2 = new LArea();
        area2.init({
            'trigger': '#demo2',
            'valueTo': '#value2',
            'keys': {
                id: 'id',
                name: 'name'
            },
            'type': 2,
            'data': [provs_data.data, citys_data.data, dists_data.data]
        });
    });

    //选中状态
    function selected(id,classname,swiper) {
        var selectID= $("#"+id).val();
        $("."+classname+" li").each(function(index){
            var ttt= $(this).attr('data-id');
            if(ttt == selectID) {
                swiper.slideTo(index);
            }
        });
    }
</script>
</body>
</html>
