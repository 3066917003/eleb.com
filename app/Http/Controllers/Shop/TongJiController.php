<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class TongJiController extends Controller
{
    //最近一周每日订单量统计
    public function order_week(){
        $shop_id=1;//Auth::user()->shop_id;
        $time_start=date('Y-m-d 00:00:00',strtotime('-7 day'));
        $time_end= date('Y-m-d 23:59:59');

        $sql=
            "SELECT
	DATE(created_at) AS date,
	COUNT(*) AS total
FROM
	orders
WHERE
	created_at >= '{$time_start}'
AND created_at <= '{$time_end}'
AND shop_id ={$shop_id}
GROUP BY
	DATE(created_at)";

        $rows=DB::select($sql);
       /* $rows=[
            'date'=>'','total'=>'',[]
        ];*/
       //构造7天统计格式
        $result=[];
        for ($i=0;$i<7;$i++){
            $result[date('Y-m-d',strtotime("-{$i} day"))] =0;
            //处理日期过长
            //$result[date('m-d',strtotime("-{$i} day"))] =0;
        }
        /*dd($result);
        die;*/
        foreach ($rows as $row){
            $result[$row->date] = $row->total;
            //处理日期过长
           // $row->date 2018-11-02 ===>11-02
           // $result[substr($row->date,5,5)] = $row->total;

        }

        //dd($result);
        return view('shop.order_week',compact('result'));

    }

    //商户端最近一周商品销量统计
    public function menu_week(){
        $shop_id=1;//Auth::user()->shop_id;
        $time_start=date('Y-m-d 00:00:00',strtotime('-7 day'));
        $time_end= date('Y-m-d 23:59:59');

        $sql=
            "SELECT
	DATE(orders.created_at) AS date,
	order_details.goods_id,
	SUM(order_details.amount) AS total
FROM
	order_details
JOIN orders ON order_details.order_id = orders.id
WHERE
	orders.created_at >= '2018-11-02'
AND orders.created_at <= '2018-11-07'
AND shop_id = 1
GROUP BY
	DATE(orders.created_at),
	order_details.goods_id";

        $rows=DB::select($sql);
        /* $rows=[
             'date'=>'','total'=>'',[]
         ];*/
        //构造7天统计格式
        $result=[];
        //获取当前商家的菜品列表
        $menus=Menu::where('shop_id',$shop_id)->select(['id','goods_name'])->get();
        $keyd=$menus->mapWithKeys(function ($item){
            return [$item['id']=>$item['goods_name']];
        });
        $keyd2=$menus->mapWithKeys(function ($item){
            return [$item['id']=>0];
        });
        $menus=$keyd->all();
        //dd($menus);
        $week=[];
        for ($i=0;$i<7;$i++){
            $week[]=date('Y-m-d',strtotime("-{$i} day"));

        }
        foreach ($menus as $id=>$name){
            foreach ($week as $day){
                $result[$id][$day]=0;
            }
        }
        /*for ($i=0;$i<7;$i++){
            $result[date('Y-m-d',strtotime("-{$i} day"))] =$keyd2->all();

        }*/
        /*dd($result);
        die;*/
        foreach ($rows as $row){
            $result[$row->goods_id][$row->date] = $row->total;
            //处理日期过长
            // $row->date 2018-11-02 ===>11-02
            // $result[substr($row->date,5,5)] = $row->total;

        }

       // dd($result);
        $series=[];
        foreach($result as $id=>$data){
            $series=[
                'name'=>$menus[$id],
                'type'=>'line',
                'stack'=>'销量',
                'data'=>array_values($data)
            ];
        }

        return view('shop.menu_week',compact('result','menus','week','series'));

    }
}
