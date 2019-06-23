@extends('layout.common')
@section('body')
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>购物车</h3>
			</div>
			<div class="content">
				@foreach($cart_info as $item)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>商品图</h5>
						</div>
						<div class="col s7">
							<img src="{{asset($item->goods_pic)}}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品名称</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$item->goods_name}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>数量</h5>
						</div>
						<div class="col s7">
							<input value="1" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>价钱</h5>
						</div>
						<div class="col s7">
							<h5>${{$item->goods_price}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>操作</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>

				<div class="divider"></div>
				@endforeach

			</div>
			<div class="total">
				<div class="row">
					<div class="col s7">
						<h6>总金额</h6>
					</div>
					<div class="col s5">
						<h6>${{$total}}</h6>
					</div>
				</div>
			</div>
			<a href="{{url('confirm_pay')}}" class="btn button-default">去结算</a>
		</div>
	</div>
	<!-- end cart -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	@endsection
