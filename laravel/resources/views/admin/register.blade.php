<html>
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<h1>注册</h1>
<form method="post" action="{{ action('Admin\LoginController@login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" required="required" value="{{ old('email') }}" placeholder="邮箱" name="email">
    <input type="text" required="required" value="{{ old('username') }}" placeholder="用户名" name="username">
    <input type="password" required="required" value="{{ old('password') }}" placeholder="密码" name="password">
    <input type="submit" value="注册">
</form>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
@if (session('message'))
    <p><span style="color:red;">{{ session('message') }}</span></p>
@endif
</body>
</html>