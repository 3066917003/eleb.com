<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable=['title','content','author_id','publish_date','cover'];

    //获取该文章的作者  一对多（反向）
    public function author(){
       // return $this->belongsTo('App\Models\Admin');
        return $this->belongsTo(Admin::class);
    }
}