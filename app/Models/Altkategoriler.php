<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Altkategoriler extends Model
{
    //
    protected $guarded = [];
    public function iliskikategori(){
        return $this->belongsTo(Kategoriler::class,'kategori_id','id');
    }
}
