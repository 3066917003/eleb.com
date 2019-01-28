<?php

namespace App\Models;


use App\User;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User
{
    //Rbac 角色权限控制
    use HasRoles;
    protected $guarded='web';

    use Notifiable;


    protected $fillable=['username','password','email','sex'];
}
