<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained() // usersテーブルへの外部キー制約
                  ->onDelete('cascade');// ユーザーが削除されたら、お気に入り情報も削除
            $table->foreignId('product_id')
                  ->constrained() // productsテーブルへの外部キー制約
                  ->onDelete('cascade'); // 商品が削除されたら、お気に入り情報も削除
            $table->unique(['user_id', 'product_id']);
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
        Schema::dropIfExists('favorites');
    }
}
