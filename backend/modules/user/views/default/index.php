<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--  <h3 class="header smaller lighter blue">jQuery dataTables</h3>  -->
<div class="clearfix">
   <div class="pull-left">
       <div class="dt-buttons btn-overlap btn-group">
           <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold"
            href="<?=Url::to(['/useradmin/default/create'])?>">
           <span><i class="fa fa-plus bigger-110 blue"></i> 
           </a>
       </div>
   </div> 
   <div class="pull-right tableTools-container"></div>
</div>
<div class="table-header">
   用户列表
</div>
<!-- div.dataTables_borderWrap -->
<div>
    <table id="articles-table" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th class="center">
                <label class="pos-rel">
                    <input type="checkbox" class="ace"/>
                    <span class="lbl"></span>
                </label>
            </th>
            <th>ID</th>
            <th>用户名</th>
            <th>Email</th>
            <th>性别</th>
            <th>出生日期</th>
            <th>类型</th>
            <th>图像</th>
            <th>状态</th>
            <th>lastLogin</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($dataProvider as $key => $val) { ?>
            <tr>
                <td class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace"/>
                        <span class="lbl"></span>
                    </label>
                </td>
                <td>
                    <a href="#"><?=Html::encode($val->id)?></a>
                </td>
                <td><?=Html::encode($val->username)?></td>
                <td><?=Html::encode($val->email)?></td>

                <td><?=Html::encode($val->sex)?></td>
                <td><?=Html::encode($val->birthday)?></td>   
                <td><?=Html::encode($val->usertype)?></td>
                <td><?=Html::encode($val->avatar)?></td>

                <td><?=Html::encode($val->status)?></td>
                <td><?=Html::encode(date('y/m/d H:i:s',$val->lastlogin))?></td>
                <td><?=Html::encode(date('y/m/d H:i:s',$val->created_at))?></td>

                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        <a class="blue" href="<?= Url::to(['default/view', 'id' => $val->id]) ?>">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </a>

                        <a class="green" href="<?= Url::to(['default/update', 'id' => $val->id]) ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>

                        <a class="red" href="<?= Url::to(['default/delete', 'id' => $val->id]) ?>" data-method="post">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>

                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"
                                    data-position="auto">
                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a href="" class="tooltip-info" data-rel="tooltip" title="View">
                                    <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                    </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        <?php }; ?>
        </tbody>
    </table>
</div>

<!-- page specific plugin scripts -->
<script src="/js/dataTables-1.10.9/jquery.dataTables.js"></script>
<script src="/js/dataTables-1.10.9/jquery.dataTables.bootstrap.js"></script>
<script src="/js/dataTables-1.10.9/extensions/buttons/dataTables.buttons.js"></script>
<script src="/js/dataTables-1.10.9/extensions/buttons/buttons.flash.js"></script>
<script src="/js/dataTables-1.10.9/extensions/buttons/buttons.html5.js"></script>
<script src="/js/dataTables-1.10.9/extensions/buttons/buttons.print.js"></script>
<script src="/js/dataTables-1.10.9/extensions/buttons/buttons.colVis.js"></script>
<script src="/js/dataTables-1.10.9/extensions/select/dataTables.select.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        //initiate dataTables plugin
       
        var myTable = $('#articles-table')
            .DataTable( {
                "sPaginationType": "full_numbers", //分页风格，full_number会把所有页码显示出来（大概是，自己尝试）
               
                "iDisplayLength": 10,//每页显示15条数据
                "bAutoWidth": false,//宽度是否自动，
                "bLengthChange": true, //每页显示条数
                "bFilter": true,   //搜索

                "oLanguage": {  //下面是一些汉语翻译
                   "sSearch": "搜索",
                    "sLengthMenu": "每页显示_MENU_条记录",
                    "sZeroRecords": "没有检索到数据",
                    "sInfo": "显示_START_至_END_条 &nbsp;&nbsp;共_TOTAL_条",
                    "sInfoFiltered": "(筛选自_MAX_条数据)",
                    "sInfoEmtpy": "没有数据",
                    "sProcessing": "正在加载数据...",
                    "sProcessing": "<img src='/js/dataTables-1.10.9/media/images/loading.gif'/>", //这里是给服务器发请求后到等待时间显示的 加载gif
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "前一页",
                        "sNext": "后一页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                },

            
                "aoColumnDefs": [   //和aoColums类似，但他可以给指定列附近爱属性
                    {"bSortable": false, "aTargets": [0,2,3,4,6,7,11]},  //这句话意思是第1,3,6,7,8,9列（从0开始算） 不能排序
                    {"bSearchable": true, "aTargets": [2]}, //bSearchable 这个属性表示是否可以全局搜索，其实在服务器端分页中是没用的
                ],
                "aaSorting": [[10, "desc"]], //默认排序

            } );

        $.fn.dataTable.Buttons.swfPath = "/js/dataTables-1.10.9/extensions/buttons/swf/flashExport.swf"; //in Ace demo ../assets will be replaced by correct assets path
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons(myTable, {
            buttons: [
                {
                    "extend": "colvis",
                    "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    columns: ':not(:first):not(:last)'
                },
                {
                    "extend": "copy",
                    "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "csv",
                    "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "excel",
                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "print",
                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    autoPrint: false,
                    message: 'This print was produced using the Print button for DataTables'
                }
            ]
        });
        myTable.buttons().container().appendTo($('.tableTools-container'));

        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });


        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {

            defaultColvisAction(e, dt, button, config);

            if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                    .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        ////
        setTimeout(function () {
            $($('.tableTools-container')).find('a.dt-button').each(function () {
                var div = $(this).find(' > div').first();
                if (div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                else $(this).tooltip({container: 'body', title: $(this).text()});
            });
        }, 500);

        myTable.on('select', function (e, dt, type, index) {
            if (type === 'row') {
                $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
            }
        });
        myTable.on('deselect', function (e, dt, type, index) {
            if (type === 'row') {
                $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
            }
        });

        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#articles-table > thead > tr > th input[type=checkbox], #articles-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $('#articles-table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#articles-table').on('click', 'td input[type=checkbox]', function () {
            var row = $(this).closest('tr').get(0);
            if (!this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });

        $(document).on('click', '#articles-table .dropdown-toggle', function (e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });


        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function () {
            var $row = $(this).closest('tr');
            if (this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });

        //********************************
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }
        
    })
</script>