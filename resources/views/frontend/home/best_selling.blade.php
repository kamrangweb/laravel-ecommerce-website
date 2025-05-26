<!-- Best Selling Products Section -->
<section class="best-selling-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center">
                    <span class="sub-title">Best Selling</span>
                    <h2 class="title mb-3">Our Best Selling Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $bestSellingProducts = Http::get('http://localhost:8001/api/products')->json();
            @endphp

            @if(isset($bestSellingProducts) && is_array($bestSellingProducts))
                @foreach($bestSellingProducts as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="category-item">
                        <div class="category-thumb">
                            <a href="{{ url('product/'.$product['id']) }}">
                                <img src="{{ $product['image_url'] ?? asset('frontend/assets/img/placeholder.jpg') }}" 
                                     alt="{{ $product['name'] ?? 'Product Image' }}">
                            </a>
                        </div>
                        <div class="category-content">
                            <h4 class="title">
                                <a href="{{ url('product/'.$product['id']) }}">
                                    {{ $product['name'] ?? 'Product Name' }}
                                </a>
                            </h4>
                            <p>{{ Str::limit($product['description'] ?? 'No description available', 100) }}</p>
                            <div class="price-section mb-3">
                                @if(isset($product['discount_price']) && $product['discount_price'] < $product['price'])
                                    <span class="text-decoration-line-through text-muted">${{ number_format($product['price'], 2) }}</span>
                                    <span class="text-danger fw-bold ms-2">${{ number_format($product['discount_price'], 2) }}</span>
                                @else
                                    <span class="fw-bold">${{ number_format($product['price'] ?? 0, 2) }}</span>
                                @endif
                            </div>
                            <a href="{{ url('product/'.$product['id']) }}" class="btn btn-outline-primary align-items-center">
                                View Details <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No best selling products available at the moment.
                    </div>
                </div>
            @endif
        </div>
    </div>
</section> 