<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'kategoriler';

    protected $fillable = [
        'kategori_adi',
        'kategori_url',
        'anahtar',
        'aciklama',
        'resim'
    ];
}
