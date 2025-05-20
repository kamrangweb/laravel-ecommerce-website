@extends('frontend.main_master')     
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@section('main')
    

     
     <!-- banner-area -->
            @include('frontend.anasayfa.banner')
            <!-- banner-area-end -->

            <!-- about-area -->
            @include('frontend.anasayfa.anasayfa_hakkimizda')
            <!-- about-area-end -->

            <!-- services-area -->
            @include('frontend.anasayfa.random_kategori')
            <!-- services-area-end -->

            <!-- work-process-area -->
            <section class="work__process">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title">{{ __('home.work_process.subtitle') }}</span>
                                <h2 class="title">{{ __('home.work_process.heading') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row work__process__wrap">
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 01</span>
                                <div class="work__process__icon">
                                    <img class="light" src="assets/img/icons/wp_light_icon01.png" alt="">
                                    <img class="dark" src="assets/img/icons/wp_icon01.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ __('home.work_process.steps.discover.title') }}</h4>
                                    <p>{{ __('home.work_process.steps.discover.description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 02</span>
                                <div class="work__process__icon">
                                    <img class="light" src="assets/img/icons/wp_light_icon02.png" alt="">
                                    <img class="dark" src="assets/img/icons/wp_icon02.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ __('home.work_process.steps.define.title') }}</h4>
                                    <p>{{ __('home.work_process.steps.define.description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 03</span>
                                <div class="work__process__icon">
                                    <img class="light" src="assets/img/icons/wp_light_icon03.png" alt="">
                                    <img class="dark" src="assets/img/icons/wp_icon03.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ __('home.work_process.steps.develop.title') }}</h4>
                                    <p>{{ __('home.work_process.steps.develop.description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 04</span>
                                <div class="work__process__icon">
                                    <img class="light" src="assets/img/icons/wp_light_icon04.png" alt="">
                                    <img class="dark" src="assets/img/icons/wp_icon04.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ __('home.work_process.steps.deliver.title') }}</h4>
                                    <p>{{ __('home.work_process.steps.deliver.description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- work-process-area-end -->

            <!-- portfolio-area -->
            @include('frontend.anasayfa.coklu')            
            <!-- portfolio-area-end -->

            <!-- partner-area -->
            <section class="partner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="partner__logo__wrap">
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light01.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_01.png" alt="">
                                </li>
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light02.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_02.png" alt="">
                                </li>
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light03.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_03.png" alt="">
                                </li>
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light04.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_04.png" alt="">
                                </li>
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light05.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_05.png" alt="">
                                </li>
                                <li>
                                    <img class="light" src="assets/img/icons/partner_light06.png" alt="">
                                    <img class="dark" src="assets/img/icons/partner_06.png" alt="">
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="partner__content">
                                <div class="section__title">
                                    <span class="sub-title">{{ __('home.partners.subtitle') }}</span>
                                    <h2 class="title">{{ __('home.partners.heading') }}</h2>
                                </div>
                                <p>{{ __('home.partners.description') }}</p>
                                <a href="contact.html" class="btn">{{ __('home.partners.cta') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- partner-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 order-0 order-lg-2">
                            <ul class="testimonial__avatar__img">
                                <li><img src="assets/img/images/testi_img01.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img02.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img03.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img04.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img05.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img06.png" alt=""></li>
                                <li><img src="assets/img/images/testi_img07.png" alt=""></li>
                            </ul>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="testimonial__wrap">
                                <div class="section__title">
                                    <span class="sub-title">{{ __('home.testimonials.subtitle') }}</span>
                                    <h2 class="title">{{ __('home.testimonials.heading') }}</h2>
                                </div>
                                <div class="testimonial__active">
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>{{ __('home.testimonials.content') }}</p>
                                            <div class="testimonial__avatar">
                                                <span>Rasalina De Wiliamson</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>{{ __('home.testimonials.content') }}</p>
                                            <div class="testimonial__avatar">
                                                <span>Rasalina De Wiliamson</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__arrow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- blog-area -->
            @include('frontend.anasayfa.anasayfa_blog')
            
            <!-- blog-area-end -->

           
            @endsection
     