$(document).on('click','.click',_click);

function _click(){
	var o = $(this);
	var func = o.attr('func');
	var tmp = _is_func(func);
	if( !tmp ){
		cl('click事件调用的方法不存在！');
		return false;
	}
	eval(func+'(o)');
}

/**
 * func ajax请求
 */
function _ajax( obj ){
	$.post(
		obj.url,
		obj.param,
		function(data){ _ajax_cb(data,obj); },
		'json'
	);
}

/**
 * func ajax回调
 */
function _ajax_cb(data, obj){
	var code = data.code;
	var func = data.func;
	switch( code ){
		case 'error':
			alert(data.body);
			if(func) { eval(func+'()'); }
			break;
		case 'success':
			alert(data.body);
			if(func) { eval(func+'()'); }
			break;
		case 'cb':
			var f = obj.func;
			var tmp = _is_func(f);
			tmp  ? eval(f+'(data.body,obj)') : cl('回调函数不存在');
			break;
		case 'jump':
			location.href = data.body;
			break;
		case 'reload':
			location.reload();
			break;
		default:
			// location.reload();
	}
}

/**
 * func 显示模态对话框
 */
function _modal(o){
	var bf = o.attr('bf');
	if(bf){
		var tmp = _is_func(bf);
		tmp ? eval(bf+'(o)') : cl('回调函数不存在');
	}
	var modal = o.attr('modal');
	$('#'+modal).modal('show');
}

/**
 * func 自动获取参数
 */
 function _param( head ){
 	if( !head ){ head=''};
	var obj = {};
	var name = '';
	var value = '';
	var flag = 1;
	$(head + ' ._param').each(function(){
		if( flag == 0 ){ return ;}
		name = $(this).attr('name');  // 获取变量
		value = $(this).val();
		if( $(this).attr('n') == '1' && value == ''){
			flag = 0;
			alert( $(this).attr('p') +" 不能为空！");
			return;
		}
		obj[name] = value;
	});
	if( flag == 0 ){
		return flag;
	}
	return obj;
 }

 function reload(){
	location.reload();
 }


/**
 * func console.log()
 */
function cl( data ){
	console.log(data);
}


/**
 * func 判断方法是否存在
 */
function _is_func( func ) {
    try {
        if (typeof(eval(func)) == "function") {
            return true;
        }
    } catch(e) {}
    return false;
}
