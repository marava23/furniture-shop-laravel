<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
<html lang="en">


<!-- product-grid-sidebar-left10:54-->
<head>
    @include('fixed.client.head')
</head>

<body @yield('bodyTag')>
@include('fixed.client.header')
<!-- main content -->
@yield('content')
<!-- footer -->


<!-- back top top -->
<div class="back-to-top">
    <a href="#">
        <i class="fa fa-long-arrow-up"></i>
    </a>
</div>

@include('fixed.client.footer')
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
@include('fixed.client.scripts')
</body>
</html>
