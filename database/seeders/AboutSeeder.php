<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => 'Welcome to Our Company',
            'short_title' => 'Your Trusted Partner',
            'short_description' => 'We are a leading company in our industry, providing high-quality services to our clients.',
            'long_description' => 'Our company has been serving clients for many years with dedication and professionalism. We take pride in our work and always strive to exceed expectations.',
            'about_image' => 'upload/no_image.jpg'
        ]);
    }
} 