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

  剩余时间:<span id="times"></span>

  

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

      var o = document.getElementById("times");//获取ID
        getTime();//调用函数
        function getTime() {
            //获取一个截止时间  2018/7/13 12:00
            var endDate = new Date("{{$time_now}}");

            endDate = endDate.getTime();//1970-截止时间  从1970年到截止时间有多少毫秒
 
            //获取一个现在的时间
            var nowdate = new Date;
            nowdate = nowdate.getTime(); //现在时间-截止时间  从现在到截止时间有多少毫秒
 
            //获取时间差 把毫秒转换为秒
            var diff = parseInt((endDate - nowdate) / 1000);
 
            h = parseInt(diff / 3600);//获取还有小时
            m = parseInt(diff / 60 % 60);//获取还有分钟
            s = diff % 60;//获取多少秒数
 
            //将时分秒转化为双位数
            h = setNum(h);
            m = setNum(m);
            s = setNum(s);
 
            //输出时分秒
            o.innerHTML = m + "分" + s + "秒";
            setTimeout(getTime, 1000);
 
        }
        //设置函数 把小于10的数字转换为两位数
        function setNum(num) {
            if (num < 10) {
                num = "0" + num;
            }
            return num;
        }
  });
  </script>
  @endsection
  