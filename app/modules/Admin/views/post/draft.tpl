{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="article" class="container">
	{include file="post/title.tpl"}
	<div class="main">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>标题</th>
					<th>分类</th>
					<th>标签</th>
					<th>日期</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			{section name=vo loop=$list}
					<tr>
						<td>{$vo.title}</td>
						<td>{$vo.category}</td>
						<td>{$vo.tag}</td>
						<td>{$vo.date}</td>
						<td aim_id="{$vo.id}" recommanded="{$vo.recommanded}" status="{$vo.status}">
							<i title="快速编辑" bf="bf_update_article" func="_modal" modal="update_article" class="click icon-edit"></i>&nbsp;
							<i title="编辑" func="re_edit_article" class="click icon-pencil"></i>&nbsp;
							<i aim_id="{$vo.id}" func="del_article" class="icon-remove click"></i> 
						</td>
					</tr>
			{sectionelse}
				<tr><td colspan='6'><i>没有相关文章</i></td></tr>
			{/section}
			</tbody>
		</table>
	</div>
</div>
<div id="update_article" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">快速编辑</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label  class="col-sm-2 control-label">状态</label>
					<label class="radio-inline">
						<input type="radio" name="status" value="0"> 发布
					</label>
					<label class="radio-inline">
						<input checked="1" type="radio" name="status" value="1"> 草稿
					</label>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">推荐</label>
					<label class="radio-inline">
						<input type="radio" name="recommanded" value="1"> 是
					</label>
					<label class="radio-inline">
						<input type="radio" name="recommanded" value="0"> 否
					</label>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">定时</label>
					<input type="text" name="date" id="datetimepicker">
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				取消
			</button>
			<button type="button" class="click btn btn-info" func="update_article">
				提交
			</button>
		</div>
	</div>
	</div>
</div>
{include file="public/footer.tpl"}
