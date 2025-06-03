<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler" style="position: relative; z-index: 1000; color: #68666C;"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border-radius: 10px; margin: 10px 0; padding: 10px;">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}" class="logo__black">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Gradient definitions -->
                                        <defs>
                                            <linearGradient id="bagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#FF7F50;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                                            </linearGradient>
                                            <linearGradient id="lightLines" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                                <stop offset="50%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shopping bag icon with gradient -->
                                        <path d="M15 15 L35 15 L35 40 L15 40 Z" fill="url(#bagGradient)"/>
                                        <path d="M20 15 L20 10 C20 5 25 5 25 10 L25 15" stroke="url(#bagGradient)" stroke-width="2"/>
                                        <path d="M30 15 L30 10 C30 5 35 5 35 10 L35 15" stroke="url(#bagGradient)" stroke-width="2"/>
                                        <!-- Light lines -->
                                        <path d="M15 20 L35 20" stroke="url(#lightLines)" stroke-width="1"/>
                                        <path d="M15 25 L35 25" stroke="url(#lightLines)" stroke-width="1"/>
                                        <path d="M15 30 L35 30" stroke="url(#lightLines)" stroke-width="1"/>
                                        <!-- Store name with gradient -->
                                        <text x="45" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="url(#bagGradient)">SHOP</text>
                                    </svg>
                                </a>
                                <a href="{{ url('/') }}" class="logo__white">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Gradient definitions -->
                                        <defs>
                                            <linearGradient id="whiteBagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#FF7F50;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                                            </linearGradient>
                                            <linearGradient id="whiteLightLines" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                                <stop offset="50%" style="stop-color:#ffffff;stop-opacity:0.3" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shopping bag icon with gradient -->
                                        <path d="M15 15 L35 15 L35 40 L15 40 Z" fill="url(#whiteBagGradient)"/>
                                        <path d="M20 15 L20 10 C20 5 25 5 25 10 L25 15" stroke="url(#whiteBagGradient)" stroke-width="2"/>
                                        <path d="M30 15 L30 10 C30 5 35 5 35 10 L35 15" stroke="url(#whiteBagGradient)" stroke-width="2"/>
                                        <!-- Light lines -->
                                        <path d="M15 20 L35 20" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <path d="M15 25 L35 25" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <path d="M15 30 L35 30" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <!-- Store name with gradient -->
                                        <text x="45" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="url(#whiteBagGradient)">SHOP</text>
                                    </svg>
                                </a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ url('/') }}">{{ __('menu.home') }}</a></li>
                                    <li><a href="{{ url('/about') }}">{{ __('menu.about') }}</a></li>
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
                                <a href="{{ route('contact') }}" class="btn btn-primary rounded"><i class="fas fa-envelope me-2"></i>{{ __('menu.contact_us') }}</a>
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
                                        <!-- Gradient definitions -->
                                        <defs>
                                            <linearGradient id="bagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#FF7F50;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                                            </linearGradient>
                                            <linearGradient id="lightLines" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                                <stop offset="50%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shopping bag icon with gradient -->
                                        <path d="M15 15 L35 15 L35 40 L15 40 Z" fill="url(#bagGradient)"/>
                                        <path d="M20 15 L20 10 C20 5 25 5 25 10 L25 15" stroke="url(#bagGradient)" stroke-width="2"/>
                                        <path d="M30 15 L30 10 C30 5 35 5 35 10 L35 15" stroke="url(#bagGradient)" stroke-width="2"/>
                                        <!-- Light lines -->
                                        <path d="M15 20 L35 20" stroke="url(#lightLines)" stroke-width="1"/>
                                        <path d="M15 25 L35 25" stroke="url(#lightLines)" stroke-width="1"/>
                                        <path d="M15 30 L35 30" stroke="url(#lightLines)" stroke-width="1"/>
                                        <!-- Store name with gradient -->
                                        <text x="45" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="url(#bagGradient)">SHOP</text>
                                    </svg>
                                </a>
                                <a href="{{ url('/') }}" class="logo__white">
                                    <svg width="180" height="50" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Gradient definitions -->
                                        <defs>
                                            <linearGradient id="whiteBagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#FF7F50;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                                            </linearGradient>
                                            <linearGradient id="whiteLightLines" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                                <stop offset="50%" style="stop-color:#ffffff;stop-opacity:0.3" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.2" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shopping bag icon with gradient -->
                                        <path d="M15 15 L35 15 L35 40 L15 40 Z" fill="url(#whiteBagGradient)"/>
                                        <path d="M20 15 L20 10 C20 5 25 5 25 10 L25 15" stroke="url(#whiteBagGradient)" stroke-width="2"/>
                                        <path d="M30 15 L30 10 C30 5 35 5 35 10 L35 15" stroke="url(#whiteBagGradient)" stroke-width="2"/>
                                        <!-- Light lines -->
                                        <path d="M15 20 L35 20" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <path d="M15 25 L35 25" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <path d="M15 30 L35 30" stroke="url(#whiteLightLines)" stroke-width="1"/>
                                        <!-- Store name with gradient -->
                                        <text x="45" y="35" font-family="Arial" font-size="24" font-weight="bold" fill="url(#whiteBagGradient)">SHOP</text>
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
    /* Import Roboto font */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    /* Apply Roboto to all elements */
    * {
        font-family: 'Roboto', sans-serif;
    }

    /* Global button hover effect */
    .btn {
        transition: all 0.3s ease;
    }

 
    /* Navigation specific styles */
    .navbar__wrap ul li a {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        letter-spacing: 0.3px;
        color: #68666C;
    }

    .menu__area.sticky-menu .navbar__wrap ul li a {
        font-weight: 500;
        color: #68666C;
    }

    /* Submenu styles */
    .navbar__wrap ul li .sub-menu li a {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        color: #68666C;
    }

    /* Mobile menu styles */
    .mobile__menu .menu__outer ul li > a {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #68666C;
    }

    .mobile__menu .menu__outer ul li ul li a {
        font-weight: 400;
        color: #68666C;
    }

    /* Language switcher styles */
    .menu-item-has-children .sub-menu a {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        color: #68666C;
    }

    .menu-item-has-children > a {
        font-weight: 500;
        color: #68666C;
    }

    /* Logo text style */
    .logo text {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
    }

    /* Button styles */
    .header__btn .btn {
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    /* Existing styles */
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