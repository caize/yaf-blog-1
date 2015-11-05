{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="index" class="content">
	<div class="alist">
		<ul>
		{section name=vo loop=$plist}
			<li>
				<h2><a class="title" href="/post/{$plist[vo].id}">{$plist[vo].title}</a></h2>
				<div class="meta">
					<span>
						<i class="icon-book"></i>
						{section name=co loop=$plist[vo].category}
						<a href="{$plist[vo].category[co].taxonomy_slug}">{$plist[vo].category[co].taxonomy_name}</a>
						{/section}
					</span>
					<span>
						<i class="icon-tags"></i>
						{section name=to loop=$plist[vo].tag}
						<a href="/tag/{$plist[vo].tag[to].taxonomy_slug}">{$plist[vo].tag[to].taxonomy_name}</a>
						{/section}
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
