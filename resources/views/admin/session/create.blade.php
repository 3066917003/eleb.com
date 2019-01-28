@extends('layout.default')

@section('contents')
    @include('layout._errors')
<form method="post" action="{{route('login')}}">
    <h1>用户登录</h1>
    <div class="form-group">
        <label>账号</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label>密码</label>
        <input type="text" name="password" class="form-control" value="{{old('password')}}">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember" value="1" @if(old('remember')) checked="checked" @endif>记住我
        </label>
    </div>

    {{csrf_field()}}
    <button class="btn btn-primary btn-block">登录</button>
</form>

@stop