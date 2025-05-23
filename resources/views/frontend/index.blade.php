@extends('frontend.main_master')     
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@section('main')
    <!-- Hero Section -->
    <section class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Innovative Solutions for Your Business</h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">We help businesses transform their digital presence with cutting-edge technology and creative solutions.</p>
                        <div class="hero-btn wow fadeInUp" data-wow-delay=".6s">
                            <a href="{{ route('contact') }}" class="btn">Get Started</a>
                            <a href="{{ url('/about') }}" class="btn btn-outline">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('frontend/assets/img/hero/hero-1.png') }}" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center">
                        <span class="sub-title">Our Services</span>
                        <h2 class="title">What We Do</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h4>Web Development</h4>
                        <p>Custom web solutions tailored to your business needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Mobile Apps</h4>
                        <p>Native and cross-platform mobile applications.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Digital Marketing</h4>
                        <p>Strategic marketing solutions to grow your business.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-area section-padding bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{ asset('frontend/assets/img/about/about-1.jpg') }}" alt="About Image">
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
                    <div class="section-title text-center">
                        <span class="sub-title">Our Work</span>
                        <h2 class="title">Recent Projects</h2>
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
     