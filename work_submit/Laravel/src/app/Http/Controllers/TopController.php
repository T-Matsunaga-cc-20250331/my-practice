<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;




class TopController extends Controller
{
    // ユーザーのトップ画面を表示
    public function top()
    {
        $products = Product::all(); // すべての商品を取得
        $chunkedProducts = $products->chunk(3);
        
        $favorites = collect();
        $is_admin = false;

        if (Auth::check()) {
            $user = Auth::user();
            $favorites = $user->favorites;

            if ($user->role === User::ROLE_ADMIN) { 
                $is_admin = true;
            }
        }
        return view('top', compact('chunkedProducts', 'favorites','is_admin'));
    }
}
