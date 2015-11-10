{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="index" class="content">
	<div class="alist">
		<ul>
		{php} $i=1;{/php}
		{section name=vo loop=$plist}
			<li>
				{if !$haxPic}
				<div class="alist-pic"><a><img src="/public/image/{php}echo $i;$i++;{/php}.jpg" /></a></div>
				<div class="alist-main">
				{/if}
					<h2><a class="title" href="/post/{$plist[vo].id}">{$plist[vo].title}</a></h2>
					<p>{$plist[vo].content}</p>
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
				{if $haxPic}
				</div>
				{/if}
			</li>
		{sectionelse}
			<p><b><i>暂无文章</i></b></p>
		{/section}
		</ul>
	</div>
</div>
{include file="public/footer.tpl"}
