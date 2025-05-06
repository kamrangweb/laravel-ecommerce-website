@extends('frontend.main_master')     

@section('main')


    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">1111{{ $icerik->baslik }}111</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">{{ $icerik['kategoriler']['kategori_adi'] }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                <li><img src="{{  asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-details-area -->
    <section class="standard__blog blog__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <img src="assets/img/blog/blog_thumb01.jpg" alt="">
                        </div>
                        <div class="blog__details__content services__details__content">
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i>{{ $icerik->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</li>
                            </ul>
                            <h2 class="title">{{$icerik->baslik }}</h2>
                            <p>{!! $icerik->metin !!}able</p>
                        </div>
                        <div class="blog__details__bottom">
                            <ul class="blog__details__tag">
                                <li class="title">Tag:</li>
                                <li class="tags-list">
                                    @foreach ($etiketler as $taglar)
                                    <a href="#">{{ $taglar }}</a>
                                    @endforeach

                                </li>
                            </ul>
                            <ul class="blog__details__social">
                                <li class="title">Share :</li>
                                <li class="social-icons">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog__next__prev">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-md-6">
                                    <div class="blog__next__prev__item">
                                        <h4 class="title">Previous Post</h4>
                                        <div class="blog__next__prev__post">
                                            <div class="blog__next__prev__thumb">
                                                <a href="blog-details.html"><img src="assets/img/blog/blog_prev.jpg" alt=""></a>
                                            </div>
                                            <div class="blog__next__prev__content">
                                                <h5 class="title"><a href="blog-details.html">Digital Marketing Agency Pricing Guide.</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <div class="blog__next__prev__item next_post text-end">
                                        <h4 class="title">Next Post</h4>
                                        <div class="blog__next__prev__post">
                                            <div class="blog__next__prev__thumb">
                                                <a href="blog-details.html"><img src="assets/img/blog/blog_next.jpg" alt=""></a>
                                            </div>
                                            <div class="blog__next__prev__content">
                                                <h5 class="title"><a href="blog-details.html">App Prototyping
                                                Types, Example & Usages.</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">SON Blog</h4>
                            <ul class="rc__post">
@foreach ($icerikHepsi as $icerikler)
    
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}"><img src="{{ asset($icerikler->resim) }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">Best website traffick booster with
                                        great tools.</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                    </div>
                                </li>

                                @endforeach

                                
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($kategoriler as $kategori)
                                    
                                    <li class="sidebar__cat__item"><a href="{{ url('post/'.$kategori->id.'/'.$kategori->url) }}">{{ $kategori->kategori_adi }}</a></li>
                                    @endforeach
                           
                             </ul>
                        </div>
               
                       
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->


@endsection