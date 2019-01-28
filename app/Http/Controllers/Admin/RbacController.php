<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RbacController extends Controller
{
    //Rbac角色权限
    //权限管理（权限增删改查）添加、修改、删除 查看用户、商家审核
    //角色管理（角色增删改查）添加角色时需要给角色赋予权限
    //调整账户管理（添加和修改） 添加和修改账户，需要给用户赋予角色
    public function index(){
        //权限
        //添加权限
       // $permission=Permission::create(['name'=>'edit articles']);//创建edit articles权限
        //建议：权限名称和路由名称一致      //权限叫users.add    路由users.add
        //添加角色
       // $role=Role::create(['name'=>'writer']);

        //给角色赋予权限
        //给角色添加一个权限
      //$role=givePermissionTo($permission);
        //$permission->assignRole($role);

        //给角色添加多个权限
        //$role->syncPermissions($permissions);
        //$permission->syncRoles($roles);

        //添加两个权限  添加商家 查看商家
       // Permission::create(['name'=>'小猪猪']);
        //Permission::create(['name'=>'小屁猪']);

        //添加一个角色 管理员
        $role=Role::create(['name'=>'管理员']);
        $permission1=Permission::where('name','添加商家')->first();
        $permission2=Permission::where('name','查看商家')->first();

        $permissions=[$permission1,$permission2];
        $role->syncPermissions($permissions);

        echo '操作成功';


    }
 //查看商家
    public function test(){
       // $role=Role::findById(1);
        //$role->givePermissionTo(2);
        if (!Auth::user()->can('删除商家')){
            return '没有权限';
        }

        //给用户admin添加管理员角色
        //$admin=Admin::find(1);
        //$admin->assignRole('管理员');

        //登录
       //Auth::login($admin);
        $user=Auth::user();
       // dd($user);
       // dd($user->hasRole('zhangsan'));
        //dd($user->can('123'));
        //echo '操作完成';

        return view('test');
    }
}
