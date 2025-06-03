<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::connection('product_service')->statement('ALTER TABLE urunler RENAME TO products');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::connection('product_service')->statement('ALTER TABLE products RENAME TO urunler');
    }
};
