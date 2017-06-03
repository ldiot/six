<h1>发布公告</h1>
<h3>标题</h3>
<form method="post" action="{{ action('Admin\TeacherController@doAnnounce') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" required="required" name="title"><br>
    <h3>内容</h3>
    <input type="text" required="required" name="content"><br>
    <input type="submit" value="发布">
</form>

@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif
