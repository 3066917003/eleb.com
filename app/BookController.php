<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookController extends Model
{
    //声明表名
    protected $table='books';
    protected $fillable=['name'];
}
