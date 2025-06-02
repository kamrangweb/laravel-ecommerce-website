@extends('frontend.main_master')
@section('main')
    <!-- Debug Information -->
    {{-- @if(config('app.debug'))
        <div class="container mt-3">
            <div class="alert alert-info">
                <h4>Debug Information</h4>
                <pre>{{ print_r($product->toArray(), true) }}</pre>
            </div>
        </div>
    @endif --}}

    <div class="container py-5" style="margin-top: 100px;">
        <div class="row">
            <!-- Product Image Section -->
            <div class="col-md-6">
                <div class="product-image mb-4 d-flex justify-content-center align-items-center">
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
            </div>

            <!-- Product Details Section -->
            <div class="col-md-6">
                <div class="product-details">
                    <!-- Product Name -->
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
                        @if(isset($product->product_stock_quantity) && $product->product_stock_quantity > 0)
                            <span class="badge bg-success">In Stock ({{ $product->product_stock_quantity }} available)</span>
                        @else
                            <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="description mb-4">
                        <h4 class="mb-3">Description</h4>
                        <p class="text-muted">{{ $product->product_description ?? 'No description available' }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="actions mb-4">
                        @if(isset($product->product_stock_quantity) && $product->product_stock_quantity > 0)
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
                    <div class="additional-info">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Product Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Category ID:</strong> {{ $product->category_id ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Created:</strong> {{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Product Details Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">Specifications</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="productTabsContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <h4>Product Description</h4>
                                <p>{{ $product->product_description ?? 'No detailed description available.' }}</p>
                            </div>
                            <div class="tab-pane fade" id="specifications" role="tabpanel">
                                <h4>Product Specifications</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Product Name</th>
                                                <td>{{ $product->product_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Stock Quantity</th>
                                                <td>{{ $product->product_stock_quantity ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Category ID</th>
                                                <td>{{ $product->category_id ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y H:i:s') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>{{ \Carbon\Carbon::parse($product->updated_at)->format('M d, Y H:i:s') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 