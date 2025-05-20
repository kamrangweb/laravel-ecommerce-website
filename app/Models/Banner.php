<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //

    protected $guarded = [];

    public function getTranslatedTitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en') {
            return $this->baslik_en ?? $this->baslik;
        }
        return $this->baslik;
    }

    public function getTranslatedSubtitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en') {
            return $this->alt_baslik_en ?? $this->alt_baslik;
        }
        return $this->alt_baslik;
    }
}
