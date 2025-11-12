<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->delete();

        // 50件のランダムなデータを生成
        Product::factory()->count(50)->create();
        
        // 検索テスト用に必ず存在する固定データを1件追加
        Product::factory()->create([
            'name' => 'テスト用 メンズ Tシャツ (固定データ)',
            'category' => 'mens-tab', 
            'price' => 2999,
            'description' => '常に検索で見つけられるメンズ用のTシャツです。',
            'stock_quantity' => 10,
        ]);
        
        echo "ProductSeeder: 51件の商品データを投入しました。\n";
    }
}