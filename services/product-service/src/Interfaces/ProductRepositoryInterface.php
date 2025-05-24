<?php

namespace Services\ProductService\Interfaces;

use Services\ProductService\Models\Product;

interface ProductRepositoryInterface
{
    public function findById(int $id): ?Product;
    public function findAll(array $criteria = []): array;
    public function create(array $data): Product;
    public function update(Product $product, array $data): Product;
    public function delete(Product $product): bool;
} 