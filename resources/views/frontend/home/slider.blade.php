<!-- Hero Section -->
<section class="hero-area">
    <div class="hero-image">
        @if(!empty($banner->image))
            <img src="{{ asset($banner->image) }}" alt="Hero Background">
        @else
            <img src="{{ asset('frontend/assets/img/hero/hero-bg.jpg') }}" alt="Hero Background">
        @endif
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $banner->title ?? 'Welcome to Our Store' }}</h1>
                <p class="lead mb-5">{{ $banner->subtitle ?? 'Discover amazing products at unbeatable prices' }}</p>
                <div class="hero-btn">
                    @if(!empty($banner->url))
                        <a href="{{ $banner->url }}" class="btn btn-light me-3">Shop Now</a>
                    @else
                        <a href="{{ route('shop') }}" class="btn btn-light me-3">Shop Now</a>
                    @endif
                    <a href="{{ route('categories') }}" class="btn btn-outline-light">Browse Categories</a>
                </div>
            </div>
        </div>
    </div>
</section> 