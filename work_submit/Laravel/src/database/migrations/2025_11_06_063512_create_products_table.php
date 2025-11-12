<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('description',255)->nullable();
            $table->string('category',255);
            $table->bigInteger('price')->unsigned();
            $table->bigInteger('stock_quantity')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    // 1	id	ID	bigint unsigned(20)
    // 2	name	氏名	varchar(255)
    // 3	description	説明	varchar(255)
    // 4	category	カテゴリー	varchar(255)
    // 5	price	価格	bigint unsigned
    // 6	stock_quantity	在庫量	bigint unsigned
    // 7	created_at	作成日時	timestamp
    // 8	updated_at	更新日時	timestamp
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
