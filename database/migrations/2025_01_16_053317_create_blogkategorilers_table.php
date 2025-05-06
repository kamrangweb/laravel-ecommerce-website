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
        Schema::create('blogkategorilers', function (Blueprint $table) {
            $table->id();
      
            $table->string('kategori_adi')->nullable();
            $table->string('url')->nullable();
            $table->integer('durum')->default(0);
            $table->integer('sirano')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogkategorilers');
    }
};
