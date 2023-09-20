<footer id="footer" class="border-0 dark">
    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap py-lg-6">
            <div class="row col-mb-30 justify-content-center">

                <!-- Footer Col -->
                <div class="col-lg-2 col-sm-4 col-12">
                    <div class="widget widget_links widget-li-noicon">

                        <h4 class="ls0 nott">Get in Touch</h4>

                        <ul>
                            <li>Nairobi, Kenya</li>
                            <li>support@agrima.com</li>
                            <li>(+254) 795 615 409</li>
                            <li>
                                <div class="clearfix float-end" data-class-xl="float-end" data-class-lg="float-end" data-class-md="float-end" data-class-sm="" data-class-xs="">
                                    <a href="#" class="social-icon si-rounded si-small si-colored si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
    
                                    <a href="#" class="social-icon si-rounded si-small si-colored si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>                                   
    
                                    <a href="#" class="social-icon si-rounded si-small si-colored si-linkedin">
                                        <i class="icon-linkedin"></i>
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

                <!-- Footer Col -->
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="widget widget_links widget-li-noicon">

                        <h4 class="ls0 nott">Pages</h4>

                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('insights') }}">Insights</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>

                    </div>
                </div>

                <!-- Footer Col -->
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="widget widget_links widget-li-noicon">

                        <h4 class="ls0 nott">Important Links</h4>

                        <ul>
                            <li><a href="{{ route('terms.conds') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('faqs') }}">FAQs</a></li>
                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('help') }}">Help</a></li>
                        </ul>

                    </div>
                </div>

                <!-- Footer Col -->
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="widget subscribe-widget clearfix" data-loader="button">
                        <h4>Subscribe Us</h4>
                        <h5 class="font-body op-04"><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
                            <div class="input-group">
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email Address">
                                <button class="btn btn-dark bg-color px-3 input-group-text" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights" class="py-3 bg-color-gray">
        <div class="container">

            <div class="d-flex justify-content-between op-04">
                <span>&copy; 2023 All Rights Reserved by AGRIMA.</span>
                {{-- <div class="copyright-links">
                    <a href="#">Terms of Use</a> / 
                    <a href="#">Privacy Policy</a>
                </div> --}}
            </div>

        </div>
    </div><!-- #copyrights end -->
</footer>