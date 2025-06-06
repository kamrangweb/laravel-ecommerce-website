<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'product_service';
    
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_thumbnail',
        'short_description',
        'selling_price',
        'discount_price',
        'product_sku',
        'product_stock_quantity',
        'product_status'
    ];

    protected $casts = [
        'selling_price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
        'product_status' => 'boolean'
    ];
} 