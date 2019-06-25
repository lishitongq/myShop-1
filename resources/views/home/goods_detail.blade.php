@extends('layout.common')
@section('body')
	<!-- shop single -->
	<div class="pages section">
		<div class="container">
			<div class="shop-single">
				<img src="{{asset($goods_info['goods_pic'])}}" alt="">
				<h5>{{$goods_info['goods_name']}}</h5>
				<div class="price">${{$goods_info['goods_price']}}</div>
				<p>商品描述 商品描述 商品描述 商品描述</p>
				@if($in_cart == 1)
				<button type="button" class="btn button-default" disabled>已加入购物车</button>
				@else
				<button type="button" class="addCart btn button-default" goods-id={{$goods_info['id']}}>加入购物车</button>
				@endif
			</div>
			
		</div>
	</div>
	<!-- end shop single -->

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

		      $(".addCart").click(function(){
		        var goods_id = $(this).attr('goods-id');
		        $.ajax({
		            type: "post",
		            url: "{{url('/add_cart')}}",
		            data: {goods_id:goods_id},
		            dataType: "json",
		            success: function(data){
		            	if(data.errno == 4013){
		            		window.location.href = "{{url('/login')}}";
		            	}
		            	if(data.errno == 200){
		                 window.location.href = "{{url('my_cart')}}";    
		            	}else{
		            		alert(data.msg);
		            	}
		            }
		         });
		      });
		});
	</script>
	@endsection