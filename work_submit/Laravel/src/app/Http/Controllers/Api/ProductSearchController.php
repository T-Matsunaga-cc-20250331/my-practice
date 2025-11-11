<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product; 
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        // 1. リクエストパラメータの取得
        $category = $request->query('category');
        $keyword = $request->query('keyword');

        // 2. 検索クエリの構築
        $query = Product::query();

        // カテゴリによる絞り込み
        if ($category) {
            $query->where('category', $category);
        }

        // キーワードによる絞り込み
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                // キーワードが含まれる商品を検索
                $q->where('name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        }
        
        // 3. 実行と結果の取得
        // 在庫があり、かつ最新の更新順でソート
        $products = $query
            ->where('stock_quantity', '>', 0) // 在庫があるもののみ
            ->orderBy('updated_at', 'desc')
            ->get();

        // 4. JSON形式で返却 (HTTP 200 OK)
        return response()->json($products);
    }
}