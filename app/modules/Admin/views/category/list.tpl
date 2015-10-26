{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="category" class="container">
	{include file="category/title.tpl"}
	<div class="main">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>名称</th>
					<th>别名</th>
					<th>描述</th>
					<th>父级</th>
					<th>文章</th>
					<th>图像</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td name="name"></td>
						<td name="alias"></td>
						<td name="desc"></td>
						<td name="pname"></td>
						<td name="num"></td>
						<td name="img" value="" class="img">
						</td>
						<td aim_id="">
							<i title="编辑" bf="bf_update_category" func="_modal" modal="update_category" class="click icon-edit"></i>&nbsp;
							<i title="删除" func="del_category" class="click icon-remove"></i>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="add_category" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">添加分类</h4>
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
					<label  class="col-sm-2 control-label">父级</label>
					<div class="col-sm-9">
						<select n='1' p="父级" name="pid" class="_param form-control">
							<option value="0">无</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">图像</label>
					<div class="col-sm-9">
						<input  name="img" type="text" class="_param form-control">
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
			<button type="button" class="click btn btn-info" func="add_category">
				提交
			</button>
		</div>
	</div>
	</div>
</div>

<div id="update_category" class="modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">添加分类</h4>
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
					<label  class="col-sm-2 control-label">父级</label>
					<div class="col-sm-9">
						<select n='1' p="父级" name="pid" class="_param form-control">
							<option value="0">无</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">图像</label>
					<div class="col-sm-9">
						<input  name="img" type="text" class="_param form-control">
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
			<button type="button" class="click btn btn-info" func="update_category">
				提交
			</button>
		</div>
	</div>
	</div>
</div>
{include file="public/footer.tpl"}
