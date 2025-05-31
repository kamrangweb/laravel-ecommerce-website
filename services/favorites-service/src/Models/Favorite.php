<?php

namespace FavoritesService\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'favorites';
    
    protected $fillable = [
        'user_id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo('ProductService\Models\Product', 'product_id');
    }
} 