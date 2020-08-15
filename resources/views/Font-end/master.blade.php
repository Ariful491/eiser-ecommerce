<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{asset('/font-end')}}/img/fevicon.png" type="image/png" />
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/linericon/style.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/flaticon.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('/font-end')}}/css/responsive.css" />
</head>

<body>
<!--================Header Menu Area =================-->
<header class="header_area">

    @include('Font-end.includes.top-menu')
    @include('Font-end.includes.main-menu')


</header>
<!--================Header Menu Area =================-->

@yield('body')



<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        @include('Font-end.includes.footer-top')
        @include('Font-end.includes.footer-bottom')

    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/font-end')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/font-end')}}/js/popper.js"></script>
<script src="{{asset('/font-end')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/font-end')}}/js/stellar.js"></script>
<script src="{{asset('/font-end')}}/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="{{asset('/font-end')}}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/font-end')}}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/font-end')}}/vendors/isotope/isotope-min.js"></script>
<script src="{{asset('/font-end')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('/font-end')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/font-end')}}/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/font-end')}}/vendors/counter-up/jquery.counterup.js"></script>
<script src="{{asset('/font-end')}}/js/mail-script.js"></script>
<script src="{{asset('/font-end')}}/js/theme.js"></script>
</body>

</html>
