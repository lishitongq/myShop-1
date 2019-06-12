<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户注册</title>
</head>
<body>
	<form action="{{url('admin_doadd')}}" method="post">
		<table border="1" width="500">
			@csrf
			<p>
				用户名
				<input type="text" name="u_name">
			</p>
          <p>
          	密码
          	<input type="text" name="u_pwd">
          </p>
          <p>
          	确认密码
          	<input type="text" name="u_repwd">
          </p>
          <p>
          	 <input type="submit" value="注册">
          </p>

			
		</table>
	</form>

</body>
</html>

