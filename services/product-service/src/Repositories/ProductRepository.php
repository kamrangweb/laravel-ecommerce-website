<?php

namespace Services\ProductService\Repositories;

use Services\ProductService\Interfaces\ProductRepositoryInterface;
use Services\ProductService\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function findById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function findAll(array $criteria = []): array
    {
        $query = Product::query();

        if (isset($criteria['category_id'])) {
            $query->where('category_id', $criteria['category_id']);
        }

        if (isset($criteria['status'])) {
            $query->where('status', $criteria['status']);
        }

        return $query->get()->all();
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }
} 