@extends('layout.common')

@section('body')
	
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form   action="" method="post" >
							<input type="text"  name="user_name" >
							<input type="password" name="password" >
						<!-- <a href=""><h6>Forgot Password ?</h6></a> -->
						<button type="button" class="btn_sub btn button-default">登录</button>
						<!-- <input class="btn button-default"  type="submit"  value="登录"> -->
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	
@endsection

@section('script')
<script type="text/javascript">

	$(function(){
		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

		$(".btn_sub").click(function(){
			var user_name = $("input[name=user_name]").val();
			var password = $("input[name=password]").val();
			$.ajax({
	            type: "post",
	            url: "{{url('/do_login')}}",
	            data: {user_name:user_name,password:password},
	            dataType: "json",
	            success: function(data){
	               if(data.errno == 200){
	               	window.location.href = "{{url('/')}}" ;
	               }else{
	               	alert(data.msg);
	               }        
	            }
         	});
		});
	});
</script>

@endsection