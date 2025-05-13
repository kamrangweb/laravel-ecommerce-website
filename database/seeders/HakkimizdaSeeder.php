<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HakkimizdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hakkimizdas')->insert([
            'baslik' => 'Hakkımızda',
            'kisa_baslik' => 'Profesyonel Çözüm Ortağınız',
            'kisa_aciklama' => 'Şirketimiz, müşterilerimize en iyi hizmeti sunmak için sürekli kendini geliştiren ve yenileyen bir yapıya sahiptir.',
            'aciklama' => 'Detaylı açıklama buraya gelecek. Şirketimiz hakkında daha fazla bilgi ve detaylar burada yer alacak.',
            'resim' => '/images/about-us.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
