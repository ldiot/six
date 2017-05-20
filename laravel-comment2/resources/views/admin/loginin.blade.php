<h1>首页</h1>
@if (isset($username))
    <h1>用户{{ $username }}</h1>
    <p><span style="color:red">{{ $username }}登陆成功</span></p>
@endif
<br/>
@foreach($arrs as $arr)
    <hr>
    <h2><a href="{{ url('admin/logincontent?id='.$arr["id"]) }}">{{ $arr['title'] }}</a></h2>
    <i>{{ $arr['username'] }}</i>
@endforeach


