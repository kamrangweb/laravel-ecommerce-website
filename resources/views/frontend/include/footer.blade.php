@php
 $footer = App\Models\Footer::find(1);
@endphp
 
 <!-- contact-area -->
 <section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">Get in Touch</span>
                        <h2 class="title">Let's Discuss Your Project</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>We're here to help and answer any questions you might have. We look forward to hearing from you.</p>
                        <div class="contact-info">
                            <div class="contact-info-item">
                                <!-- <i class="fas fa-envelope"></i> -->
                                <a href="mailto:{{ $footer->email }}" class="mail">{{ $footer->email }}</a>
                            </div>
                            <div class="contact-info-item">
                                <!-- <i class="fas fa-phone"></i> -->
                                <a href="tel:{{ $footer->telefon }}" class="phone">{{ $footer->telefon }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('offer.form') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Your Name*" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Your Email*" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-phone"></i>
                                <input type="tel" name="phone" placeholder="Your Phone*" required>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-comment"></i>
                                <textarea name="message" placeholder="Your Message*" required></textarea>
                            </div>
                            <button type="submit">
                                <span>Send Message</span>
                                <!-- <i class="fas fa-paper-plane"></i> -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->


<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">{{ $footer->baslikbir }}</h5>
                        <h4 class="title"> {{ $footer->telefon }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $footer->metin }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">{{ $footer->baslikiki }}</h5>
                        <h4 class="title">{{ $footer->adres }}</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>Level 13, 2 Elizabeth Steereyt set <br> Melbourne, Victoria 3000</p>
                        <a href="mailto:{{ $footer->email }}" class="mail">{{ $footer->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">{{ $footer->baslikbuc }}</h5>
                        <h4 class="title">{{ $footer->sosyal_baslik }}</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                        <ul class="footer__social__list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>