<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('total_price')->unsigned();
            $table->integer('status');
            $table->timestamps();
        });
    }
    // 1	id	ID	bigint unsigned(20)
    // 2	user_id 	ユーザーID	bigint unsigned(20)
    // 3	total_price	Totalの価格	bigint unsigned
    // 4	status 	ステータス	int
    // 5	created_at	作成日時	timestamp
    // 6	updated_at	更新日時	timestamp

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
