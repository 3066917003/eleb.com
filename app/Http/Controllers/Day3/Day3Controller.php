<?php

namespace App\Http\Controllers\Day3;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Day3Controller extends Controller
{
    //session的操作
    public function session(Request $request){
        //获取session实例，两种方法
//        $request->session();
//        session();
        //操作session
//        $request->session()->put('name','张三');
        session(['age'=>'20']);
        //获取
        //$name=session('name');
        //$name=session('name');
       // $name=session()->get('name');
        //dd($name);
       /* $age=session()->get('age2',function (){
            return 10;
        });*/
        session()->forget('age');
        $age=session()->get('age');

        dd($age);
    }

    public function response(){
       // return 'hello';
        //return ['a'=>1,'b','c'];
        //$admin =Admin::find(3);
        //$admin=Admin::all();
       //return $admin;
        //数组或对象转json字符串
        //json_encode();
        //json字符串转数组或对象
        //json_decode();


        //coookie
        return response('hello')->cookie('sex','nan','10');
    }

}
