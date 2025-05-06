@extends('frontend.main_master')     

@section('main')

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Blog</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                        <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->


            <!-- blog-area -->
            <section class="standard__blog">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">

                            @foreach ($icerikHepsi as $icerikler)
                                
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}">
                                        <img src="{{ asset($icerikler->resim) }}" alt="">
                                    </a>
                                    <a href="{{ url('post/'.$icerikler->id.'/'.$icerikler->url) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                  
                                    <h2 class="title"><a href="">
                                        {{ $icerikler->baslik }}</a></h2>
                                    <p>{!! $icerikler->metinler !!} </p>
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i> 25 january 2021</li>
                                        <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                        <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                    </ul>
                                </div>
                            </div>

                            @endforeach

                            
                            <div class="pagination-wrap">
                                {{ $icerikHepsi->links('vendor.pagination.custom') }}
                                
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
                                        @foreach ($icerikHepsi as $metinler)
                                            
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb">
                                                <a href="{{ url('post/'.$metinler->id.'/'.$metinler->url) }}"><img src="{{ asset($metinler->resim) }}" alt=""></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title"><a href="{{ url('post/'.$metinler->id.'/'.$metinler->url) }}">{{$metinler->baslik}}</a></h5>
                                                <span class="post-date"><i class="fal fa-calendar-alt"></i> {{ $metinler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                      
                                    </ul>
                                </div>
                               
                                <div class="widget">
                                    <h4 class="widget-title">Recent Comment</h4>
                                    <ul class="sidebar__comment">
                                        <li class="sidebar__comment__item">
                                            <a href="blog-details.html">Rasalina Sponde</a>
                                            <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                        </li>
                                        <li class="sidebar__comment__item">
                                            <a href="blog-details.html">Rasalina Sponde</a>
                                            <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                        </li>
                                        <li class="sidebar__comment__item">
                                            <a href="blog-details.html">Rasalina Sponde</a>
                                            <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                        </li>
                                        <li class="sidebar__comment__item">
                                            <a href="blog-details.html">Rasalina Sponde</a>
                                            <p>There are many variations of passages of lorem ipsum available, but the majority have</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Popular Tags</h4>
                                    <ul class="sidebar__tags">
                                        <li><a href="blog.html">Business</a></li>
                                        <li><a href="blog.html">Design</a></li>
                                        <li><a href="blog.html">apps</a></li>
                                        <li><a href="blog.html">landing page</a></li>
                                        <li><a href="blog.html">data</a></li>
                                        <li><a href="blog.html">website</a></li>
                                        <li><a href="blog.html">book</a></li>
                                        <li><a href="blog.html">Design</a></li>
                                        <li><a href="blog.html">product design</a></li>
                                        <li><a href="blog.html">landing page</a></li>
                                        <li><a href="blog.html">data</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->


  


@endsection