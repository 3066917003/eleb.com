@extends('layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>图片封面</th>
            <th>作者</th>
            <th>内容</th>
            <th>发布日期</th>
            <th>操作</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{$article->id }}</td>
                <td>{{$article->title}}</td>
                <td>@if($article->cover)<img class="img-circle" src="{{\Illuminate\Support\Facades\Storage::url($article->cover)}}"/>@endif</td>
                <td>{{$article->author->username}}({{$article->author->email}})</td>
                <td>{{$article->content}}</td>
                <td>{{$article->publish_date}}</td>
                <td><a href="{{route('articles.edit',[$article])}}" class="btn btn-warning btn-xs">修改</a>
                    <form method="post" action="{{route('articles.destroy',[$article])}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger btn-xs">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$articles->links()}}
@endsection