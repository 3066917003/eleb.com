<?php

namespace App\Http\Controllers\Day4;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //用户注册
    public function create(){
        $user=new User();
        $user->name = 'zhangsan';
        $user->email ='zhangsan@qq.com';
        $user->password= bcrypt('123456');//密码加密
        $user->remember_token =str_random(50);//跟自动登录功能相关;随机字符串
        $user->save();

    }
    //用户首页
    public  function index(){

        //访问当前路由
        $route= \Illuminate\Support\Facades\Route::current();
        dump($route);
        $name =Route::currentRouteName();
        $action=Route::currentRouteAction();

        //获取已登录用户的信息
        $user=Auth::user();
        return view('session.index',['message'=>'你好！xxx欢迎登录','user'=>$user]);
    }




    //参数路由
    public function test($x,$y){
        return $x.$y;
    }
}
