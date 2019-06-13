<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>微商城-注册</title>
</head>
<body>
	<form action="{{url('do_register')}}" method="post">
		<table border="1" width="500">
			@csrf
			<p>
				用户名
				<input type="text" name="name">
			</p>
          <p>
          	密码
          	<input type="password" name="password">
          </p>
          <p>
          	确认密码
          	<input type="password" name="confirm_password">
          </p>
          <p>
          	 <input type="submit" value="注册">
          </p>

			
		</table>
	</form>

</body>
</html>

