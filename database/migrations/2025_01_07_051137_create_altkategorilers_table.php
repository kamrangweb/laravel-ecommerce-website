<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('altkategorilers', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->string('altkategori_adi')->nullable();
            $table->string('altkategori_url')->nullable();
            $table->string('anahtar')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('resim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('altkategorilers');
    }
};
