<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => '管理者太郎',
      'email' => 'admin000@sample.com',
      'password_hash' => Hash::make('admin000'),
      'role' => 0,
    ]);

    DB::table('users')->insert([
      'name' => 'テストユーザー',
      'email' => 'test@example.com',
      'password_hash' => Hash::make('password'), 
      'role' => 1, // 一般ユーザー
    ]);
  }
}
