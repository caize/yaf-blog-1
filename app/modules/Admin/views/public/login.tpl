<include file="Public:header" />

<div class="login">
	<form class="form-inline" role="form">
		<h3>登录</h3>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="icon-envelope"></i></div>
				<input class="email form-control" type="email" placeholder="邮箱">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="icon-lock"></i></div>
				<input class="passwd form-control" type="password" placeholder="密码">
			</div>
		</div>
		<button id="do_login" type="button" func="do_login" class="click btn btn-info">登录</button>
	</form>
</div>

<include file="Public:footer" />
