<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
        });
    }
    // 1	id	ID	bigint unsigned(20)
    // 2	order_id 	オーダーID	bigint unsigned(20)
    // 3	product_id 	商品ID	bigint unsigned
    // 4	quantity	個数	int
    // 5	price	価格	int
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
