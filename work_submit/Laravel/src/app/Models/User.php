<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password_hash',
        // roleカラムを追加
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * このModelで使用する認証パスワードのカラム名をオーバーライド
     *
     * @return string
     */
    public function getAuthPasswordName()
    {
        return 'password_hash';
    }

    /**
     * ユーザーが持つ注文を取得
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * ユーザーがお気に入り登録した商品を取得
     */
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id');
    }

    public const ROLE_ADMIN = 0;
    public const ROLE_GENERAL = 1;

}