
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tudor-Global-Trading - </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="EVBs3M0mdjneyjm3WNbPSHoh4A7wdbxgWLU6QZbC" />
    <!-- Favicons -->
    <link href="../../homepage-assets/img/favicon.png" rel="icon">
    <link href="../../homepage-assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../homepage-assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../homepage-assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="../../homepage-assets/css/style.css" rel="stylesheet">
    <style>
        #kt_sign_up_submit:active{
            background-color: #ffc451 !important;
        }
    </style>
    </head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="/">Tudor Global Trading<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="../homepage-assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="/#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                                            <li><a class="nav-link scrollto" href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                                        </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

        </div>
    </header><!-- End Header -->    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Reset Password</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Reset Password</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section class="inner-page">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="kt_sign_up_submit" style="float-right;margin-top:10px;color:#fff;background-color:#343434;" class="customize-btn">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Tudor-Global-Trading<span>.</span></h3>
                            <p>
                                200 Elm Street Stamford, CT 06902 United States<br><br>
                                <strong>Phone:</strong> +442075185151<br>
                                <strong>Email:</strong> tudorglobaltrading@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Packages</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Team</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

                    <!--<div class="col-lg-4 col-md-6 footer-newsletter">-->
                    <!--    <h4>Our Newsletter</h4>-->
                    <!--    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>-->
                    <!--    <form action="" method="post">-->
                    <!--        <input type="email" name="email"><input type="submit" value="Subscribe">-->
                    <!--    </form>-->

                    <!--</div>-->

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Tudor-Global-Trading</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                <!--Designed by <a href="/">FBT</a>-->
            </div>
        </div>
    </footer><!-- End Footer -->

    
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Vendor JS Files -->
    <script src="../../homepage-assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../../homepage-assets/vendor/aos/aos.js"></script>
    <script src="../../homepage-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../homepage-assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../homepage-assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../homepage-assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../homepage-assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../homepage-assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>

</html>
