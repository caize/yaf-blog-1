{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="article" class="container">
{include file="post/title.tpl"}
	<div class="main">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>标题</th>
					<th>日期</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			{section name=vo loop=$plist}
				<tr>
					<td>{$plist[vo].id}</td>
					<td>{$plist[vo].title}</td>
					<td>{$plist[vo].date}</td>
					<td aim_id="{$plist[vo].id}" recommanded="{$vo.recommanded}" status="{$vo.status}">
						<a bf="" func="_modal" modal="update_tag" class="click" href="">编辑</a>
						&nbsp;&nbsp;
						<a func="del_post" class="click" onclick="return false;" href="#">删除</a>
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
						<input type="radio" name="status" value="1"> 草稿
					</label>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label">推荐</label>
					<label class="radio-inline">
						<input checked type="radio" name="recommanded" value="1"> 是
					</label>
					<label class="radio-inline">
						<input checked type="radio" name="recommanded" value="0"> 否
					</label>
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
