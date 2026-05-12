<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}