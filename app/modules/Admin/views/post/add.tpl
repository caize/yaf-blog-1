{include file="public/header.tpl"}
{include file="public/sidebar.tpl"}
<div id="article" class="simditor_page container">
	{include file="post/title.tpl"}
	<div class="main">
		<div class="form-group">
			<input n='1' type="text" name="title" class="_param form-control" p="文章标题" placeholder="文章标题">
		</div>
		<textarea n='1' id="editor" name="content" class="_param" autofocus></textarea>
		<div class="ct form-group">
			<label  class="category">
				分类：
				<i func="_modal" modal="select_category" class="icon-plus click"></i> 
			</label>
			<label class="tag">
				标签：
				<i func="_modal" modal="select_tag" class="icon-plus click"></i>
			</label>
		</div>
		<div class="a_action">
			<button type="button" class="click btn btn-warning" status="1" func="add_article">
				<i class="icon-off"></i>保存
			</button>
			<button type="button" class="btn btn-info"><i class="icon-eye-open"></i>预览</button>
			<button type="button" class="click btn btn-success" status="0" func="add_article">
				<i class="icon-ok"></i>提交
			</button>
		</div>
	</div>
</div>

<div id="select_category" class="article_select modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">选择分类</h4>
		</div>
		<div class="modal-body">
				<div class="pcategory">
					<input class="icheck" type="checkbox" value="">
					<label></label>
				</div>
				<ul class="ccategory">
						<li>
							<input class="icheck" type="checkbox" value="">
							<label></label>
						</li>
				</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				关闭
			</button>
		</div>
	</div>
	</div>
</div>

<div id="select_tag" class="article_select modal fade">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">选择标签</h4>
		</div>
		<div class="modal-body">
			<ul class="ccategory">
					<li>
						<input class="icheck" type="checkbox" value="">
						<label></label>
					</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				关闭
			</button>
		</div>
	</div>
	</div>
</div>

{include file="public/footer.tpl"}
<script type="text/javascript" src="/Public/js/simditor.js"></script>
