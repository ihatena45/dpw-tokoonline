<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}