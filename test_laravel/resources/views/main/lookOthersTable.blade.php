<h1>查看他人课表页</h1>
<form action="{{action('Admin\MainController@timetable')}}" method="get" align="center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    学号：<input type=text name="number1" value="" size="15">
    <input type="submit" value="submit">
</form>

@if (isset($message))
    <p><span style="color:red;">{{ $message }}</span></p>
@endif