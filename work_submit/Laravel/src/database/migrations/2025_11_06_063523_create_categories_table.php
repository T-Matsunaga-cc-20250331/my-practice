<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });
    }
    // 1	id	ID	bigint unsigned(20)
    // 2	name	カテゴリ名	varchar(255)
    // 3	created_at	作成日時	timestamp
    // 4	updated_at	更新日時	timestamp
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
