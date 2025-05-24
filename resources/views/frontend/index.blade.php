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

    <!-- About Section -->
    <section class="about-area section-padding bg-light p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image rounded">
                        <img class="rounded-3" src="{{ asset('frontend/assets/img/about/about-1.jpg') }}" alt="About Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="sub-title">About Us</span>
                        <h2 class="title">Your Trusted Technology Partner</h2>
                        <p>With years of experience in the industry, we've helped numerous businesses achieve their digital goals. Our team of experts is dedicated to delivering high-quality solutions that drive results.</p>
                        <ul class="about-list">
                            <li><i class="fas fa-check"></i> Expert Team</li>
                            <li><i class="fas fa-check"></i> Quality Service</li>
                            <li><i class="fas fa-check"></i> 24/7 Support</li>
                        </ul>
                        <a href="{{ url('/about') }}" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mt-5">
                        <span class="sub-title">Our Products</span>
                        <h2 class="title">Recent Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('frontend.home.multiple')
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-area section-padding bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title">Testimonials</span>
                        <h2 class="title">What Our Clients Say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="testimonials-slider">
                        <div class="testimonial-item text-center">
                            <div class="testimonial-content">
                                <p>"Working with this team has been an absolute pleasure. They delivered our project on time and exceeded our expectations."</p>
                                <div class="testimonial-author">
                                    <h5>John Smith</h5>
                                    <span>CEO, Tech Solutions</span>
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

    <!-- CTA Section -->
    <section class="cta-area section-padding bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="cta-content text-center">
                        <h2>Ready to Start Your Project?</h2>
                        <p>Let's work together to bring your ideas to life.</p>
                        <a href="{{ route('contact') }}" class="btn btn-light">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
     