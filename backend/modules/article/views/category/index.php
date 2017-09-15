<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<!-- <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->
<div class="clearfix">
	<div class="pull-right tableTools-container"></div>
</div>
<div class="table-header">
	文章分类列表
</div>
<!-- div.dataTables_borderWrap -->
<div>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>名称</th>
				<th width="50%">Pic</th>
				<th>排序</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($dataProvider as $key => $val) { ?>
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="#"><?=Html::encode($val->id)?></a>
				</td>
				<td><?=Html::encode($val->name)?></td>
				<td><?=Html::encode($val->pic)?></td>

				<td><?=Html::encode($val->sort_order)?></td>

				<td>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="blue" href="<?=Url::to(['/articleadmin/category/view','id' =>$val->id])?>">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>

						<a class="green" href="<?=Url::to(['/articleadmin/category/update','id' =>$val->id])?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" href="<?=Url::to(['/articleadmin/category/delete','id' =>$val->id])?>">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
			<?php };?>
		</tbody>
	</table>

    <div class="clearfix">
        <div class="pull-left">共<?=$pagination->totalCount?>条</div> 
        <div class="pull-right">
           <?=LinkPager::widget([
                'pagination' => $pagination,
                'firstPageLabel'=> '首页', 
                'lastPageLabel' => '尾页',
                'nextPageLabel' => '下一页', 
                'prevPageLabel' => '上一页',
           ]);?>
       </div>
    </div>

</div>