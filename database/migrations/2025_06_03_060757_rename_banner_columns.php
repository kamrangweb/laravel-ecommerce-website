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
        Schema::table('banners', function (Blueprint $table) {
            $table->renameColumn('baslik', 'title');
            $table->renameColumn('alt_baslik', 'subtitle');
            $table->renameColumn('resim', 'image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->renameColumn('title', 'baslik');
            $table->renameColumn('subtitle', 'alt_baslik');
            $table->renameColumn('image', 'resim');
        });
    }
};
