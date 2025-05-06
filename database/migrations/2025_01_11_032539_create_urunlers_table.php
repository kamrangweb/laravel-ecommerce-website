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
        Schema::create('urunlers', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('altkategori_id');
            $table->string('baslik')->nullable();
            $table->string('url')->nullable();
            $table->string('tag')->nullable();
            $table->string('anahtar')->nullable();
            $table->string('aciklama')->nullable();
            $table->text('metin')->nullable();
            $table->string('resim')->nullable();
            $table->integer('durum')->default(0);
            $table->integer('sirano')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urunlers');
    }
};
