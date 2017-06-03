<h1>学生页面</h1>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
<a href="{{ url('admin/changemyinformation') }}">修改个人信息</a></br>
<a href="{{ url('admin/lookstudentinformation') }}">查看学生信息</a></br>
<a href="{{ url('admin/lookotherstable') }}">查看他人课表</a></br>
@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
@if (session('message'))
    <p><span style="color:red;">{{ session('message') }}</span></p>
@endif