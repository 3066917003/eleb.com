<form  method="post" action="{{route('admins.store')}}" >
    用户名: <input type="text" name="username" value="{{old('username')}}"> <br>
    密码： <input type="text" name="password" value="{{old('password')}}"> <br>
    邮箱： <input type="text" name="email" value="{{old('email')}}"> <br>
    性别： <input type="radio" name="sex" value="1" @if(old('sex')==1) checked @endif>男
    <input type="radio" name="sex" value="2" @if(old('sex')==2) checked @endif>女 <br>
    {{csrf_field()}}
    <button>提交</button>

</form>