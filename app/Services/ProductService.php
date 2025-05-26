<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class ProductService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.product_service.url', 'http://localhost:8001');
    }

    public function getFeaturedProducts()
    {
        try {
            $response = Http::get("{$this->baseUrl}/api/products/featured");
            
            if ($response->failed()) {
                Log::error('Product service error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return collect([]);
            }

            $data = $response->json();
            return collect($data)->map(function ($item) {
                return (object) $item;
            });
        } catch (\Exception $e) {
            Log::error('Product service exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return collect([]);
        }
    }

    public function getAllProducts()
    {
        try {
            $response = Http::get("{$this->baseUrl}/api/products");
            
            if ($response->failed()) {
                Log::error('Product service error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return collect([]);
            }

            $data = $response->json();
            return collect($data)->map(function ($item) {
                return (object) $item;
            });
        } catch (\Exception $e) {
            Log::error('Product service exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return collect([]);
        }
    }

    public function getProduct($id)
    {
        try {
            $response = Http::get("{$this->baseUrl}/api/products/{$id}");
            
            if ($response->failed()) {
                Log::error('Product service error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return null;
            }

            $data = $response->json();
            return (object) $data;
        } catch (\Exception $e) {
            Log::error('Product service exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return null;
        }
    }
} 