// Initialize Owl Carousel for Testimonials
$(document).ready(function(){
    if($('.testimonials-carousel').length > 0) {
        $('.testimonials-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    margin: 10
                },
                576: {
                    items: 1,
                    margin: 20
                },
                768: {
                    items: 2,
                    margin: 20
                },
                992: {
                    items: 3,
                    margin: 30
                }
            }
        });
    }
}); 