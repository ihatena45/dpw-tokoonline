<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;

use App\Models\Product;
use App\Models\Cart;
use App\Models\SellerQris;
use App\Models\Transaction;


class User extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'buyer_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }

    public function sellerQris()
    {
        return $this->hasOne(SellerQris::class, 'seller_id');
    }
}
