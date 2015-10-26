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
			{section name=vo loop=$list}
					<tr>
						<td>{$vo.title}</td>
						<td>{$vo.category}</td>
						<td>{$vo.tag}</td>
						<td>{$vo.date}</td>
						<td aim_id="{$vo.id}" recommanded="{$vo.recommanded}" status="{$vo.status}">
							<i aim_id="{$vo.id}" func="regain_article" title="恢复为草稿" class="icon-check click"></i> 
						</td>
					</tr>
			{sectionelse}
				<tr><td colspan='6'><i>没有相关文章</i></td></tr>
			{/section}
			</tbody>
		</table>
	</div>
</div>
{include file="public/footer.tpl"}
