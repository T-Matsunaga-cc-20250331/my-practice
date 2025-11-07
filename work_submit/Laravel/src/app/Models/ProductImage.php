<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * この画像が属する商品を取得
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
