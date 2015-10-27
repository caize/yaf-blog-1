{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="category" class="container">
	{include file="tag/title.tpl"}
	<div id="add_tag" class="main">
		<div class="form-group">
			<label>名称</label>
			<input p="标签名称" n="1" name="name" class="_param form-control" placeholder="标签名称">
		</div>
		<div class="form-group">
			<label>缩略名</label>
			<input p="缩略名" n="1" name="slug" class="_param form-control" placeholder="缩略名 用于URL">
		</div>
		<br />
  		<button type="button" func="add_tag" class="click btn btn-primary btn-sm"> 提 交 </button>
	</div>
</div>
{include file="public/footer.tpl"}
