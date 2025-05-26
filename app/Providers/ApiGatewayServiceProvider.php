<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ApiGateway\ProductGatewayService;

class ApiGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ProductGatewayService::class, function ($app) {
            return new ProductGatewayService();
        });
    }

    public function boot(): void
    {
        //
    }
} 