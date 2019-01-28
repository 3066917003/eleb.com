<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');//主键
            $table->integer('user_id');//用户ID
            $table->integer('shop_id');//	商家ID
            $table->string('sn',100);//	订单编号
            $table->string('province',50);//	省
            $table->string('city',50);//	市
            $table->string('county',50);//	县
            $table->string('address',100);//	详细地址
            $table->string('tel',11);//	收货人电话
            $table->string('name',50);//		收货人姓名
            $table->decimal('total');//	价格
            $table->integer('status');//	状态(-1:已取消,0:待支付,1:待发货,2:待确认,3:完成)
            $table->string('out_trade_no');//	第三方交易号（微信支付需要）
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
        Schema::dropIfExists('orders');
    }
}
