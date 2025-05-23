@php
    $homebanner = App\Models\Banner::find(1);
    $bannerImages = App\Models\Banner::all(); // Get all banner images
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleSpan = document.querySelector('.title span');
        const text = titleSpan.textContent;
        titleSpan.textContent = '';
        let i = 0;
        
        function typeWriter() {
            if (i < text.length) {
                titleSpan.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100); // Typing speed
            } else {
                // Wait before starting to delete
                setTimeout(deleteText, 2000);
            }
        }

        function deleteText() {
            if (titleSpan.textContent.length > 0) {
                titleSpan.textContent = titleSpan.textContent.slice(0, -1);
                setTimeout(deleteText, 50); // Deleting speed
            } else {
                i = 0;
                // Wait before starting to type again
                setTimeout(typeWriter, 1000);
            }
        }

        typeWriter();
    });
</script>

<style>
    .title span {
        border-right: 2px solid #000;
        animation: blink 0.7s infinite;
    }
    @keyframes blink {
        0%, 100% { border-color: transparent; }
        50% { border-color: #000; }
    }

    /* Carousel Styles */
    .carousel {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .carousel-item img {
        object-fit: cover;
        height: 400px;
        width: 100%;
    }

    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px;
        }
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        opacity: 0.8;
    }

    .carousel-indicators {
        margin-bottom: 0.5rem;
    }

    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 4px;
    }
</style>

<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($bannerImages as $key => $banner)
                                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $key }}" 
                                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($bannerImages as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ $banner->resim ?? '/images/default-banner.jpg' }}" 
                                         class="d-block w-100" 
                                         alt="{{ $banner->translated_title ?? 'Banner Image' }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>{{ $homebanner->translated_title }}</span></h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">{{ $homebanner->translated_subtitle }}</p>
                    <a href="{{ route('home.about') }}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">{{ __('banner.more_about') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">{{ __('banner.scroll_down') }}</a>
    </div>
    <div class="banner__video">
        <a href="{{ $homebanner->video_url }}" class="popup-video"><i class="fas fa-play"></i></a>
    </div>
</section>