<h1>学生管理系统</h1>
<a href="{{ url('admin/login') }}">登陆</a></br>
<a href="{{ url('admin/register') }}">注册</a>
<hr>
@foreach($datas as $data)
    <h3>{{ $data->title }}</h3>
    <p>{{ $data->username }}</p>
    <p>{{ $data->content }}</p>
    <hr>
@endforeach