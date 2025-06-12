@php
    $recentProducts = App\Models\Product::where('product_status', true)
        ->orderBy('created_at', 'DESC')
        ->limit(6)
        ->get();
@endphp

@foreach($recentProducts as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="product-card">
            <div class="product-thumb position-relative">
                <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}" class="d-block">
                    @if($product->product_thumbnail && file_exists(public_path($product->product_thumbnail)))
                        <img src="{{ asset($product->product_thumbnail) }}" 
                             alt="{{ $product->product_name ?? 'Product Image' }}" 
                             class="img-fluid rounded-top product-image">

                             <!-- {{ public_path($product->product_thumbnail) }} -->
                    @else
                        <img src="{{ asset('frontend/assets/img/images/product-demo.jpg') }}" 
                             alt="No Image Available" 
                             class="img-fluid rounded-top product-image">
                    @endif
                    <div class="product-overlay">
                        <div class="product-actions">
                            <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}" 
                               class="btn btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-sm add-to-cart" data-product-id="{{ $product->id }}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </a>
                @if($product->discount_price && $product->selling_price > 0)
                    <div class="discount-badge">
                        {{ round((($product->selling_price - $product->discount_price) / $product->selling_price) * 100) }}% OFF
                    </div>
                @endif
            </div>
            <div class="product-content p-3">
                <div class="product-category mb-2">
                    <small class="text-muted">
                        @if($product->category)
                            {{ $product->category->category_name }}
                        @endif
                    </small>
                </div>
                <h4 class="product-title mb-2">
                    <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}" 
                       class="text-decoration-none text-dark">
                        {{ Str::limit($product->product_name, 50) }}
                    </a>
                </h4>
                <p class="product-description text-muted mb-3">
                    {{ Str::limit($product->short_description, 80) }}
                </p>
                <div class="product-price mb-3">
                    @if($product->discount_price && $product->selling_price > 0)
                        <span class="text-decoration-line-through text-muted">${{ number_format($product->selling_price, 2) }}</span>
                        <span class="text-danger fw-bold ms-2">${{ number_format($product->discount_price, 2) }}</span>
                    @else
                        <span class="fw-bold text-primary">${{ number_format($product->selling_price, 2) }}</span>
                    @endif
                </div>
                <div class="product-footer d-flex justify-content-between align-items-center">
                    <a href="{{ url('product/'.Str::slug($product->product_name).'-'.$product->id) }}" 
                       class="btn btn-sm btn-outline-primary text-decoration-none text-center w-25">
                        View
                    </a>
                    <div class="product-rating">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach




<style>
.product-actions .btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    padding: 0px;
}

.product-actions .btn:hover {
    background: #fff;
}

.product-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 30px;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    transform: scale(1.05);

}

.product-thumb {
    position: relative;
    overflow: hidden;
    border-radius: 10px 10px 0 0;
    padding: 15px;
}

.product-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
    border-radius: 8px;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.product-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 8px;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-actions {
    display: flex;
    gap: 10px;
}

.discount-badge {
    position: absolute;
    top: 25px;
    right: 25px;
    background: #ff4757;
    color: #fff;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.product-content {
    padding: 20px !important;
}

.product-title {
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 15px;
}

.product-title a:hover {
    color: #007bff !important;
}

.product-description {
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 20px;
}

.product-price {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

.product-rating {
    font-size: 0.9rem;
}

.product-footer {
    border-top: 1px solid #eee;
    padding-top: 15px;
    margin-top: 15px;
}

@media (max-width: 768px) {
    .product-card {
        margin-bottom: 20px;
    }
    
    .product-content {
        padding: 15px !important;
    }
    
    .product-thumb {
        padding: 10px;
    }
}
</style> 