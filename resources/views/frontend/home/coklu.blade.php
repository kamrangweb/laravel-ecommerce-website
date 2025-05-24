@php
    $kategoriler = App\Models\Kategoriler::orderBy('id','DESC')->get();
    $urunler = App\Models\Urunler::where('durum',1)->orderBy('sirano','ASC')->get();
@endphp

<section class="portfolio-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center">
                    <span class="sub-title">Our Products</span>
                    <h2 class="title">Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All Products</button>
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
                <div class="row">
                    @foreach($urunler as $urun)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="category-item">
                            <div class="category-thumb">
                                <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}">
                                    <img src="{{ asset($urun->resim) }}" alt="{{ $urun->baslik }}">
                                </a>
                            </div>
                            <div class="category-content">
                                <h4 class="title">
                                    <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}">
                                        {{ $urun->baslik }}
                                    </a>
                                </h4>
                                <p>{{ Str::limit($urun->aciklama, 100) }}</p>
                                <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}" class="btn btn-outline-primary">
                                    View Details <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @foreach ($kategoriler as $kategori)
        <div class="tab-pane" id="kategoriler{{ $kategori->id }}" role="tabpanel" aria-labelledby="website-tab">
            <div class="container">
                <div class="row">
                    @php
                        $urunkategori = App\Models\Urunler::where('kategori_id',$kategori->id)->where('durum',1)->orderBy('sirano','ASC')->get();
                    @endphp

                    @forelse ($urunkategori as $urun)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="category-item">
                            <div class="category-thumb">
                                <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}">
                                    <img src="{{ asset($urun->resim) }}" alt="{{ $urun->baslik }}">
                                </a>
                            </div>
                            <div class="category-content">
                                <h4 class="title">
                                    <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}">
                                        {{ $urun->baslik }}
                                    </a>
                                </h4>
                                <p>{{ Str::limit($urun->aciklama, 100) }}</p>
                                <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}" class="btn btn-outline-primary">
                                    View Details <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            No products found in this category.
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>