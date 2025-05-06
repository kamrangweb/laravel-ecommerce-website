
<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}" class="logo__black"><img src="assets/img/logo/logo_black.png" alt=""></a>
                                <a href="{{ url('/') }}" class="logo__white"><img src="assets/img/logo/logo_white.png" alt=""></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ url('/') }}">Ana sayfa</a></li>
                                    <li><a href="{{ url('/hakkimizda') }}">Hakkimizda</a></li>



@php
    $kategoriler = App\Models\Kategoriler::orderBy('kategori_adi','ASC')->limit(2)->get();
@endphp

@foreach ($kategoriler as $kategori)
    



                                    <li class="menu-item-has-children"><a href="{{ url('kategori/'.$kategori->id.'/'.$kategori->kategori_url) }}">{{ $kategori->kategori_adi }}</a>
@php
    $altkategoriler = App\Models\Altkategoriler::where('kategori_id',$kategori->id)->orderBy('altkategori_adi','ASC')->get();
@endphp
                                    
                                        <ul class="sub-menu">
@foreach ($altkategoriler as $altkategori)
                                            <li><a href="{{ url('altkategori/'.$altkategori->id.'/'.$altkategori->altkategori_url) }}">{{ $altkategori->altkategori_adi }}</a></li>
@endforeach
                                            
                                        </ul>
                                    </li>


@endforeach

                                    <li class="menu-item-has-children"><a href="{{url('/blog')}}">Our Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Our News</a></li>
                                            <li><a href="blog-details.html">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('iletisim') }}">Iletisim</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('iletisim') }}" class="btn">Iletisim</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>