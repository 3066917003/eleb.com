<form  method="post" action="{{route('admins.login')}}" >
    用户名: <input type="text" name="username" value="{{old('username')}}"> <br>
    密码： <input type="text" name="password" value="{{old('password')}}"> <br>
    {{csrf_field()}}
    11111<button>登录</button>

</form>