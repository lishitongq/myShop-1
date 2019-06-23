@extends('layout.common')
  @section('body')
  <style type="text/css">
    ul li {
    list-style-type: none;
}
a {
    text-decoration: none;
    
}
.page-item{
      display: inline-block;
    font-size: 1.2rem;
    padding: 0 10px;
    line-height: 20px;
}

  </style>
  <!-- slider -->
  <div class="slider">
    
    <ul class="slides">
      <li>
        <img src="{{asset('shop/img/slide1.jpg')}}" alt="">
        <div class="caption slider-content  center-align">
          <h2>WELCOME TO MSTORE</h2>
          <h4>Lorem ipsum dolor sit amet.</h4>
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
      <li>
        <img src="{{asset('shop/img/slide2.jpg')}}" alt="">
        <div class="caption slider-content center-align">
          <h2>JACKETS BUSINESS</h2>
          <h4>Lorem ipsum dolor sit amet.</h4>
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
      <li>
        <img src="{{asset('shop/img/slide3.jpg')}}" alt="">
        <div class="caption slider-content center-align">
          <h2>FASHION SHOP</h2>
          <h4>Lorem ipsum dolor sit amet.</h4>
          <a href="" class="btn button-default">SHOP NOW</a>
        </div>
      </li>
    </ul>

  </div>
  <!-- end slider -->

  

  <!-- quote -->
  
  <!-- end quote -->

  <!-- product -->
  <div class="section product">
    <div class="container">
      <div class="section-head">
        <h4>最新商品</h4>
        <div class="divider-top"></div>
        <div class="divider-bottom"></div>
      </div>
      @foreach($new_goods as $item)
      <div class="row margin-bottom">
        @foreach($item as $v)
        <div class="col s6">
          <div class="content">
            <img src="{{asset($v['goods_pic'])}}" alt="">
            <h6><a href="{{url('goods_detail')}}?goods_id={{$v['id']}}">{{$v['goods_name']}}</a></h6>
            <div class="price">
              ${{$v['goods_price']}} 
            </div>
            
            
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
  <!-- end product -->

  <!-- promo -->
  
  <!-- end promo -->

  <!-- product -->
  <div class="section product">
    <div class="container">
      <div class="section-head">
        <h4>所有商品</h4>
        <div class="divider-top"></div>
        <div class="divider-bottom"></div>
      </div>
      @foreach($goods as $item)
      <div class="row">
        @foreach($item as $v)
        <div class="col s6">
          <div class="content">
            <img src="{{asset($v['goods_pic'])}}" alt="">
            <h6><a href="{{url('goods_detail')}}?goods_id={{$v['id']}}">{{$v['goods_name']}}</a></h6>
            <div class="price">
              ${{$v['goods_price']}}
            </div>
            <!-- <button class="addCart btn button-default" goods-id="{{$v['id']}}">加入购物车</button> -->
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
      
      <div class="pagination-product">
        {{ $info->onEachSide(5)->links() }}
        <!-- <ul>
          <li class="active">1</li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">4</a></li>
          <li><a href="">5</a></li>
        </ul> -->
      </div>
    </div>
  </div>
  <!-- end product -->
  
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
                 alert(data.msg);      
            }
         });

      });
  });
  </script>
  @endsection
  