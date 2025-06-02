@php
    $recentProducts = App\Models\Product::orderBy('created_at', 'DESC')
        ->limit(3)
        ->get();
@endphp

@extends('frontend.main_master')

@section('main')
    <!-- Product Detail Section -->
    <div class="container" style="margin-top: 300px;">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="product-images">
                    <div class="main-image mb-4 d-flex justify-content-center align-items-center">
                        @if($product->product_image_url && file_exists(public_path($product->product_image_url)))
                            <img src="{{ asset($product->product_image_url) }}" 
                                 alt="{{ $product->product_name ?? 'Product Image' }}" 
                                 class="img-fluid rounded shadow-sm w-50">
                        @else
                            <img src="{{ asset('frontend/assets/img/images/product-demo.jpg') }}" 
                                 alt="No Image Available" 
                                 class="img-fluid rounded shadow-sm w-50">
                        @endif
                    </div>
                    @if($product->product_images)
                        <div class="thumbnail-images row g-2">
                            @foreach(json_decode($product->product_images) as $image)
                                <div class="col-3">
                                    <img src="{{ asset($image) }}" alt="{{ $product->product_name }}" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <h1 class="product-title mb-3">{{ $product->product_name }}</h1>
                    <div class="product-price mb-3">
                        <span class="current-price">${{ $product->selling_price }}</span>
                        @if($product->discount_price)
                            <span class="original-price">${{ $product->regular_price }}</span>
                            <span class="discount-badge">{{ round((($product->regular_price - $product->discount_price) / $product->regular_price) * 100) }}% OFF</span>
                        @endif
                    </div>
                    <div class="product-description mb-4">
                        <p>{{ $product->short_description }}</p>
                    </div>
                    <div class="product-meta mb-4">
                        <div class="meta-item">
                            <span class="label">Category:</span>
                            <span class="value">{{ $product->category ? $product->category->category_name : 'N/A' }}</span>
                        </div>
                        <div class="meta-item">
                            <span class="label">Brand:</span>
                            <span class="value">{{ $product->brand ? $product->brand->brand_name : 'N/A' }}</span>
                        </div>
                        <div class="meta-item">
                            <span class="label">Stock:</span>
                            <span class="value {{ $product->product_qty > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $product->product_qty > 0 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <div class="quantity-selector mb-3">
                            <label for="quantity">Quantity:</label>
                            <div class="input-group" style="width: 150px;">
                                <button class="btn btn-outline-secondary" type="button" id="decrease-qty">-</button>
                                <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="{{ $product->product_qty }}">
                                <button class="btn btn-outline-secondary" type="button" id="increase-qty">+</button>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-primary me-2" id="add-to-cart">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                            <button class="btn btn-outline-primary" id="add-to-wishlist">
                                <i class="fas fa-heart me-2"></i>Add to Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">Specifications</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content p-4 border border-top-0 rounded-bottom">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="product-description">
                            {!! $product->long_description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications" role="tabpanel">
                        <div class="product-specifications">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{ $product->product_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $product->category ? $product->category->category_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand</th>
                                        <td>{{ $product->brand ? $product->brand->brand_name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <td>{{ $product->product_qty }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="product-reviews">
                            <!-- Reviews content will go here -->
                            <p>No reviews yet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h3 class="section-title mb-4">Related Products</h3>
                <div class="row">
                    @foreach($recentProducts as $relatedProduct)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="product-card">
                                <div class="product-image">
                                    @if($relatedProduct->product_thumbnail && file_exists(public_path($relatedProduct->product_thumbnail)))
                                        <img src="{{ asset($relatedProduct->product_thumbnail) }}" alt="{{ $relatedProduct->product_name }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('frontend/assets/img/images/product-demo.jpg') }}" alt="No Image Available" class="img-fluid">
                                    @endif
                                </div>
                                <div class="product-info p-3">
                                    <h4 class="product-title">
                                        <a href="{{ url('product/'.$relatedProduct->id.'/'.$relatedProduct->product_slug) }}">
                                            {{ $relatedProduct->product_name }}
                                        </a>
                                    </h4>
                                    <div class="product-price">
                                        <span class="current-price">${{ $relatedProduct->selling_price }}</span>
                                        @if($relatedProduct->discount_price)
                                            <span class="original-price">${{ $relatedProduct->regular_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        .current-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: #FF7F50;
        }

        .original-price {
            font-size: 1.2rem;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
        }

        .discount-badge {
            background: #FF7F50;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 10px;
        }

        .product-meta {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }

        .meta-item {
            margin-bottom: 10px;
        }

        .meta-item .label {
            font-weight: 600;
            color: #666;
            margin-right: 10px;
        }

        .product-card {
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
            background: #fff;
            position: relative;
            z-index: 1;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-card .product-image {
            height: 200px;
            overflow: hidden;
        }

        .product-card .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-card .product-title {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .product-card .product-title a {
            color: #333;
            text-decoration: none;
        }

        .product-card .product-price {
            margin-top: 10px;
        }

        .nav-tabs .nav-link {
            color: #666;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: #FF7F50;
            font-weight: 600;
        }

        .tab-content {
            background: #fff;
        }

        .quantity-selector .input-group {
            width: 150px;
        }

        .quantity-selector input {
            text-align: center;
        }

        .action-buttons .btn {
            padding: 10px 20px;
        }

        .main-image {
            min-height: 300px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .main-image img {
            max-height: 300px;
            object-fit: contain;
        }

        /* Update container styles */
        .container {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .container {
                /* Mobile styles if needed */
            }
        }

        /* Add margin to related products section */
        .row.mt-5.mb-5 {
            margin-bottom: 100px !important;
        }

        @media (max-width: 768px) {
            .row.mt-5.mb-5 {
                margin-bottom: 150px !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const maxQuantity = {{ $product->product_qty }};

            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });

            increaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value < maxQuantity) {
                    quantityInput.value = value + 1;
                }
            });

            quantityInput.addEventListener('change', function() {
                let value = parseInt(this.value);
                if (value < 1) {
                    this.value = 1;
                } else if (value > maxQuantity) {
                    this.value = maxQuantity;
                }
            });
        });
    </script>
@endsection 