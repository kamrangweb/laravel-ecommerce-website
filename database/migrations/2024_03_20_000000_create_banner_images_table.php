<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('banner_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->constrained('banners')->onDelete('cascade');
            $table->string('image_path');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banner_images');
    }
}; 