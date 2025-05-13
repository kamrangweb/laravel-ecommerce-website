<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'baslik' => 'Hoşgeldiniz',
            'alt_baslik' => 'Kurumsal Web Sitemize Hoşgeldiniz',
            'url' => 'http://127.0.0.1:8000/',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'resim' => '/images/default-banner.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
