<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //
    public function index(Request $request){
        //$shop_categories= ShopCategory::paginate(2);
        //$shop_categories= ShopCategory::where('name','like','%张飞%')->paginate(2);
        $shop_categories= ShopCategory::where('name','like',"%{$request->name}%")->paginate(2);

        return view('admin.shop_category.index',compact($shop_categories));
    }

    public function create(){
        return view('admin.shop_category.create');
    }
}
