@extends('frontend.main_master')

@section('main')
    <!-- About Section -->
    <section id="about" class="container">
        <!-- About Intro -->
        <div class="row align-items-center about-intro">
            <div class="col-6 col-xs-12">
                <div class="about-slogan zoom start">
                    <h3>Welcome to <span class="primary-color">Food</span></h3>
                    <p>We bring you the finest culinary experiences with fresh ingredients and love.</p>
                </div>
            </div>
            <div class="col-6 col-xs-12">
                <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" alt="About Food" class="fullwidth right-to-left start">
            </div>
        </div>

        <!-- Mission and Vision -->
        <div class="mission-vision">
            <div class="mission">
                <i class="fas fa-utensils fa-2x"></i>
                <h3>Our Mission</h3>
                <p>To deliver exceptional dining experiences with fresh, high-quality ingredients and heartfelt service.</p>
            </div>
            <div class="vision">
                <i class="fas fa-eye fa-2x"></i>
                <h3>Our Vision</h3>
                <p>To be the leading culinary destination, inspiring joy and connection through food.</p>
            </div>
        </div>

        <!-- Counter Section -->
        <div class="counter-section">
            <div class="counter-item">
                <i class="fas fa-store fa-2x"></i>
                <h3 class="counter" data-target="25">0</h3>
                <p>Branches</p>
            </div>
            <div class="counter-item">
                <i class="fas fa-smile fa-2x"></i>
                <h3 class="counter" data-target="100000">0</h3>
                <p>Happy Customers</p>
            </div>
        </div>

        <!-- Timeline Slider -->
        <div class="timeline-section">
            <h2>Our Journey</h2>
            <div class="timeline-slider">
                <div class="timeline-item" data-year="2015">
                    <i class="fas fa-seedling"></i>
                    <h4>2015</h4>
                    <p>Food Haven founded with our first restaurant in Culinary City.</p>
                </div>
                <div class="timeline-item" data-year="2017">
                    <i class="fas fa-store"></i>
                    <h4>2017</h4>
                    <p>Expanded to 5 branches across the region.</p>
                </div>
                <div class="timeline-item" data-year="2019">
                    <i class="fas fa-trophy"></i>
                    <h4>2019</h4>
                    <p>Won "Best Dining Experience" award.</p>
                </div>
                <div class="timeline-item" data-year="2021">
                    <i class="fas fa-globe"></i>
                    <h4>2021</h4>
                    <p>Launched online ordering platform.</p>
                </div>
                <div class="timeline-item" data-year="2023">
                    <i class="fas fa-users"></i>
                    <h4>2023</h4>
                    <p>Reached 50,000 happy customers.</p>
                </div>
                <div class="timeline-item" data-year="2025">
                    <i class="fas fa-star"></i>
                    <h4>2025</h4>
                    <p>Opened 25th branch and introduced new menu.</p>
                </div>
            </div>
            <div class="timeline-controls">
                <button class="prev"><i class="fas fa-chevron-left"></i></button>
                <button class="next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <style>
        /* About Section Styles */
        .about-intro {
            padding: 60px 0;
        }

        .about-slogan {
            padding: 20px;
        }

        .about-slogan h3 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .primary-color {
            color: #FF7F50;
        }

        .fullwidth {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Mission and Vision Styles */
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 40px 0;
        }

        .mission, .vision {
            text-align: center;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .mission i, .vision i {
            color: #FF7F50;
            margin-bottom: 20px;
        }

        /* Counter Section Styles */
        .counter-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 40px 0;
        }

        .counter-item {
            text-align: center;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .counter-item i {
            color: #FF7F50;
            margin-bottom: 15px;
        }

        .counter {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        /* Timeline Section Styles */
        .timeline-section {
            padding: 60px 0;
            margin-bottom: 100px; /* Add bottom margin to prevent footer overlap */
            position: relative;
            z-index: 1; /* Ensure timeline is above footer */
        }

        .timeline-section h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        .timeline-slider {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 0;
            gap: 20px;
            position: relative;
            z-index: 2; /* Ensure slider is above other elements */
        }

        .timeline-item {
            min-width: 250px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            z-index: 2; /* Ensure items are above other elements */
        }

        .timeline-item i {
            color: #FF7F50;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .timeline-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            position: relative;
            z-index: 2; /* Ensure controls are above other elements */
        }

        .timeline-controls button {
            background: #FF7F50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .timeline-controls button:hover {
            background: #FF6347;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .mission-vision, .counter-section {
                grid-template-columns: 1fr;
            }

            .about-intro .col-6 {
                width: 100%;
            }

            .about-intro .col-6:first-child {
                margin-bottom: 30px;
            }

            .timeline-section {
                margin-bottom: 150px; /* Increase bottom margin on mobile */
            }
        }
    </style>

    <script>
        window.onload = function () {
            // Counter Animation
            $('.counter').each(function () {
                const $this = $(this);
                const countTo = $this.attr('data-target');
                $({ countNum: $this.text() }).animate(
                    {
                        countNum: countTo
                    },
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                        }
                    }
                );
            });

            // Timeline Slider
            const $slider = $('.timeline-slider');
            const $prev = $('.timeline-controls .prev');
            const $next = $('.timeline-controls .next');

            $next.click(function () {
                $slider.scrollLeft($slider.scrollLeft() + 270);
            });

            $prev.click(function () {
                $slider.scrollLeft($slider.scrollLeft() - 270);
            });
        };
    </script>
@endsection
