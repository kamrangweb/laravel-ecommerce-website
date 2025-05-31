<!-- Favorites Products Section -->
<section class="favorites-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center">
                    <span class="sub-title">Favorites</span>
                    <h2 class="title mb-3">Our Favorite Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                try {
                    $favoriteProducts = Http::timeout(3)->get('http://localhost:8003/test_db.php')->json();
                } catch (\Exception $e) {
                    $favoriteProducts = null;
                }
            @endphp

            @if(isset($favoriteProducts['status']) && $favoriteProducts['status'] === 'success' && !empty($favoriteProducts['data']))
                @foreach($favoriteProducts['data'] as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="category-item">
                        <div class="category-thumb">
                            <a href="#">
                                <img src="{{ $product['image_url'] }}" 
                                     alt="{{ $product['image_url'] }}">
                            </a>
                            <!-- <a href="#">
                                <img src="{{ asset('frontend/assets/img/placeholder.jpg') }}" 
                                     alt="{{ $product['product_name'] }}">
                            </a> -->
                        </div>
                        <div class="category-content">
                            <h4 class="title">
                                <a href="#">
                                    {{ $product['product_name'] }}
                                </a>
                            </h4>
                            <p>Added on: {{ \Carbon\Carbon::parse($product['created_at'])->format('M d, Y') }}</p>
                            <div class="price-section mb-3">
                                <span class="fw-bold">Favorite Product</span>
                            </div>
                            <a href="#" class="btn btn-outline-primary align-items-center">
                                View Details <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="banner-area text-center p-5 bg-light rounded">
                        <div class="banner-content">
                            <h3 class="mb-4">Discover Our Favorite Products</h3>
                            <p class="mb-4">Explore our curated collection of handpicked favorites, featuring the best products our customers love.</p>
                            <div class="banner-features mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="feature-item">
                                            <i class="fas fa-star text-warning mb-3"></i>
                                            <h5>Top Rated</h5>
                                            <p>Highest rated products</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item">
                                            <i class="fas fa-heart text-danger mb-3"></i>
                                            <h5>Most Loved</h5>
                                            <p>Customer favorites</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="feature-item">
                                            <i class="fas fa-trophy text-primary mb-3"></i>
                                            <h5>Best Sellers</h5>
                                            <p>Popular choices</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section> 