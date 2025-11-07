<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
    ];

    /**
     * 注文をしたユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 注文に含まれる複数の商品詳細（注文アイテム）を取得
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
