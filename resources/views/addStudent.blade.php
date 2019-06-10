<!DOCTYPE html>
<html>
<head>
	<title>学生增删改查</title>
</head>
<body>
	<form action="{{url('add_student')}}" method="get">
		姓名：<input type="text" name="find_name" value="{{$find_name}}">
		<input type="submit" value="搜索">
	</form>
	<table border="1">
		<tr>
			<td>姓名</td>
			<td>年龄</td>
			<td>
				操作
			</td>
		</tr>
		@foreach($student_info as $item)
		<tr>
			<td>{{$item->name}}</td>
			<td>{{$item->age}}</td>
			<td>
				<a href="{{url('/update_student')}}?id={{$item->id}}">修改</a> | 
				<a href="{{url('/del')}}?id={{$item->id}}">删除</a>
			</td>
		</tr>
		@endforeach

	</table>

	{{ $student_info->appends(['find_name' => $find_name])->links() }}
</body>
</html>