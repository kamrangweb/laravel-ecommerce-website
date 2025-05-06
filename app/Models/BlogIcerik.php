<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogIcerik extends Model
{
    //
    protected $guarded = [];

    public function kategoriler(){
        return $this->belongsTo(Blogkategoriler::class,'kategori_id','id');
    }
}
