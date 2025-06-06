<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_image'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
} 