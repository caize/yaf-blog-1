	<div class="title">
		<span class="active">
			<a href='/admin/post/index'>文章列表</a>
		</span>
		<span class="<?php if($func == 'draft') echo 'active'; ?>">
			<a href="/admin/post/draft">草稿管理</a>
		</span>
		<span class="<?php if($func == 'timing') echo 'active'; ?>">
			<a href="/admin/post/timing">定时发布</a>
		</span>
		<span class="<?php if($func == 'del') echo 'active'; ?>">
			<a href="/admin/post/del">已删除文章</a>
		</span>
		<div class="action">
			<a href="/admin/post/add" type="button" class="btn-xs btn btn-success">
				<i class="icon-plus"></i> 添加文章	
			</a>
		</div>
	</div>
