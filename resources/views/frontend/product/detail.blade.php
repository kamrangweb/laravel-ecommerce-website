@extends('frontend.main_master')
@section('main')
    <div class="container py-5">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-md-6">
                <div class="product-image mb-4">
                    @if($product->product_thumbnail)
                        <img src="{{ asset($product->product_thumbnail) }}" 
                             alt="{{ $product->product_name ?? 'Product Image' }}" 
                             class="img-fluid rounded shadow-sm">
                    @else
                        <img src="{{ asset('frontend/assets/img/images/no-image.jpg') }}" 
                             alt="No Image Available" 
                             class="img-fluid rounded shadow-sm">
                    @endif
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="mb-3">{{ $product->product_name ?? 'Product Name' }}</h1>
                    
                    <!-- Price Section -->
                    <div class="price-section mb-4">
                        @if($product->discount_price && $product->selling_price > 0)
                            <span class="text-decoration-line-through text-muted h4">${{ number_format($product->selling_price, 2) }}</span>
                            <span class="text-danger fw-bold h3 ms-2">${{ number_format($product->discount_price, 2) }}</span>
                            <span class="badge bg-danger ms-2">
                                {{ round((($product->selling_price - $product->discount_price) / $product->selling_price) * 100) }}% OFF
                            </span>
                        @elseif($product->selling_price > 0)
                            <span class="fw-bold h3">${{ number_format($product->selling_price, 2) }}</span>
                        @else
                            <span class="fw-bold h3">Price not available</span>
                        @endif
                    </div>

                    <!-- Stock Status -->
                    <div class="stock-status mb-4">
                        @if(isset($product->stock) && $product->stock > 0)
                            <span class="badge bg-success">In Stock ({{ $product->stock }} available)</span>
                        @else
                            <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="description mb-4">
                        <h4 class="mb-3">Description</h4>
                        <p class="text-muted">{{ $product->short_description ?? 'No description available' }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="actions">
                        @if(isset($product->stock) && $product->stock > 0)
                            <button class="btn btn-primary btn-lg me-2">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        @endif
                        <button class="btn btn-outline-primary btn-lg me-2">
                            <i class="fas fa-heart me-2"></i>Add to Wishlist
                        </button>
                        <button class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-share-alt me-2"></i>Share
                        </button>
                    </div>

                    <!-- Additional Info -->
                    <div class="additional-info mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>SKU:</strong> {{ $product->sku ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 