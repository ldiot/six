<h1>注册页</h1>
<form action="{{ action('Admin\MainController@register') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    账号：<input type="text" name="username"><br>
    密码：<input type="password" name="password"><br>
    确认密码：<input type="password" name="confirmpass"><br>
    <input type="submit"><br>
</form>
@if (session('message'))
    <p><span style="color:red">{{ session('message') }}</span></p>
    @endif