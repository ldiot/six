<html>
<head>
    <meta charset="UTF-8">
    <title>登陆</title>
</head>
<body>
<h1>登陆</h1>
<form method="post" action="{{ action('Admin\LoginController@home') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="text"  value="{{ old('username') }}" required="required" placeholder="用户名"  name="username">

    <input type="password" required="required" placeholder="密码" name="password">
    <input type="submit" value="登陆">
</form>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
    @endif
@if (session('message'))
    <p><span style="color:red;">{{ session('message') }}</span></p>
@endif
</body>
</html>