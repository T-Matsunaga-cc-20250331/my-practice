<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('password_bash',255);
            $table->integer('role')->unsigned();
            $table->timestamps();
        });
    }
    // 1	id	ID	bigint unsigned(20)
    // 2	name	氏名	varchar(255)
    // 3	email	メールアドレス	varchar(255)
    // 4	password_hash	パスワード	varchar(255)
    // 5	created_at	作成日時	timestamp
    // 6	updated_at	更新日時	timestamp

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
