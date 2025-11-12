<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // JavaScriptのタブIDと一致させる
        $categories = ['mens-tab', 'ladies-tab', 'kids-tab']; 
        $productTypes = ['Tシャツ', 'ジャケット', 'パンツ', 'ブラウス', 'スカート', 'パーカー', 'スニーカー'];
        
        $category = Arr::random($categories);
        $name = Arr::random($productTypes);

        // 軽量な日本語説明文
        $descriptions = [
            '快適な着心地のコットン素材を使用した定番アイテムです。',
            '季節を問わず活躍する高品質なデザインです。',
            'プレゼントにも最適な上質な仕上がりになっています。',
            '洗濯後の縮みが少なく、長く愛用いただける商品です。',
            'シンプルなデザインでさまざまなスタイルに合わせやすいです。'
        ];

        return [
            'name' => "{$category}向け {$name} " . $this->faker->numberBetween(1, 100), 
            
            // 'category' カラムにデータを投入
            'category' => $category, 
            
            'price' => $this->faker->numberBetween(2000, 15000), 
            'description' => $descriptions[array_rand($descriptions)], 
            // 'stock_quantity' のダミーデータを追加
            'stock_quantity' => $this->faker->numberBetween(0, 500), 
        ];
    }
}