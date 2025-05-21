<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    protected $fillable = [
        'banner_id',
        'image_path',
        'title',
        'subtitle',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function getTranslatedTitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en') {
            return $this->title_en ?? $this->title;
        }
        return $this->title;
    }

    public function getTranslatedSubtitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en') {
            return $this->subtitle_en ?? $this->subtitle;
        }
        return $this->subtitle;
    }
}
