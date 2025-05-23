<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}" class="logo__black">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Modern abstract shape -->
                                        <path d="M20 10 L40 10 L40 40 L20 40 Z" fill="#1a1a1a"/>
                                        <path d="M45 15 L65 15 L65 35 L45 35 Z" fill="#1a1a1a"/>
                                        <path d="M70 20 L90 20 L90 30 L70 30 Z" fill="#1a1a1a"/>
                                        <!-- Company name -->
                                        <text x="100" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="#1a1a1a">CORP</text>
                                    </svg>
                                </a>
                                <a href="{{ url('/') }}" class="logo__white">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Modern abstract shape -->
                                        <path d="M20 10 L40 10 L40 40 L20 40 Z" fill="#ffffff"/>
                                        <path d="M45 15 L65 15 L65 35 L45 35 Z" fill="#ffffff"/>
                                        <path d="M70 20 L90 20 L90 30 L70 30 Z" fill="#ffffff"/>
                                        <!-- Company name -->
                                        <text x="100" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="#ffffff">CORP</text>
                                    </svg>
                                </a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ url('/') }}">{{ __('menu.home') }}</a></li>
                                    <li><a href="{{ url('/about') }}">{{ __('menu.about') }}</a></li>

                                    @php
                                        $categories = App\Models\Category::orderBy('category_name','ASC')->limit(2)->get();
                                    @endphp

                                    @foreach ($categories as $category)
                                        <li class="menu-item-has-children">
                                            <a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a>
                                            @php
                                                $subcategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                            @endphp
                                            
                                            <ul class="sub-menu">
                                                @foreach ($subcategories as $subcategory)
                                                    <li><a href="{{ url('subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                    <li class="menu-item-has-children">
                                        <a href="{{url('/blog')}}">{{ __('menu.blog') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/blog')}}">{{ __('menu.latest_news') }}</a></li>
                                            <li><a href="{{url('/blog')}}">{{ __('menu.featured_posts') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('contact') }}">{{ __('menu.contact') }}</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <i class="fas fa-globe"></i> 
                                            {{ config('languages.supported')[app()->getLocale()]['name'] }}
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
                                                    <img src="https://flagcdn.com/w20/gb.png" alt="English" class="lang-flag">
                                                    {{ __('menu.english') }}
                                                    @if(app()->getLocale() == 'en')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('lang.switch', 'tr') }}" class="{{ app()->getLocale() == 'tr' ? 'active' : '' }}">
                                                    <img src="https://flagcdn.com/w20/tr.png" alt="Turkish" class="lang-flag">
                                                    {{ __('menu.turkish') }}
                                                    @if(app()->getLocale() == 'tr')
                                                        <i class="fas fa-check"></i>
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact') }}" class="btn">{{ __('menu.contact_us') }}</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ url('/') }}" class="logo__black">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Modern abstract shape -->
                                        <path d="M20 10 L40 10 L40 40 L20 40 Z" fill="#1a1a1a"/>
                                        <path d="M45 15 L65 15 L65 35 L45 35 Z" fill="#1a1a1a"/>
                                        <path d="M70 20 L90 20 L90 30 L70 30 Z" fill="#1a1a1a"/>
                                        <!-- Company name -->
                                        <text x="100" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="#1a1a1a">CORP</text>
                                    </svg>
                                </a>
                                <a href="{{ url('/') }}" class="logo__white">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Modern abstract shape -->
                                        <path d="M20 10 L40 10 L40 40 L20 40 Z" fill="#ffffff"/>
                                        <path d="M45 15 L65 15 L65 35 L45 35 Z" fill="#ffffff"/>
                                        <path d="M70 20 L90 20 L90 30 L70 30 Z" fill="#ffffff"/>
                                        <!-- Company name -->
                                        <text x="100" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="#ffffff">CORP</text>
                                    </svg>
                                </a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Language switching functionality
    const languageSwitchers = document.querySelectorAll('.language-switch');
    languageSwitchers.forEach(switcher => {
        switcher.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            // Store the selected language in localStorage
            localStorage.setItem('preferred_language', lang);
            // Reload the page to apply the language change
            location.reload();
        });
    });

    // Check for saved language preference
    const savedLang = localStorage.getItem('preferred_language');
    if (savedLang) {
        // Update active language in the dropdown
        const activeLang = document.querySelector(`.language-switch[data-lang="${savedLang}"]`);
        if (activeLang) {
            activeLang.parentElement.classList.add('active');
        }
    }
});
</script>

<style>
    .lang-flag {
        width: 20px;
        height: 15px;
        margin-right: 8px;
        vertical-align: middle;
    }
    
    .menu-item-has-children .sub-menu a {
        display: flex;
        align-items: center;
        padding: 8px 15px;
    }
    
    .menu-item-has-children .sub-menu a.active {
        background-color: rgba(0, 0, 0, 0.05);
        font-weight: 600;
    }
    
    .menu-item-has-children .sub-menu a i.fa-check {
        margin-left: auto;
        color: #2b70fa;
    }
    
    .menu-item-has-children > a i.fa-globe {
        margin-right: 5px;
    }
    
    .menu-item-has-children > a i.fa-chevron-down {
        margin-left: 5px;
        font-size: 12px;
    }
    
    /* Dark mode support */
    .dark-mode .menu-item-has-children .sub-menu a.active {
        background-color: rgba(255, 255, 255, 0.05);
    }
</style>