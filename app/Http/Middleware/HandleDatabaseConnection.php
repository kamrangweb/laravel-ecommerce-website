<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HandleDatabaseConnection
{
    public function handle(Request $request, Closure $next)
    {
        // If we're in offline mode and not on the home page, show maintenance page
        if (Config::get('app.offline_mode', false) && !$request->is('/') && !$request->is('home')) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Database connection is currently unavailable. Please try again later.'
                ], 503);
            }
            
            return response()->view('errors.maintenance', [
                'message' => 'We are currently experiencing technical difficulties. Please try again later.'
            ], 503);
        }

        return $next($request);
    }
} 