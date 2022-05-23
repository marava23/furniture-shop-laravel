
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="zxx">


<!-- index06:45-->
<head>
    @include('fixed.client.head')
</head>

<body id="home">
<header>
    @include('fixed.client.header')
</header>

<!-- main content -->
<div class="main-content">
    <div class="wrap-banner">
        <!-- menu category -->
        <!-- slide show -->
        <div class="section banner">
            <div class="tiva-slideshow-wrapper">
                <div id="tiva-slideshow" class="nivoSlider">
                    <a href="#">
                        <img class="img-responsive" src="img/home/home1-banner1.jpg" title="#caption1" alt="Slideshow image">
                    </a>
                    <a href="#">
                        <img class="img-responsive" src="img/home/home1-banner2.jpg" title="#caption2" alt="Slideshow image">
                    </a>
                    <a href="#">
                        <img class="img-responsive" src="img/home/home1-banner3.jpg" title="#caption3" alt="Slideshow image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- main -->
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <section class="page-home">
                    <div class="container">

                        <!-- delivery form -->
                        <div class="section policy-home col-lg-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy1">
                                                    <img src="img/home/home1-policy.png" alt="img">
                                                    <div class="policy-name mb-5">FREE DELIVERY FROM $ 250</div>
                                                    <div class="policy-des">Lorem ipsum dolor amet consectetur</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tiva-html col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy2">
                                                    <img src="img/home/home1-policy2.png" alt="img">
                                                    <div class="policy-name mb-5">FREE INSTALLATION</div>
                                                    <div class="policy-des">Lorem ipsum dolor amet consectetur</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tiva-html col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block-content">
                                            <div class="policy-item">
                                                <div class="policy-content iconpolicy3">
                                                    <img src="img/home/home1-policy3.png" alt="img">
                                                    <div class="policy-name mb-5">MONEY BACK GUARANTEED</div>
                                                    <div class="policy-des">Lorem ipsum dolor amet consectetur</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product living room -->

                    <div class="container">
                        <!-- banner -->

                        <!-- best seller -->
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
@include('fixed.client.footer')
<!-- back top top -->
<div class="back-to-top">
    <a href="#">
        <i class="fa fa-long-arrow-up"></i>
    </a>
</div>
<!-- Page Loader -->
<div id="page-preloader">
    <div class="page-loading">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
<!-- Vendor JS -->
<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
<script src="libs/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="libs/owl-carousel/owl.carousel.min.js"></script>

<!-- Template JS -->
<script src="js/theme.js"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
