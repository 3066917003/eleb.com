<?php

namespace App\Http\Controllers\lianxi;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function create(){
        return view('admin.create');

    }

    public function store(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'email'=>'required',
            'sex'=>'required',

        ],['username.required'=>'用户名不能为空',

        ]);
        //验证通过保存数据到数据表
        Admin::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'sex'=>$request->sex,
        ]);

        return redirect()->route('admins.index')->with('success','添加成功');
    }

    public function index(){
        $admins=Admin::paginate(10);
        return view('admin.index',compact('admins'));
    }

    //修改
    //edit();显示修改表单 ；回显要修改的数据
    //update（）；验证并更新数据
    public function edit(Admin $admin){//参数名称和路由中的名称一致

        return view('admin.edit',compact('admin'));
    }

    public function update(Admin $admin,Request $request){
        $this->validate($request,[
            'username'=>'required',
            'email'=>'required',
            'sex'=>'required',
        ],[
            'username'=>'用户名不能为空',
        ]);
        //验证通过，更新数据到数据表中
        $admin->update([
            'username'=>$request->username,
            'email'=>$request->email,
            'sex'=>$request->sex,

        ]);
        //提示信息加跳转
        return redirect()->route('admins.index')->with('success','修改成功');
    }
//删除
    public function destroy(Admin $admin){
        $admin->delete();
        return 'success';
    }

    //登录
    public function login(){
        return view('admin.login');
    }

    public  function check(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ],[
            'username'=>'用户名不能为空',
        ]);
        //验证登录信息，并保存用户状态
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            //认证通过，登陆成功
            return redirect()->intended(route('admins.index'));
        }else{
            //认证失败
            return back()->withInput();
        }
    }

    //注销登录
    public function logout(){
        $admins=Auth::logout();
        return redirect()->route('admins.login',compact('admins'));
    }


}
