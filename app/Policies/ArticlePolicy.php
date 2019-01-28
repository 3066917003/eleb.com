<?php

namespace App\Policies;

use App\Models\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //修改文章时的权限认证
    //$user 当前用户的实例
    //$article 要修改的文章实例
    public function update(User $user,Article $article){
        return $user->id==$article->author_id;
    }
}
