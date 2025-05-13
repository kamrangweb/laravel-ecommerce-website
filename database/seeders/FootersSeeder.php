<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FootersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footers')->insert([
            'baslikbir' => 'Kurumsal',
            'baslikiki' => 'Hizmetler',
            'baslikuc' => 'İletişim',
            'telefon' => '+90 555 555 55 55',
            'email' => 'info@example.com',
            'adres' => 'İstanbul, Türkiye',
            'facebook' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'linkedin' => 'https://linkedin.com/company/example',
            'instagram' => 'https://instagram.com/example',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
