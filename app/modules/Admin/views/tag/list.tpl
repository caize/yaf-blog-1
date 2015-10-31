{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="tag" class="container">
	{include file="tag/title.tpl"}
	<div class="main">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>名称</th>
					<th>别名</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			{section name=vo loop=$_list}
				<tr>
					<td>{$_list[vo].name}</td>
					<td>{$_list[vo].slug}</td>
					<td aim_id="{$_list[vo].id}">
						<a bf="bf_update_tag" func="_modal" modal="update_tag" class="click" href="">编辑</a>
						&nbsp;&nbsp;
						<a func="del_tag" class="click" onclick="return false;" href="#">删除</a>
					</td>
				</tr>
			{sectionelse}
				<tr><td colspan='3'><i>暂无标签</i></td></tr>
			{/section}
			</tbody>
		</table>
	</div>
</div>

<div id="add_tag" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">添加标签</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label  class="col-sm-2 control-label">名称</label>
					<div class="col-sm-9">
						<input n='1' name="name" type="text" class="_param form-control">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">别名</label>
					<div class="col-sm-9">
						<input n='1' name="alias" type="text" class="_param form-control">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">描述</label>
					<div class="col-sm-9">
						<textarea name="desc" class="_param form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				取消
			</button>
			<button type="button" class="click btn btn-info" func="add_tag">
				提交
			</button>
		</div>
	</div>
	</div>
</div>

<div id="update_tag" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">添加标签</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label  class="col-sm-2 control-label">名称</label>
					<div class="col-sm-9">
						<input n='1' name="name" type="text" class="_param form-control">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">别名</label>
					<div class="col-sm-9">
						<input n='1' name="alias" type="text" class="_param form-control">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">描述</label>
					<div class="col-sm-9">
						<textarea name="desc" class="_param form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				取消
			</button>
			<button type="button" class="click btn btn-info" func="update_tag">
				提交
			</button>
		</div>
	</div>
	</div>
</div>
{include file="public/footer.tpl"}
