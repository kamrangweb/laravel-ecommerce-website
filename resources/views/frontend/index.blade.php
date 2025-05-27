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

    @include('frontend.home.best_selling')

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
                                <p class="testimonial-text">"Working with this team has been an absolute pleasure. They delivered our project on time and exceeded our expectations. Their attention to detail and commitment to quality is outstanding."</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/author-1.jpg') }}" alt="John Smith">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">John Smith</h5>
                                        <span class="author-position">CEO, Tech Solutions</span>
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
                                <p class="testimonial-text">"The level of professionalism and expertise demonstrated by the team is remarkable. They understood our needs perfectly and delivered a solution that transformed our business."</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/author-2.jpg') }}" alt="Sarah Johnson">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">Sarah Johnson</h5>
                                        <span class="author-position">Marketing Director, Innovate Inc</span>
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
                                <p class="testimonial-text">"I'm impressed by their innovative approach and technical expertise. The team went above and beyond to ensure our project's success. Highly recommended!"</p>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="{{ asset('frontend/assets/img/testimonials/author-3.jpg') }}" alt="Michael Brown">
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">Michael Brown</h5>
                                        <span class="author-position">CTO, Digital Solutions</span>
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

    <!-- Contact Section -->
    <section class="contact-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="section-title">
                            <span class="sub-title">Get in Touch</span>
                            <h2 class="title">Let's Discuss Your Project</h2>
                            <p class="text-muted">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                        </div>
                        <div class="contact-info">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Our Location</h5>
                                    <p>123 Business Street, New York, USA</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <h5>Email Us</h5>
                                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Call Us</h5>
                                    <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email*" required>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Your Phone*" required>
                                <div class="invalid-feedback">Please enter your phone number.</div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Your Message*" required></textarea>
                                <div class="invalid-feedback">Please enter your message.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span>Send Message</span>
                                <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
     