<?php

namespace Services\ProductService\Services;

use Services\ProductService\Interfaces\ProductRepositoryInterface;
use Services\ProductService\Models\Product;

class ProductService
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getProduct(int $id): ?Product
    {
        return $this->repository->findById($id);
    }

    public function getAllProducts(array $criteria = []): array
    {
        return $this->repository->findAll($criteria);
    }

    public function createProduct(array $data): Product
    {
        // Add business logic validation here
        $this->validateProductData($data);
        
        return $this->repository->create($data);
    }

    public function updateProduct(Product $product, array $data): Product
    {
        // Add business logic validation here
        $this->validateProductData($data);
        
        return $this->repository->update($product, $data);
    }

    public function deleteProduct(Product $product): bool
    {
        return $this->repository->delete($product);
    }

    private function validateProductData(array $data): void
    {
        // Add validation rules here
        if (isset($data['price']) && $data['price'] < 0) {
            throw new \InvalidArgumentException('Price cannot be negative');
        }

        if (isset($data['stock']) && $data['stock'] < 0) {
            throw new \InvalidArgumentException('Stock cannot be negative');
        }
    }
} 