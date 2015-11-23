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

	<nav id="pnav">
		<ul>
		{if $page neq 1}
			<li><a class="pnav-icon page-pre" href="/page/{$page-1}"><i class="icon-angle-left"></i></a></li>
		{/if}

		{php}
			$page  = $this->_tpl_vars[page];
			$pages = $this->_tpl_vars[pages];
			for($i=1; $i<=$pages; $i++){
				if($i != $page){
					echo "<li><a href='/page/".$i."'>".$i."</a></li>";
				}else{
					echo "<li><a class='active' href='/page/".$i."'>".$i."</a></li>";
				}
			}
		{/php}

		{if $page neq $pages and $pages gt 5}
			<li><a href="#">...</a></li>
			<li><a href="#">{$pages}</a></li>
		{/if}
		{if $page neq $pages}
			<li><a class="pnav-icon page-next" href="{$page+1}"><i class="icon-angle-right"></i></a></li>
		{/if}
		</ul>
	</nav>
</div>

{include file="public/footer.tpl"}
