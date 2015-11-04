{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="index" class="content">
	<div class="alist">
		<ul>
		{section name=vo loop=$plist}
			<li>
				<h2><a class="title" href="#">{$plist[vo].title}</a></h2>
				<div class="meta">
					<span>
						<i class="icon-book"></i>
						<a href="#"></a>
					</span>
					<span>
						<i class="icon-tags"></i>
						<a href="#"></a>
					</span>
					<span>浏览：{$plist[vo].views}</span>
					<span>日期：{$plist[vo].date}</span>
				</div>
				<p>{$plist[vo].content}</p>
			</li>
		{sectionelse}
			<p><b><i>暂无文章</i></b></p>
		{/section}
		</ul>
	</div>
</div>
{include file="public/footer.tpl"}
