<h1>修改信息页</h1>
<a href="{{ url('admin/announce') }}">发布公告</a>
<table border="1">
    <thead>
    <tr>
        <td>姓名</td>
        <td>民族</td>
        <td>年龄</td>
        <td>性别</td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <thead/>
    @foreach($datas as $data)
    <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->nation }}</td>
        <td>{{ $data->age }}</td>
        <td>{{ $data->sex }}</td>
        <td><a href="{{ url('admin/'.$data->id.'/changeinformation') }}">修改信息</a></td>
        <td><a  href="{{ url('admin/'.$data->id.'/deleteinformation') }}">删除信息</a></td>
        <td><a href="{{ url('admin/'.$data->id.'/letoutinformation') }}">导出信息</a></td>
    </tr>
    @endforeach
</table>
<h3>所有公告：</h3>
@foreach($datas2 as $data2)
    <h3>{{ $data2->title }}</h3>
    <p>{{ $data2->content }}</p>
@endforeach