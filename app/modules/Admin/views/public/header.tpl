<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>李小山 | 后台管理</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/public/simditor/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/public/simditor/simditor.css" />
	<link rel="stylesheet" type="text/css" href="/public/icheck/skins/all.css" />
	<link rel="stylesheet" type="text/css" href="/public/js/jquery.mCustomScrollbar.css" />
	<link rel="stylesheet" type="text/css" href="/public/css/admin.css" />
</head>
<body>	
<header>
	<h1 role="logo">网站后台</h1>
	<div class="account" role="account">
		<span class="glyphicon glyphicon-user"></span>
		{if $is_login}
			<span class="user">李苦李</span>
			<span><a href="/admin/public/logout">退出</a></span>
		{else}
			<span class="user">未登录</span>
		{/if}
	</div>
</header>

