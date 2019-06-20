@extends('layout.common')

@section('title','微商城-后台')

@section('body')
	
	<table border="1">
		<tr>
			<td>商品名称</td>
			<td>图片</td>
			<td>操作</td>
		</tr>
		@foreach($goods_list as $item)
		<tr>
			<td>{{$item->goods_name}}</td>
			<td><img src="{{$item->goods_pic}}" width="200"></td>
			<td><a href="">修改</a>|<a href="">删除</a></td>
		</tr>
		@endforeach
	</table>

		{{$goods_list->links()}}

	

@endsection