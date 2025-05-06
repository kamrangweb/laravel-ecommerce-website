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
        Schema::create('hakkimizdas', function (Blueprint $table) {
            $table->id();
            $table->string('baslik')->nullable();
            $table->string('kisa_baslik')->nullable();
            $table->text('kisa_aciklama')->nullable();
            $table->text('aciklama')->nullable();
            $table->string('resim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hakkimizdas');
    }
};
