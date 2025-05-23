<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'blog_title',
        'blog_slug',
        'blog_description',
        'blog_image',
        'blog_status'
    ];
} 