<title>LOGIN IN</title>
<center>
    <h1>LOGIN IN</h1>
</center>
<form action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    账号：<input type="text" name="username" /><br>
    密码：<input type="password" name="password" /><br>
     <input type="submit" value="登陆" /><br>
</form>
@if (session('message'))
    <p><span style="color:red;">{{ session('message') }}</span></p>
    @endif