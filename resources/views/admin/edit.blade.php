<form  method="post" action="{{route('admins.update',[$admin])}}" >
    用户名: <input type="text" name="username" value="{{$admin->username}}"> <br>
    密码： <input type="text" name="password" value="{{$admin->password}}"> <br>
    邮箱： <input type="text" name="email" value="{{$admin->email}}"> <br>
    性别： <input type="radio" name="sex" value="1" @if($admin->sex==1) checked @endif>男
    <input type="radio" name="sex" value="2" @if($admin->sex==2) checked @endif>女 <br>
    {{csrf_field()}}
    {{method_field('PUT')}}

    <button>提交</button>

</form>