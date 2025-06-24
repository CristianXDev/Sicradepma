<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('title')

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/styles.css') }}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('static/images/gorro-4.png') }}">
</head>
<body data-spy="scroll" data-target=".fixed-top" id='body'>

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    @include('partials.home.navbar')
    <!-- end of navigation -->

    <!--CONTENIDO-->
    @yield('content')

    <!-- Footer -->
    @include('partials.home.footer')
    <!-- end of footer -->

    <!-- Scripts -->
    <script src="{{ asset('static/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('static/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ asset('static/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('static/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('static/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ asset('static/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ asset('static/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>
</html>