<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\AdminController; 
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TopController;

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
Route::get('/', [TopController::class, 'top'])->name('top'); 
// 管理画面
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function(){
  // 管理画面トップ
  Route::get('/', [AdminController::class, 'index'])->name('index'); 
  
  // 商品登録画面
  Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
});

// 登録画面表示
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// 登録処理（フォーム送信）
Route::post('register', [RegisterController::class, 'register']);

//　登録確認
Route::post('register/confirm', [RegisterController::class, 'confirm'])->name('confirm');

// 会員登録完了処理
Route::post('register/complete', [RegisterController::class, 'complete'])->name('complete');
Route::get('register/complete', [RegisterController::class, 'completeSuccess'])->name('register.completeSuccess');

// ログイン画面表示
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// ログイン処理（フォーム送信）
Route::post('login', [LoginController::class, 'login']);

// ログアウト
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

