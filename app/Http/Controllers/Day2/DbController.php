<?php

namespace App\Http\Controllers\Day2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
   public function index(){
       //原生sql操作
       //select
       //防止sql注入方法一：
      // $result=DB::select('select * from `students` where  name=? and id=?',['哈哈',1]);
       //提供了参数，防止sql注入方法二：
     // $result=DB::select('select * from `students` where name=:name and id=:id',['id'=>1,'name'=>'张飞']);
       //dd($result);
       //insert
       //DB::insert('insert into students (`name`,age) values (?,?)',['大乔',20]);
       //update
       //DB::update('update students set age=? where name=?',[13,'大乔']);

       //方法一：自动提交和回滚
//       DB::transaction(function (){
//          //小桥少一岁
//           DB::update('update students set age =age-1 where name=?',['小乔']);
//           //大乔多一岁
//           DB::update('update students set age=age+1 where name=?',['大乔']);
//       });
       //方法二：手动处理事物
//       DB::beginTransaction();//开始事物
//       try{
//           DB::update('update students set age=age-1 where name=?',['小乔']);
//           DB::update('update students set age=age+1 where name=?',['大乔']);
//
//           DB::commit();//提交事务
//       }catch(\Exception $e){
//           DB::rollback();
//           //捕捉到异常事务回滚
//       }

       //查询生成器
       //1.获取表中所有数据
       //$result= DB::table('students')->get();
       //2.获取一条数据
      // $result =DB::table('students')->where('id',1)->first();
       //$result=DB::table('students')->where('id',1)->value('name');
       //3.获取一列值
       //$result=DB::table('students')->pluck('name');//获取到所有name的值
       //4.聚合
       //$result=DB::table('students')->count();
       //$result=DB::table('students')->max('age');
       //$result=DB::table('students')->min('age');
       //$result=DB::table('students')->avg('age');
       //$result=DB::table('students')->select('name as realname','age' )->get();
       // $result=DB::table('students')->select('name','age')->where('age','>',16)->groupBy()->orderBy()->get();
       //$sql="select name,age from xxx group by xxx order by xxx where age > 16";
       //dd($result);


   }



}
