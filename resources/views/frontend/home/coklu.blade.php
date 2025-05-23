@php
    $kategoriler = App\Models\Kategoriler::orderBy('id','DESC')->get();
    $urunler = App\Models\Urunler::where('durum',1)->orderBy('sirano','ASC')->get();
@endphp


<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Urunlerimiz</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>

                    @foreach ($kategoriler as $kategori)
                        
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="website-tab" data-bs-toggle="tab" href="#kategoriler{{ $kategori->id }}" type="button"
                            role="tab" aria-controls="website" aria-selected="false">{{  $kategori->kategori_adi }}</a>
                    </li>
                    @endforeach
                    
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img01.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Apps Design</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img02.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Web Design</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img03.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>UX/UI Design</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img04.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Web Development</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img05.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Web Development</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img06.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Web Development</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="assets/img/portfolio/portfolio_img07.jpg" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>Web Development</span>
                                    <h4 class="title"><a href="portfolio-details.html">Banking Management System</a></h4>
                                    <a href="portfolio-details.html" class="link">Case Study</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@foreach ($kategoriler as $kategori)
    
        <div class="tab-pane" id="kategoriler{{ $kategori->id }}" role="tabpanel" aria-labelledby="website-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                        @php
                            $urunkategori = App\Models\Urunler::where('kategori_id',$kategori->id)->where('durum',1)->orderBy('sirano','ASC')->get();
                        @endphp


@forelse ($urunkategori as $urunler)
    

                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{ asset($urunler->resim) }}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $urunler['kategoriler']['kategori_adi'] }}</span>
                                    <h4 class="title"><a href="{{ url('urun/'.$urunler->id.'/'.$urunler->url) }}">{{ $urunler->baslik }}</a></h4>
                                    <a href="{{ url('urun/'.$urunler->id.'/'.$urunler->url) }}" class="link">Devami oku...</a>
                                </div>
                            </div>

                            @empty

                            <h1 class="text-danger">Urun bulunamamdi</h1>
    
@endforelse

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        
    </div>
</section>