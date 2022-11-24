<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">

    @yield('page_css')

</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('frontend.layouts.header')


        @yield('main_content_area')

        <div class="viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Recently Viewed</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme viewed_slider">

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_1.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_2.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_3.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225</div>
                                            <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_4.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_5.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ URL::asset('public/frontend/') }}/images/view_6.jpg"
                                                alt="">
                                        </div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$375</div>
                                            <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.layouts.footer')
    </div>

    <script src="{{ URL::asset('public/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/js/custom.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/js/shop_custom.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/cart_custom.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/product_custom.js')}}"></script>
    <script src="{{URL::asset('public/frontend/js/contact_custom.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>

</body>

</html>
