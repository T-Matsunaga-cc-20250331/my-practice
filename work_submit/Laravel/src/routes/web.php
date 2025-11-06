<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\AdminController; 
use App\Http\Controllers\admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [Controller::class, 'index'])->name('index'); 
// 管理画面
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function(){
  // 管理画面トップ
  Route::get('/', [AdminController::class, 'index'])->name('index'); 
  
  // 商品登録画面
  Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
});