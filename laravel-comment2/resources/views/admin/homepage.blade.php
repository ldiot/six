<h1>首页</h1>
<h1><a href="{{ url('admin/login') }}">登陆</a></h1>
<h1><a href="{{ url('admin/register') }}">注册</a></h1>
<br/>
@foreach($arrs as $arr)
    <hr>
    <h2><a href="{{ url('admin/content?id='.$arr["id"]) }}">{{ $arr['title'] }}</a></h2>
    <i>{{ $arr['username'] }}</i>
    @endforeach