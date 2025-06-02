@extends('frontend.main_master')     
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@section('main')
    <!-- Hero Section -->
    <section class="hero-area">
        <div class="hero-image">
            <img src="{{ asset('frontend/assets/img/hero/hero-bg.jpg') }}" alt="Hero Background">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="hero-content text-center">
                    <h1 class="display-4 fw-bold mb-4">Welcome to Our Store</h1>
                    <p class="lead mb-5">Discover amazing products at unbeatable prices</p>
                    <div class="hero-btn">
                        <a href="{{ route('shop') }}" class="btn btn-light me-3">Shop Now</a>
                        <a href="{{ route('categories') }}" class="btn btn-outline-light">Browse Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Products Section -->
    <section class="portfolio-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title">Our Products</span>
                        <h2 class="title">Recent Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontend.home.recent_products')
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title">Shop by Category</span>
                        <h2 class="title mb-3">Browse Our Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
                @endphp

                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="category-item">
                        <div class="category-thumb">
                            <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">
                                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}">
                            </a>
                        </div>
                        <div class="category-content">
                            <h4 class="title">
                                <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">
                                    {{ $category->category_name }}
                                </a>
                            </h4>
                            <p>{{ Str::limit($category->category_description, 100) }}</p>
                            <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}" class="btn btn-outline-primary align-items-center">
                                Shop Now <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.home.best_selling')
    @include('frontend.home.favorites')

    <!-- Testimonials Section -->
    <section class="testimonials-area section-padding bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-5">
                        <span class="sub-title">Testimonials</span>
                        <h2 class="title">What Our Clients Say</h2>
                        <p class="text-muted">Discover why our clients love working with us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="testimonials-carousel owl-carousel">
                        <!-- Testimonial Item 1 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">"The team's expertise in web development is outstanding. They transformed our online presence and helped us achieve remarkable growth in our digital sales. Their attention to detail and commitment to excellence is truly impressive."</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/testimonial1.jpg') }}" alt="John Anderson">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">John Anderson</h5>
                                        <span class="author-position">CEO, TechVision Inc</span>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Item 2 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">"Working with this team has been a game-changer for our business. Their innovative solutions and professional approach helped us streamline our operations and increase customer satisfaction. Highly recommended!"</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/testimonial2.jpg') }}" alt="John Anderson">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">David Mitchell</h5>
                                        <span class="author-position">Marketing Director, Innovate Solutions</span>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Item 3 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">"The level of professionalism and technical expertise demonstrated by the team is exceptional. They delivered our project ahead of schedule and exceeded our expectations. Their support team is always responsive and helpful."</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/testimonial3.jpg') }}" alt="Michael Chen">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">Michael Chen</h5>
                                        <span class="author-position">CTO, Digital Innovations</span>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title">Latest News</span>
                        <h2 class="title">From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontend.home.home_blog')
            </div>
        </div>
    </section>
@endsection
     