<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');//主键
            $table->integer('order_id');//用户ID
            $table->integer('goods_id');//	商家ID
            $table->integer('amount');//商品数量
            $table->string('goods_name',100);//	商品名称
            $table->string('goods_img',100);//	商品图片
            $table->decimal('goods_price');//商品价格
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
