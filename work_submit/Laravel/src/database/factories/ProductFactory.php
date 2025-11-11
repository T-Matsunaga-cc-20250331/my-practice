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
        // JavaScriptのタブIDと完全に一致させるカテゴリキー
        $categories = ['mens-tab', 'ladies-tab', 'kids-tab']; 
        $productTypes = ['Tシャツ', 'ジャケット', 'パンツ', 'ブラウス', 'スカート', 'パーカー', 'スニーカー'];
        
        $category = Arr::random($categories);
        $name = Arr::random($productTypes);

        return [
            'name' => "{$category}向け {$name} " . $this->faker->numberBetween(1, 100), 
            
            // 'category' カラムにデータを投入
            'category' => $category, 
            
            'price' => $this->faker->numberBetween(2000, 15000), 
            'description' => $this->faker->sentence(8), 
            
            // 'stock_quantity' のダミーデータを追加
            'stock_quantity' => $this->faker->numberBetween(0, 500), 
        ];
    }
}