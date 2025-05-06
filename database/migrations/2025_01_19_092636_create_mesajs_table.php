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
        Schema::create('mesajs', function (Blueprint $table) {
            $table->id();
            $table->string('adi')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->string('konu')->nullable();
            $table->text('mesaj')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesajs');
    }
};
