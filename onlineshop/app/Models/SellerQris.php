<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerQris extends Model
{
    protected $table = 'seller_qris';

    protected $fillable = [
        'seller_id',
        'qris_image',
        'bank_name',
        'account_name',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}