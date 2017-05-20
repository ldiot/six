<h1>详情页</h1>
<h1><a href="{{ url('admin/login') }}">登陆</a></h1>
<h1><a href="{{ url('admin/register') }}">注册</a></h1>
@foreach($questions as $question)
    <hr>
    <h2>{{ $question->title }}</h2>
    @foreach($userasks as $userask)
        <i>{{ $userask->username }}</i>
    @endforeach
    <p>{{ $question->content }}</p>
    <hr>
    @for ($i=0; $i<count($arrays); $i++)
        <i>{{ $arrays[$i]['useranswer'] }}</i>
        <p>{{ $arrays[$i]['answer'] }}</p>
        <hr>
    @endfor
@endforeach
<form action="{{ action('Admin\MainController@login') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $id }}">
    comment：<input type="text" name="content">
    <input type="submit" value="评论">
</form>


