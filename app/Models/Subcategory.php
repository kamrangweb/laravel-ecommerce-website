<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
        'subcategory_image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
} 