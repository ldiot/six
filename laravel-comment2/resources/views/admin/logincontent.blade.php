<h1>详情页</h1>
{{--@if (isset($username))--}}
    {{--<h1>用户{{}}</h1>--}}
{{--@endif--}}
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
<form action="{{ action('Admin\MainController@comment') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $id }}">
    comment：<input type="text" name="content">
    <input type="submit" value="评论">
</form>
