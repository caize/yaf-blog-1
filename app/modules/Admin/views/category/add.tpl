{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="category" class="container">
	{include file="category/title.tpl"}
	<div id="add_category" class="main">
		<div class="form-group">
			<label>名称</label>
			<input p="名称" n="1" name="name" class="_param form-control" placeholder="分类名称">
		</div>
		<div class="form-group">
			<label>缩略名</label>
			<input p="缩略名" n="1" name="slug" class="_param form-control" placeholder="缩略名 用于URL">
		</div>
		<div class="form-group">
			<label>父级</label>
			<select class="form-control">
				<option value="0">无</option>
			</select>
		</div>
		<br />
  		<button type="button" func="add_category" class="click btn btn-primary btn-sm"> 提 交 </button>
	</div>
</div>
{include file="public/footer.tpl"}
