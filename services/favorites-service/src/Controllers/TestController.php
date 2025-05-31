<?php

namespace FavoritesService\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController
{
    public function testConnection()
    {
        try {
            // Test basic connection
            $version = DB::connection('pgsql')->select('SELECT version()')[0]->version;
            
            // Test if we can create a test record
            DB::connection('pgsql')->table('favorites')->insert([
                'user_id' => 1,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Test if we can read the record
            $testRecord = DB::connection('pgsql')
                ->table('favorites')
                ->where('user_id', 1)
                ->where('product_id', 1)
                ->first();

            // Clean up test record
            DB::connection('pgsql')
                ->table('favorites')
                ->where('user_id', 1)
                ->where('product_id', 1)
                ->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'PostgreSQL connection successful!',
                'version' => $version,
                'test_record' => $testRecord
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'PostgreSQL connection failed: ' . $e->getMessage()
            ], 500);
        }
    }
} 