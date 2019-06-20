@extends('layout.common')

@section('title','微商城-首页')

@section('body')
  

	<h1>{{ $str }}</h1>

	<table border="1">
		<tr>
			<td>name</td>
		</tr>
	</table>

@endsection

@section('script')

<script type="text/javascript">
	
	layui.use(['util', 'laydate', 'layer'], function(){
  var util = layui.util
  ,laydate = layui.laydate
  ,layer = layui.layer;
  
  //倒计时
  var thisTimer, setCountdown = function(y, M, d, H, m, s){
    var endTime = new Date(y, M||0, d||1, H||0, m||0, s||0) //结束日期
    ,serverTime = new Date(); //假设为当前服务器时间，这里采用的是本地时间，实际使用一般是取服务端的
     
    clearTimeout(thisTimer);
    util.countdown(endTime, serverTime, function(date, serverTime, timer){
      var str = date[0] + '天' + date[1] + '时' +  date[2] + '分' + date[3] + '秒';
      lay('#test2').html(str);
      thisTimer = timer;
    });
  };
  setCountdown(2020,1,1);
  
  laydate.render({
    elem: '#test1'
    ,type: 'datetime'
    ,done: function(value, date){
      setCountdown(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
    }
  });
  
  
});

</script>

@endsection
