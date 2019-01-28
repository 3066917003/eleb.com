<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function test(){
   //方法一：  Book::create(['name'=>'红楼梦']);


//      方法二： $book= new Book();
//       $book->name = '水壶';
//       $book->save();
//       return '操作成功';
        //获取所有图书
       // Book::all();
        //获取一本图书
       // $book=Book::find(2);
        //$book =Book::where('name','水壶')->first();
       // dd($book);
       // var_dump($book->name);
       // dump($book);
       // dd($book);  =dump() &die();
        //修改图书
        //首先找到这本图书  修改名称  放回去
//    修改方法一：    $book =Book::where('name','水壶')->first();
//        $book->name = '我是你爸爸';
//        $book->save();
        //修改方法二：
        //先获取  再修改
        $book=Book::find(2);
        $book->update(['name'=>'小猪猪']);

    }
}
