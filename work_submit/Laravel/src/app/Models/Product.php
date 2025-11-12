<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'stock_quantity',
    ];

    protected $appends = [
        'taxed_price'
    ];

    public function getTaxedPriceAttribute(){
        return $this->price * 1.10;
    }
    /** 
     * 商品が持つ複数の画像を取得
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * 商品が持つ複数のバリエーションを取得
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    
    /**
     * この商品をお気に入り登録しているユーザーを取得
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id');
    }

    /**
     * この商品が含まれる注文詳細を取得
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
