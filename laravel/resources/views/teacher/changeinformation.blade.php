<h1>修改信息页</h1>
<form method="post" action="{{ action('Admin\TeacherController@dochangeInformation') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $data[0]->id }}">
    姓名：<input type="text"  value="{{ $data[0]->name }}" required="required"  name="name"><br>
    国籍：<input type="text"  value="{{ $data[0]->nation }}" required="required"  name="nation"><br>
    年龄：<input type="text"  value="{{ $data[0]->age }}" required="required"  name="age"><br>
    性别：<input type="text"  value="{{ $data[0]->sex }}" required="required"  name="sex"><br>
    <input type="submit" value="保存修改">
    {{--<a href="{{ url('admin/dochangeInformation') }}">保存修改</a>--}}
</form>