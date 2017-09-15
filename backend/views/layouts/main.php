<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Ace Admin</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <?= Html::csrfMetaTags() ?>

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/css/bootstrap.css" />
        <link rel="stylesheet" href="/css/font-awesome.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/js/jquery.js'>"+"<"+"/script>");
        </script>
        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
         window.jQuery || document.write("<script src='/js/jquery1x.js'>"+"<"+"/script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='/js/jquery.mobile.custom.js'>"+"<"+"/script>");
        </script>
        <script src="/js/bootstrap.js"></script>
    
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="/js/ace-extra.js"></script>
    </head>
<body class="no-skin">
    <!-- #section:basics/navbar.layout -->
    <div id="navbar" class="navbar navbar-default">
        <script type="text/javascript">
            try{ace.settings.check('navbar' , 'fixed')}catch(e){}
        </script>

        <div class="navbar-container" id="navbar-container">
            <!-- #section:basics/sidebar.mobile.toggle -->
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <!-- /section:basics/sidebar.mobile.toggle -->
            <div class="navbar-header pull-left">
                <!-- #section:basics/navbar.layout.brand -->
                <a href="/" class="navbar-brand">
                    <small>
                        <i class="fa fa-leaf"></i>
                        Ace Admin
                    </small>
                </a>
                <!-- /section:basics/navbar.layout.brand -->
            </div>

            <!-- #section:basics/navbar.dropdown -->
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="grey">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-tasks"></i>
                            <span class="badge badge-grey">4</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-check"></i>
                                4 Tasks to complete
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Software Update</span>
                                                <span class="pull-right">65%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:65%" class="progress-bar"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Hardware Upgrade</span>
                                                <span class="pull-right">35%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Unit Testing</span>
                                                <span class="pull-right">15%</span>
                                            </div>

                                            <div class="progress progress-mini">
                                                <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">Bug Fixes</span>
                                                <span class="pull-right">90%</span>
                                            </div>

                                            <div class="progress progress-mini progress-striped active">
                                                <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">
                                    See tasks with details
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="purple">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            <span class="badge badge-important">8</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-exclamation-triangle"></i>
                                8 Notifications
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    New Comments
                                                </span>
                                                <span class="pull-right badge badge-info">+12</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="btn btn-xs btn-primary fa fa-user"></i>
                                            Bob just signed up as an editor ...
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                                                    New Orders
                                                </span>
                                                <span class="pull-right badge badge-success">+8</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                                                    Followers
                                                </span>
                                                <span class="pull-right badge badge-info">+11</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">
                                    See all notifications
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="green">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                            <span class="badge badge-success">5</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                5 Messages
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Alex:</span>
                                                    Ciao sociis natoque penatibus et auctor ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>a moment ago</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Susan:</span>
                                                    Vestibulum id ligula porta felis euismod ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>20 minutes ago</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Bob:</span>
                                                    Nullam quis risus eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>3:15 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Kate:</span>
                                                    Ciao sociis natoque eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>1:33 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Fred:</span>
                                                    Vestibulum id penatibus et auctor  ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>10:09 am</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="inbox.html">
                                    See all messages
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- #section:basics/navbar.user_menu -->
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="/images/avatars/user.jpg" alt="Jason's Photo" />
                            <span class="user-info">
                                <small>Welcome,</small>
                                <?=ucfirst(Yii::$app->user->identity->username);?>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="<?=URL::to(['/manage/setting/index']);?>">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="<?=URL::to(['/manage/setting/profile']);?>">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?=URL::to(['/site/logout']);?>">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    登出
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- /section:basics/navbar.user_menu -->
                </ul>
            </div>
            <!-- /section:basics/navbar.dropdown -->
        </div><!-- /.navbar-container -->
    </div>

    <!-- /section:basics/navbar.layout -->
    <div class="main-container" id="main-container">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        <!-- #section:basics/sidebar -->
        <div id="sidebar" class="sidebar responsive">
            <?=\Yii::$app->view->renderFile('@app/views/layouts/nav.php');?>
        </div>
		
        <!-- /section:basics/sidebar -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs" id="breadcrumbs">
                    <script type="text/javascript">
                        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                    </script>

                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="<?=Url::to(['/site/index'])?>">Home</a>
                        </li>
                        <li><a href="">Home1</a></li>

                        <li class="active">Home2</li>
                    </ul><!-- /.breadcrumb -->

                    <div class="nav-search" id="nav-search">
                        <form class="form-search">
                            <span class="input-icon">
                                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                <i class="ace-icon fa fa-search nav-search-icon"></i>
                            </span>
                        </form>
                    </div><!-- /.nav-search -->
                </div>

                <div class="page-content">
                     <!-- <div class="page-header">
                        <h1>
                            Dashboard
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                overview &amp; stats
                            </small>
                        </h1>
                    </div>  -->
                    <!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <?= $content ?>
                        </div>    
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
		
        <div class="footer">
          <?=\Yii::$app->view->renderFile('@app/views/layouts/footer.php');?>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->
   
    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
      <script src="/js/excanvas.js"></script>
    <![endif]-->
    <script src="/js/jquery-ui.custom.js"></script>
    <script src="/js/jquery.ui.touch-punch.js"></script>

    <!-- ace scripts -->
    <script src="/js/ace/elements.scroller.js"></script>
    <script src="/js/ace/elements.colorpicker.js"></script>
    <script src="/js/ace/elements.fileinput.js"></script>
    <script src="/js/ace/elements.typeahead.js"></script>
    <script src="/js/ace/elements.wysiwyg.js"></script>
    <script src="/js/ace/elements.spinner.js"></script>
    <script src="/js/ace/elements.treeview.js"></script>
    <script src="/js/ace/elements.wizard.js"></script>
    <script src="/js/ace/elements.aside.js"></script>
    <script src="/js/ace/ace.js"></script>
    <script src="/js/ace/ace.ajax-content.js"></script>
    <script src="/js/ace/ace.touch-drag.js"></script>
    <script src="/js/ace/ace.sidebar.js"></script>
    <script src="/js/ace/ace.sidebar-scroll-1.js"></script>
    <script src="/js/ace/ace.submenu-hover.js"></script>
    <script src="/js/ace/ace.widget-box.js"></script>
    <script src="/js/ace/ace.settings.js"></script>
    <script src="/js/ace/ace.settings-rtl.js"></script>
    <script src="/js/ace/ace.settings-skin.js"></script>
    <script src="/js/ace/ace.widget-on-reload.js"></script>
    <script src="/js/ace/ace.searchbox-autocomplete.js"></script>

</body>
</html>