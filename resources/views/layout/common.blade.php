<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{asset('layui/layui/css/layui.css')}}">
	</head>
	<body>
		@if(!empty(session('user_name')))
			{{Session::get('user_name')}}
		@else
			<a href="{{url('login')}}">登录</a>/<a href="{{url('register')}}">注册</a>
		@endif
		@section('body')
		@show
		<script type="text/javascript" src="{{asset('layui/layui/layui.js')}}"></script>
		@section('script')
		@show
	</body>
</html>