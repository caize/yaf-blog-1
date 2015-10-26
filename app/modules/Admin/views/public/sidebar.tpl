<div id="sidebar">
	<!--<div class="avatar">-->
		<!--<img src="/Public/img/avatar.jpg" alt="" class="img-circle">-->
		<!--<span>Hello,小山</span>-->
	<!--</div>-->
	{php}
		$active = 'post';
		$$active = 'active';
	{/php}	
	<ul class="nav nav-stacked" role="tablist">
		<li class="{$index}">
			<a href="/admin/index/index"><i class="icon-home"></i> 仪表盘</a>
		</li>
		<li class="{$post}">
			<a href="/admin/post/index"><i class="icon-book"></i> 文 章</a>
		</li>
		<li class="">
			<a href="/admin/post/index"><i class="icon-comment"></i> 评 论</a>
		</li>
		<li class="">
			<a href="/admin/index/index"><i class="icon-tasks"></i> 分 类</a>
		</li>
		<li class="">
			<a href="/admin/index/index"><i class="icon-tags"></i> 标 签</a>
		</li>
		<li class="">
			<a href="/admin/index/index"><i class="icon-user"></i> 用 户</a>
		</li>
		<li class="">
			<a href="/admin/index/index"><i class="icon-wrench"></i> 配 置</a>
		</li>
	</ul>
</div>
