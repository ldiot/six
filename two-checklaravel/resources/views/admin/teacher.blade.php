<h1>教师页面</h1>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
<a href="{{ url('admin/information') }}">学生信息</a></br>
<a href="{{ url('admin/announce') }}">发布公告</a></br>
