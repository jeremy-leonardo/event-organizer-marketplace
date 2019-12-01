<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>EOM</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/theme/eiser/css/bootstrap.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/linericon/style.css" />
    <link rel="stylesheet" href="../public/theme/eiser/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/theme/eiser/css/themify-icons.css" />
    <link rel="stylesheet" href="../public/theme/eiser/css/flaticon.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="../public/theme/eiser/vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="../public/theme/eiser/css/style.css" />
    <link rel="stylesheet" href="../public/theme/eiser/css/responsive.css" />
    @yield('style')

</head>

<body>
    
    @include('layouts._partials.header')
    @yield('content')


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../public/theme/eiser/js/jquery-3.2.1.min.js"></script>
    <script src="../public/theme/eiser/js/popper.js"></script>
    <script src="../public/theme/eiser/js/bootstrap.min.js"></script>
    <script src="../public/theme/eiser/js/stellar.js"></script>
    <script src="../public/theme/eiser/vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="../public/theme/eiser/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../public/theme/eiser/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="../public/theme/eiser/vendors/isotope/isotope-min.js"></script>
    <script src="../public/theme/eiser/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../public/theme/eiser/js/jquery.ajaxchimp.min.js"></script>
    <script src="../public/theme/eiser/vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="../public/theme/eiser/vendors/counter-up/jquery.counterup.js"></script>
    <script src="../public/theme/eiser/js/mail-script.js"></script>
    <script src="../public/theme/eiser/js/theme.js"></script>
    @yield('script')
    @stack('scripts')
	
</body>

</html>