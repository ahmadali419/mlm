<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link href="../homepage-assets/img/favicon.png" rel="icon">
    <link href="../homepage-assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../homepage-assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../homepage-assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="{{asset("assets/images/logoIcon/logo.png")}}" rel="apple-touch-icon">
    <link href="{{ asset("assets/global/css/bootstrap.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/global/css/all.css") }}" rel="stylesheet">
  <link href="{{ asset('assets/global/css/line-awesome.css') }}" rel="stylesheet" />

  <link href="{{ asset("assets/templates/basic/css/owl.css") }}" rel="stylesheet">
  <link href="{{ asset("assets/templates/basic/css/bootstrap-fileinput.css") }}" rel="stylesheet">
  <link href="{{ asset('assets/templates/basic/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/templates/basic/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/templates/basic/css/color.php?color=7202bb&secondColor=3264f5') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="../homepage-assets/css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="preloader">
        <div class="spinner">
            <div class="cube1"><img src="assets/images/logoIcon/favicon.png" alt="cube1"></div>
            <div class="cube2"><img src="assets/images/logoIcon/favicon.png" alt="cube2"></div>
        </div>
    </div>
    
    
    
    <a class="scrollToTop" href="javascript:void(0)"><i class="las la-angle-up"></i></a>
    <div class="cursor"></div>
    <div class="overlay"></div>
    
      <header class="header-section" style="background:#3264f5;margin-bottom:24px">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="#">
                        <img src="assets/images/logoIcon/logo.png" alt="site-logo">
                    </a>
                </div>
                <ul class="menu">
                    <li class="nav-item">
                        <a class="nav-link same-page " href="{{ route('index') }}">Home</a>
                    </li>
    
                  
                    
    
                    <li class="nav-item">
                        <a class="nav-link same-page" href="#faq">FAQ</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="About.php">About</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
    
                </ul>
    
    
               
                <div class="header-bar m-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    {{-- @include('components.header') --}}
    @yield('content')
    <footer class="bg--theme--overlay footer-section bg_fixed bg_img"
  data-background="assets/images/frontend/footer/62e641699f49a1659257193.jpg">
  <div class="banner-shape-top">
      <img src="assets/templates/basic/images/wave-rev.png" alt="banner">
  </div>
  <div class="container">
      <div class="footer-top pt-120  top--wave-wrapper  pb-3">
          <div class="footer-logo">
              <a href="{{ route('index') }}">
                  <img src="assets/images/logoIcon/logo.png" alt="logo">
              </a>
          </div>
          <p class="footer--text">A Glacier Coin mining website is an online platform that provides information,
              tools, and resources for cryptocurrency miners.</p>
          <ul class="social__icons">
              <li>
                  <a class="facebook" href="https://www.facebook.com/">
                      <i class="fab fa-facebook-f"></i> </a>
              </li>
              <li>
                  <a class="facebook" href="https://www.twitter.com/">
                      <i class="fab fa-twitter"></i> </a>
              </li>
              <li>
                  <a class="facebook" href="https://www.linkedin.com/">
                      <i class="fab fa-linkedin-in"></i> </a>
              </li>
          </ul>

          <ul class="footer-links pt-5">
              <li class="p-0"><a href="#">Privacy Policy</a></li>
              <li class="p-0"><a href="#">Terms of Service</a></li>
          </ul>
      </div>
      <div class="footer-bottom py-3">
          <div class="copyright text--white text-center">
              <span>Copyright &copy; 2023 . All Rights Reserved (M a r s a d)</span>
          </div>
      </div>
  </div>
</footer>
    {{-- @include('components.footer') --}}


    {{-- <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Vendor JS Files -->
    <script src="../homepage-assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../homepage-assets/vendor/aos/aos.js"></script>
    <script src="../homepage-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../homepage-assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../homepage-assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../homepage-assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../homepage-assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../homepage-assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
        <script src="{{ asset('assets/templates/basic//js/owl.js') }}"></script>
        <script src="{{ asset('assets/templates/basic//js/main.js') }}"></script>
    @yield('js')
</body>

</html>
