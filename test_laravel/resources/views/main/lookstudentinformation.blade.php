<h1>查看学生信息页</h1>
<form action="{{action('Admin\MainController@info')}}" method="get" align="center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    班级号：<input type=text name=number2 value="" size="15">
    <input type="submit" value="submit">
</form>