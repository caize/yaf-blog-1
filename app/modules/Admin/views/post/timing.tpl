{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="article" class="container">
	{include file="post/title.tpl" }
	<div class="main">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>标题</th>
					<th>分类</th>
					<th>标签</th>
					<th>发布时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
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
				<tr><td colspan="5">暂无相关文章</td></tr>
			</tbody>
		</table>
	</div>
</div>
{include file="public/footer.tpl"}
