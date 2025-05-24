<?php

namespace Services\ProductService\Tests;

use PHPUnit\Framework\TestCase;
use Services\ProductService\Services\ProductService;
use Services\ProductService\Repositories\ProductRepository;
use Services\ProductService\Models\Product;

class ProductServiceTest extends TestCase
{
    private ProductService $productService;
    private ProductRepository $repository;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);
        $this->productService = new ProductService($this->repository);
    }

    public function testGetProductReturnsCorrectProduct(): void
    {
        $expectedProduct = new Product();
        $expectedProduct->id = 1;
        $expectedProduct->name = 'Test Product';

        $this->repository->expects($this->once())
            ->method('findById')
            ->with(1)
            ->willReturn($expectedProduct);

        $result = $this->productService->getProduct(1);

        $this->assertSame($expectedProduct, $result);
    }

    public function testCreateProductWithInvalidPriceThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Price cannot be negative');

        $this->productService->createProduct([
            'name' => 'Test Product',
            'price' => -10
        ]);
    }
} 