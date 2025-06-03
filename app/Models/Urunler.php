<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'urunler';

    protected $fillable = [
        'kategori_id',
        'altkategori_id',
        'baslik',
        'url',
        'tag',
        'metin',
        'anahtar',
        'aciklama',
        'sirano',
        'resim',
        'durum'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'altkategori_id');
    }
}
