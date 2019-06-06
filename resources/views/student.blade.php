<!DOCTYPE html>
<html>
<head>
	<title>学生</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>学生姓名</td>
			<td>年龄</td>
			<td>性别</td>
			<td>班级</td>
			<td>新增信息</td>
		</tr>
		@foreach($student as $item)
		<tr>
			<td>{{ $item->name }}</td>
			<td>{{ $item->age }}</td>
			<td>@if($item->sex == 1)男@else女@endif</td>	
			<td>{{ $item->class }}</td>
		</tr>
		@endforeach
	</table>

	{{ $student->links() }}
</body>
</html>
