@extends('layout.default')
@section('contents')
    <h1>修改文章</h1>
    {{--警告框--}}
    @include('layout._errors')

    <form  method="post" action="{{route('articles.update',[$article])}}">
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label>作者</label>
            <select name="author_id" class="form-control">
              @foreach($admins as $admin)
                    <option value="{{$admin->id}}"
                    @if($article->author_id==$admin->id)
                        selected="selected"
                    @endif
                    >{{$admin->username}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>内容</label>
            <textarea name="content" class="form-control" cols="3" >{{$article->content}}</textarea>
        </div>
        <div class="form-group">
            <label>发布日期</label>
            <input type="date" name="publish_date" class="form-control" value="{{$article->publish_date}}">
        </div>
        {{csrf_field()}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        {{method_field('PUT')}}
        <button class="btn btn-primary btn-block">提交</button>
    </form>

@stop
