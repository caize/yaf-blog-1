{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}


<div id="post" class="content">
	<h1>{$post.title}</h1>
	<div class="meta">
		<span>浏览：{$post.views}</span>
		<span>日期：{$post.date}</span>
	</div>
	<div class="main">{$post.content}</div>
</div>


{include file="public/footer.tpl"}
