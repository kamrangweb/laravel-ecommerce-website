<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('baslik_en')->nullable()->after('baslik');
            $table->string('alt_baslik_en')->nullable()->after('alt_baslik');
        });
    }

    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['baslik_en', 'alt_baslik_en']);
        });
    }
}; 