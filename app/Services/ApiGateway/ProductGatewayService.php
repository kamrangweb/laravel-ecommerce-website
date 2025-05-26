<?php

namespace App\Services\ApiGateway;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ProductGatewayService
{
    private string $baseUrl;
    private int $cacheTime;

    public function __construct()
    {
        $this->baseUrl = config('services.product_service.url', 'http://localhost:8001');
        $this->cacheTime = config('services.product_service.cache_time', 3600);
    }

    public function getAllProducts(array $filters = []): array
    {
        $cacheKey = 'products_' . md5(json_encode($filters));
        
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($filters) {
            $response = Http::get("{$this->baseUrl}/api/products", $filters);
            
            if ($response->successful()) {
                return $response->json()['data'];
            }
            
            throw new \Exception('Failed to fetch products from product service');
        });
    }

    public function getProduct(int $id): ?array
    {
        $cacheKey = "product_{$id}";
        
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($id) {
            $response = Http::get("{$this->baseUrl}/api/products/{$id}");
            
            if ($response->successful()) {
                return $response->json()['data'];
            }
            
            if ($response->status() === 404) {
                return null;
            }
            
            throw new \Exception('Failed to fetch product from product service');
        });
    }

    public function createProduct(array $data): array
    {
        $response = Http::post("{$this->baseUrl}/api/products", $data);
        
        if ($response->successful()) {
            Cache::tags(['products'])->flush();
            return $response->json()['data'];
        }
        
        throw new \Exception('Failed to create product in product service');
    }

    public function updateProduct(int $id, array $data): array
    {
        $response = Http::put("{$this->baseUrl}/api/products/{$id}", $data);
        
        if ($response->successful()) {
            Cache::tags(['products'])->flush();
            return $response->json()['data'];
        }
        
        throw new \Exception('Failed to update product in product service');
    }

    public function deleteProduct(int $id): bool
    {
        $response = Http::delete("{$this->baseUrl}/api/products/{$id}");
        
        if ($response->successful()) {
            Cache::tags(['products'])->flush();
            return true;
        }
        
        throw new \Exception('Failed to delete product in product service');
    }
} 