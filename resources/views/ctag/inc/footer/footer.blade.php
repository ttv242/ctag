<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTech</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+38 068 005 3570</div>
                    <div class="footer_contact_text">
                        <p>17 Princess Road, London</p>
                        <p>Grester London NW18JR, UK</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        <li><a href="#">Computers & Laptops</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Smartphones & Tablets</a></li>
                        <li><a href="#">TV & Audio</a></li>
                    </ul>
                    <div class="footer_subtitle">Gadgets</div>
                    <ul class="footer_list">
                        <li><a href="#">Car Electronics</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        Copyright &copy;
                        {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> --}}
                        All rights reserved | This
                        template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                            href="https://colorlib.com/" target="_blank">Colorlib</a>

                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="{{ asset('ctag/images/logos_1.png') }}" alt></a></li>
                            <li><a href="#"><img src="{{ asset('ctag/images/logos_2.png') }}" alt></a></li>
                            <li><a href="#"><img src="{{ asset('ctag/images/logos_3.png') }}" alt></a></li>
                            <li><a href="#"><img src="{{ asset('ctag/images/logos_4.png') }}" alt></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<ul class="notifications"></ul>

</div>


<script src="{{ asset('ctag/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('ctag/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('ctag/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('ctag/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('ctag/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('ctag/js/notifications.js') }}"></script>



@if (Request::route()->getName() == 'home')
    <script src="{{ asset('ctag/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('ctag/js/custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'shop' ||
        Request::route()->getName() == 'categories' ||
        Request::route()->getName() == 'brands')
    <script src="{{ asset('ctag/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('ctag/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('ctag/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('ctag/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('ctag/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('ctag/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('ctag/js/shop_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'product')
    <script src="{{ asset('ctag/js/product_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'blog')
    <script src="{{ asset('ctag/js/blog_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'blog_single')
    <script src="{{ asset('ctag/js/blog_single_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'regular')
    <script src="{{ asset('ctag/js/regular_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'contact')
    <script src="{{ asset('ctag/js/contact_custom.js') }}"></script>
@endif

@if (Request::route()->getName() == 'footer')
    <script src="{{ asset('ctag/js/footer_custom.js') }}"></script>
@endif


@include('sweetalert::alert')

<script src="{{ asset('ctag/js/shopping_cart.js') }}"></script>


{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"864092d7197d84d6","b":1,"version":"2024.2.4","token":"cd0b4b3a733644fc843ef0b185f98241"}'
    crossorigin="anonymous"></script> --}}
<x-notify::notify />

@notifyJs
</body>

</html>
