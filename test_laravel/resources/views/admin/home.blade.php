<h1>管理员页面</h1>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
<a href="{{ url('admin/teacher') }}">教师页入口</a></br>
<a href="{{ url('admin/student') }}">学生页入口</a></br>
<a href="{{ url('admin/look') }}">日志查看</a><br>
<a href="{{ url('admin/ueditor') }}">ueditor</a>






