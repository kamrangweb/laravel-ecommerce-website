<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'altkategoriler';

    protected $fillable = [
        'kategori_id',
        'altkategori_adi',
        'altkategori_url',
        'anahtar',
        'aciklama',
        'resim'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
