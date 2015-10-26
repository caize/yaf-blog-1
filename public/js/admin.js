$(document).ready(function(){

	new Simditor({
		textarea: $('#editor'),
		toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent']
	});

	//选择框
	$('input.icheck').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red',
        increaseArea: '20%'
	});

	//重置选择框
	$('input.icheck').iCheck('uncheck');

	//选择分类
	$('#select_category input.icheck').on('ifChecked',function(){
		var id = $(this).val();
		var name = $(this).parent().parent().find('label').text();
		var html = '<span aim='+id+' class="label">';
		html += name;
		html += '</span>';
		$('#article label.category i').before(html);
	});	

	//移除分类
	$('#select_category input.icheck').on('ifUnchecked',function(){
		var id = $(this).val();
		$('#article label.category span[aim="'+id+'"]').remove();
	});	

	//选择标签
	$('#select_tag input.icheck').on('ifChecked',function(){
		var id = $(this).val();
		var name = $(this).parent().parent().find('label').text();
		var html = '<span aim='+id+' class="label">';
		html += name;
		html += '</span>';
		$('#article label.tag i').before(html);
	});

	//移除标签
	$('#select_tag input.icheck').on('ifUnchecked',function(){
		var id = $(this).val();
		$('#article label.tag span[aim="'+id+'"]').remove();
	});	

	//滚动条
	// $(".container").mCustomScrollbar({
	// 	theme:"dark",
	// 	scrollButtons:{
	// 		enable:true
	// 	}
	// });

});


//快速编辑文章的前置函数
function bf_update_article(o){
	var aim_id = o.parent().attr('aim_id');
	$('#update_article').attr('aim_id',aim_id);
}


//快速编辑文章
function update_article(o){
	var aim_id = $('#update_article').attr('aim_id');
	var url = "/admin.php/article/ajax_update";
	var obj = {};
	var param = {};
	param.aim_id = aim_id;
	param.status = $('input[name="status"]:checked').val();
	param.recommanded = $('input[name="recommanded"]:checked').val();
	obj.param = param;
	obj.url = url;
	_ajax(obj);
}


//编辑文章
function edit_article(o){
	var param = _param('#article');
	if( !param ){ return false; }
	param.category = return_category();
	param.tag      = return_tag();

	if(!(param.category && param.tag)){
		alert('尚未选择分类或标签！');
		return false;
	}

	var url = "/admin.php/article/ajax_edit";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}


function re_edit_article(o){
	var aim_id = o.parent().attr('aim_id');
	window.open('/admin.php/article/edit/id/'+aim_id);
}


//编辑标签
function update_tag(o){
	var param = _param('#update_tag');
	if( !param ){ return false; }
	param.id = $('#update_tag').attr('aim_id');

	var url = "/admin.php/tag/ajax_update";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}

function bf_update_tag(o){
	var id = o.parent().attr('aim_id');
	$('#update_tag').attr('aim_id',id);
	var tr = o.parent().parent();
	var name  = tr.find('[name="name"]').text();
	var alias = tr.find('[name="alias"]').text();
	var desc  = tr.find('[name="desc"]').text();
	$('#update_tag [name="name"]').val(name);
	$('#update_tag [name="alias"]').val(alias);
	$('#update_tag [name="desc"]').val(desc);
}

//删除标签
function del_tag(o){
	var param = {};
	param.id = o.parent().attr('aim_id');
	var re = confirm('确认要删除该标签！');
	if(re){
		var url = "/admin.php/tag/ajax_del";
		var obj = {};
		obj.param = param;
		obj.url   = url;
		_ajax(obj);
	}
}

//编辑分类
function update_category(o){
	var param = _param('#update_category');
	if( !param ){ return false; }
	param.id = $('#update_category').attr('aim_id');

	var url = "/admin.php/category/ajax_update";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}

//
function bf_update_category(o){
	var id = o.parent().attr('aim_id');
	$('#update_category').attr('aim_id',id);

	var tr = o.parent().parent();
	var name  = tr.find('[name="name"]').text();
	var alias = tr.find('[name="alias"]').text();
	var desc  = tr.find('[name="desc"]').text();
	var pname = tr.find('[name="pname"]').text();
	var img   = tr.find('[name="img"]').attr('value');

	$('#update_category select').children().each(function(){
		text = $(this).text();
		if(text == pname){
			$(this).attr('selected',true);
			return;
		}
	});

	$('#update_category [name="name"]').val(name);
	$('#update_category [name="alias"]').val(alias);
	$('#update_category [name="desc"]').val(desc);
	$('#update_category [name="img"]').val(img);
}

//删除分类
function del_category(o){
	var param = {};
	param.id = o.parent().attr('aim_id');
	var re = confirm('确认要删除该分类！');
	if(re){
		var url = "/admin.php/category/ajax_del";
		var obj = {};
		obj.param = param;
		obj.url   = url;
		_ajax(obj);
	}
}

//删除文章
function del_article(o){
	var param = {};
	param.id = o.attr('aim_id');
	var re = confirm('确认要删除这篇文章！');
	if(re){
		var url = "/admin.php/article/ajax_del";
		var obj = {};
		obj.param = param;
		obj.url   = url;
		_ajax(obj);
	}

}


//回车登录
$(document).keydown(function(e){
	if(e.keyCode == 13){
		do_login();
	}
});

//登录
function do_login(){
	var email  = $('.login .email').val();
	var passwd = $('.login .passwd').val();
	if(!(email && passwd)) return false;
	var param = {};
	param.email = email;
	param.passwd = passwd;

	var url = "/admin.php/public/ajax_login";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}


//发表文章
function add_article(o){
	var param = _param('#article');
	// var flag  = o.attr('flag');
	if( !param ){ return false; }
	param.category = return_category();
	param.tag      = return_tag();
	param.flag     = o.attr('flag');
	if(!(param.category && param.tag)){
		alert('尚未选择分类或标签！');
		return false;
	}
	var url = "/admin.php/article/ajax_add";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}

//function click_add_post(o){
	//window.open('/admin.php/article/add');
//}

//添加分类
function add_category(o){
	var param = _param('#add_category');
	if( !param ){ return false; }
	var url = "/admin.php/category/ajax_add";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}

function add_tag(o){
	var param = _param('#add_tag');
	if( !param ){ return false; }
	var url = "/admin.php/tag/ajax_add";
	var obj = {};
	obj.param = param;
	obj.url   = url;
	_ajax(obj);
}


//返回选择的文章分类
function return_category(){
	var str = '';
	$('#article label.category span').each(function(){
		var aim = $(this).attr('aim');
		if( !aim ){
			return false;
		}
		str += aim;
		str += '_';
	});
	if(str == ''){ return false; }
	return str;
}

//返回选择的文章标签
function return_tag(){
	var str = '';
	$('#article label.tag span').each(function(){
		var aim = $(this).attr('aim');
		if( !aim ){
			return false;
		}
		str += aim;
		str += '_';
	});
	if(str == ''){ return false; }
	return str;
}




