<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price', 
    ];

    /**
     * この注文詳細が属する注文を取得
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * この注文詳細に含まれる商品を取得
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
