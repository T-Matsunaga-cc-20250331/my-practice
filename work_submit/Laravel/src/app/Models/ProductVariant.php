<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    /**
     * このバリエーションが属する商品を取得
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
