<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class TestController extends Controller
{
    public function test()
    {
        try {
            DB::connection()->getPdo();
            $status = "Database connection successful!";
            Config::set('app.offline_mode', false);
        } catch (\Exception $e) {
            $status = "Database connection failed: " . $e->getMessage();
            Config::set('app.offline_mode', true);
        }

        return response()->json([
            'status' => $status,
            'offline_mode' => config('app.offline_mode'),
            'database_connection' => DB::connection()->getDatabaseName()
        ]);
    }
} 