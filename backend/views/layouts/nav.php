<?php
use yii\helpers\Url;
use backend\models\Nav;
?>

<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-success">
            <i class="ace-icon fa fa-signal"></i>
        </button>

        <button class="btn btn-info">
            <i class="ace-icon fa fa-pencil"></i>
        </button>

        <!-- #section:basics/sidebar.layout.shortcuts -->
        <button class="btn btn-warning">
            <i class="ace-icon fa fa-users"></i>
        </button>

        <button class="btn btn-danger">
            <i class="ace-icon fa fa-cogs"></i>
        </button>

        <!-- /section:basics/sidebar.layout.shortcuts -->
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
    </div>
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
    <li class="active">
        <a href="<?=Url::to(['/site/index'])?>">
            <i class="menu-icon fa fa-home"></i>
            <span class="menu-text">首&nbsp;&nbsp;&nbsp;&nbsp;页</span>
        </a>

        <b class="arrow"></b>
    </li>

    <?php foreach (Nav::navList() as $key => $value){ ?>
    <li class="">
        <a href="javascript::void(0)" class="dropdown-toggle">
            <i class="menu-icon fa  <?=$value['icon']?> "></i>
            <span class="menu-text"> <?=$value['title']?> </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>

        <ul class="submenu">
            <?php foreach ($value['item'] as $k => $val){ ?>
            <li class="">
                <a href="<?=Url::to($val['link'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    <?=$val['title']?>
                </a>
                <b class="arrow"></b>
            </li>
            <?php };?>
        </ul>
    </li>
    <?php };?>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
