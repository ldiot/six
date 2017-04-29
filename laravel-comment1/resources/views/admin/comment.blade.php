<html>
<head>
    <title>COMMENT</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
<center>
    <h1>COMMENT</h1>
    <form action="{{action('Admin\CommentController@doComment')}}" method="post" align="center">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        titile:<br><input type="text" name=title size="15"><br>
        comment:<br><input type="text" name=comment size=""><br>
        <input type="submit" value="Submit">
    </form>
</center>
<a href="{{url('admin/quit')}}">退出</a>
@if (session('message'))
    <p><span style="color:red;">{{ session('message') }}</span></p>
@endif
{{--@if (session('message'))--}}
    {{--<p><span style="color:red;">{{ session('message') }}</span></p>--}}
    {{--<script>alert("{{Session::has('message')}}");</script>--}}
{{--@endif--}}
</body>
</html>