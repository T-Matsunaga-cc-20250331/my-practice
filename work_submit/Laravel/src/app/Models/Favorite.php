<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    /**
     * このお気に入りレコードを作成したユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * このお気に入りレコードが対象とする商品を取得
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
