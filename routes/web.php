<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//欢迎界面路由
Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/','StudentController@add')->name('student.add');
Route::post('/student/save','StudentController@save');
//学生列表
Route::get('/student/list','StudentController@index')->name('student.index');

//定义三个路由  首页 关于 帮助

Route::get('/index','HomeController@index');
Route::get('about','HomeController@about');

//添加学生
Route::get('/student/add','StudentController@add')->name('student.add');
Route::post('/student/save','StudentController@save');
//学生列表
Route::get('/student/list','StudentController@index')->name('student.index');

//测试
Route::get('/test','BookController@test');
//添加用户
Route::get('/user/add','Day2\AdminController@add')->name('user.add');
//保存用户
Route::post('/user/save','Day2\AdminController@save')->name('user.save');
//测试弹出警告框
Route::get('/user/test','Day2\AdminController@test')->name('user.test');
//分页路由
Route::get('/user/list','Day2\AdminController@list')->name('user.list');
//修改用户
Route::get('/user/edit/{admin}','Day2\AdminController@edit')->name('user.edit');
//回显
Route::post('/user/update/{admin}','Day2\AdminController@update')->name('user.update');

//删除
Route::get('/user/delete/{admin}','Day2\AdminController@delete')->name('user.delete');
//数据表操作
route::get('/db','Day2\DbController@index');

//资源路由（文章）
Route::resource('articles','Day3\ArticleController');

//添加
Route::get('articles/create','Day3\ArticleController@create')->name('articles.create');
//保存
Route::post('articles','Day3\ArticleController@store')->name('articles.store');
//修改
Route::get('articles/{article}/edit','Day3\ArticleController@edit')->name('articles.edit');
//保存修改后的数据
Route::put('articles/{article}','Day3\ArticleController@update')->name('articles.update');
//获取所有文章
Route::get('articles','Day3\ArticleController@index')->name('articles.index');
//查看一篇文章
Route::get('articles/{article}','Day3\ArticleController@show')->name('articles.show');
//删除文章
Route::delete('articles/{article}','Day3\ArticleController@destroy')->name('articles.destroy');

//session
Route::get('session','Day3\Day3Controller@session');
//响应
Route::get('response','Day3\Day3Controller@response');*/




//路由也能响应
/*Route::get('response',function (){
    return 'hello world';
});*/

//注册用户
/*Route::get('user/register','Day4\UserController@create');
Route::get('user/index','Day4\UserController@index')->name('user.index');
//用户登录
Route::get('login','Day4\SessionController@create')->name('login');
Route::post('login','Day4\SessionController@store')->name('login');
//注销
Route::get('logout','Day4\SessionController@destroy')->name('logout');*/

//以上五个路由等价于下面优雅写法-------正好体现了laravel简洁优雅的特点


//Route::namespace('Day4')->group(function(){
////注册用户
//    /*Route::get('user/register','UserController@create');
//    Route::get('user/index','UserController@index')->name('user.index');*/
//    //上面两个user还可以优化为以下写法
//    Route::prefix('user')->group(function (){
//        Route::get('register','UserController@create');
//        Route::get('index','UserController@index')->name('user.index');
//
//    });
//
//    //用户登录
//    Route::get('login','SessionController@create')->name('login');
//    Route::post('login','SessionController@store')->name('login');
//    //注销
//    Route::get('logout','SessionController@destroy')->name('logout');
//});


//路由详解
/*Route::get('route',function(){
    return ['name'=>'张三'];
});*/
/*//put patch restful风格
Route::match(['put','patch'],'login','Day4\SessionController@create')->name('login');*/
/*Route::any('/',function(){
    return '首页';
});*/
//Route::redirect('admin/login','login',301);
//视图路由
//Route::view('/index','session.create');
/*Route::get('/index/{a}/{b}',function($x,$y){

});*/
//路由传参
//Route::get('/index/{a}/{b}','Day4\UserController@test');

/*Route::get('/index/{a}/{b?}',function($x,$y=null){
    return $x.$y;
});*/
//正则匹配验证传参
/*Route::get('/index/{a}/{b?}',function($x,$y=null){
    return $x.$y;
})->where('a','\d+');*/

//下面两个路由都需要登录认证
/*Route::middleware(['auth'])->group(function (){
    Route::resource('users','UsersController');
    Route::resource('book','BookController');
});*/


//资源路由（文章）
/*Route::get('/articles/{article}/edit',function (\App\Models\Article $article){
    dd($article->title);
});*/

//发邮件技术
/*
Route::get('/mail',function(){
    $name = 'vilin';
    $flag = \Illuminate\Support\Facades\Mail::send('mail',['name'=>$name],function($message){
        $to = '3066917003@qq.com';
        $message ->to($to)->subject('阿里云数据库10月周刊，Redis发布');
    });
    if($flag){
        echo '发送邮件成功，请查收！';
    }else{
        echo '发送邮件失败，请重试！';
    }
});*/


//redis
/*Route::get('/redis',function(){
    \Illuminate\Support\Facades\Redis::set('name','赵云');
    return \Illuminate\Support\Facades\Redis::get('name');
});*/


//项目

//管理员



Route::get('admins/login','Lianxi\AdminController@login')->name('admins.login');
Route::post('admins/login','Lianxi\AdminController@check')->name('admins.login');
Route::get('admins/logout','Lianxi\AdminController@logout')->name('admins.logout');
//添加资源路由
Route::resource('admins','Lianxi\AdminController');


/*Route::domain('www.eleb.com')->group(function (){
    //用户端接口开发
    Route::post('user/login','User\UserController@login');
    //商家列表
    Route::get('shop/list','User\ShopController@list');

});*/

//商品分类搜索
Route::domain('admin.eleb.com')->group(function(){
   Route::namespace('Admin')->group(function(){
      Route::get('shop_categories/category/{id}','ShopCategoryController@index');
      Route::resource('shop_categories','ShopCategoryController');
      Route::resource('shops','ShopController');

       Route::get('login','SessionController@login')->name('login');
       Route::get('logout','SessionController@logout')->name('logout');
       Route::get('register','SessionController@register')->name('register');

       //文件上传
       Route::post('upload','ShopCategoryController@upload')->name('upload');



   });
});

//商户端
Route::domain('www.eleb.com')->group(function (){
//最近一周订单量统计
    Route::get('order/week','Shop\TongJiController@order_week');
    //商户端最近一周订单商品销量统计
    Route::get('menu/week','Shop\TongJiController@menu_week');

    //Rbac权限
    Route::get('rbac','Admin\RbacController@index')->name('rbac');
    Route::get('rbac/test','Admin\RbacController@test')->name('rbac/test');
});

