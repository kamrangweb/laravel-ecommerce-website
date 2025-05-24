<?php

namespace Services\ProductService\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'status'
    ];

    protected $casts = [
        'price' => 'float',
        'stock' => 'integer',
        'status' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
} 