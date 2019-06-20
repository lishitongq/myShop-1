<!DOCTYPE html>
<html>
<head>
	<title>微商城-添加商品</title>
</head>
<body>
	<h1>添加商品</h1>
	<form action="{{url('do_add_goods')}}" method="post" enctype="multipart/form-data">

		@csrf

		商品名称：<input type="text" name="goods_name"><br/>

		<br/>
		<input type="file" name="goods_source" ><br/>
		<br/>
		商品价格：<input type="text" name="price"><br/>

		<br/>

		<input type="submit" name="" value="提交">
		
	</form>
</body>
</html>
