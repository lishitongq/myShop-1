<!DOCTYPE html>
<html>
<head>
	<title>增加学生</title>
</head>
<body>
	<!-- @if ($errors->any())
        @foreach ($errors->all() as $error)
           {{ $error }} <br/>
        @endforeach
	@endif -->
	<form action="{{ url('do_update') }}" method="post" >
		<input type="hidden" name="id" value="{{$stu_info->id}}">
		@csrf
		姓名：<input type="text" name="name" value="{{$stu_info->name}}"><br/>
		年龄：<input type="text" name="age" value="{{$stu_info->age}}"><br/>
		性别： <input type="radio" name="sex" value="1" @if($stu_info->sex == 1) checked @endif> 男 <input type="radio" name="sex" value="2"  @if($stu_info->sex == 2) checked @endif> 女
		<br/>
		<input type="submit" value="提交">
	</form>
</body>
</html>