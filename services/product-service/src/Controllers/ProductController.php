<?php

namespace ProductService\Controllers;

class ProductController
{
    public function getFeaturedProducts()
    {
        // Demo products data
        return [
            [
                'id' => 1,
                'name' => 'Premium Laptop',
                'description' => 'High-performance laptop with the latest processor and graphics card.',
                'price' => 1299.99,
                'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853',
                'category' => 'Electronics',
                'stock' => 15,
                'is_featured' => true
            ],
            [
                'id' => 2,
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling wireless headphones with premium sound quality.',
                'price' => 199.99,
                'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
                'category' => 'Audio',
                'stock' => 30,
                'is_featured' => true
            ],
            [
                'id' => 3,
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with health monitoring and notifications.',
                'price' => 299.99,
                'image_url' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
                'category' => 'Wearables',
                'stock' => 20,
                'is_featured' => true
            ],
            [
                'id' => 4,
                'name' => 'Professional Camera',
                'description' => 'DSLR camera with 4K video recording and advanced features.',
                'price' => 899.99,
                'image_url' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32',
                'category' => 'Photography',
                'stock' => 10,
                'is_featured' => true
            ],
            [
                'id' => 5,
                'name' => 'Gaming Console',
                'description' => 'Next-gen gaming console with 4K gaming and streaming capabilities.',
                'price' => 499.99,
                'image_url' => 'https://images.unsplash.com/photo-1486401899868-0e435ed85128',
                'category' => 'Gaming',
                'stock' => 25,
                'is_featured' => true
            ],
            [
                'id' => 6,
                'name' => 'Smart Speaker',
                'description' => 'Voice-controlled smart speaker with premium audio quality.',
                'price' => 149.99,
                'image_url' => 'https://images.unsplash.com/photo-1543512214-318c7553f230',
                'category' => 'Smart Home',
                'stock' => 40,
                'is_featured' => true
            ]
        ];
    }

    public function getAllProducts()
    {
        // For now, return the same demo products
        return $this->getFeaturedProducts();
    }

    public function getProduct($id)
    {
        // Demo product data
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Premium Laptop',
                'description' => 'High-performance laptop with the latest processor and graphics card.',
                'price' => 1299.99,
                'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853',
                'category' => 'Electronics',
                'stock' => 15,
                'is_featured' => true
            ]
        ];

        if (!isset($products[$id])) {
            return ['error' => 'Product not found'];
        }

        return $products[$id];
    }
} 