<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            // Test database connection
            DB::connection()->getPdo();
            Config::set('app.offline_mode', false);
        } catch (\Exception $e) {
            // If database is not available, switch to file sessions
            Config::set('session.driver', 'file');
            Config::set('app.offline_mode', true);
        }
    }
} 