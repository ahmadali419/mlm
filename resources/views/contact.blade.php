<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ env('APP_NAME') }} - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= setting('favicon') ?>" rel="icon">
    <link href="<?= setting('favicon') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
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
    
      <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ route('index') }}">
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
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
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

    <section class="contact-hero-section bg--theme--overlay-2 bg_img bg_fixed" data-background="assets/images/frontend/contact/62ee1035b3f3b1659768885.jpg">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="contact__item">
                        <div class="contact__icon">
                            <i class="las la-map-marker"></i>
                        </div>
                        <div class="contact__content">
                            <h6 class="contact__title">Address</h6>
                            <ul>
                                <li>Burewala, Punjab, Pakistan</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact__item">
                        <div class="contact__icon">
                            <i class="las la-envelope-open-text"></i>
                        </div>
                        <div class="contact__content">
                            <h6 class="contact__title">Email Address</h6>
                            <ul>
                               
                                <li>
                                    <a href="glaciercoin@gmail.com"><span class="__cf_email__" data-cfemail="d1a2a4a1a1bea3a591a5b4a2a5ffb2bebc">[email&#160;protected]</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact__item">
                        <div class="contact__icon">
                            <i class="las la-mobile-alt"></i>
                        </div>
                        <div class="contact__content">
                            <h6 class="contact__title">Phone</h6>
                            <ul>
                                <li>
                                    <a href="Tel:+854 546457485644">+92 303 8173606</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section pt-120 pb-120">
        <div class="container">
            <h3 class="title text--base mb-4 text-center">Send Us a Message</h3>
            <div class="contact-form-wrapper bg--theme--overlay bg_img bg_fixed overflow-hidden" data-background="assets/images/frontend/contact/62ee121cc9caa1659769372.jpg">
                <form class="" method="post" action="element/redirect.php" >
                    
                    
                    <div class="form-group col-sm-12">
                        <label class="cmn--label" for="name">Name</label>
                        <input class="form-control form--control" name="name" type="text" required>
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label class="cmn--label" for="email">Email</label>
                        <input class="form-control form--control" name="email" type="email" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="cmn--label" for="subject">Subject</label>
                        <input class="form-control form--control" name="subject" type="text" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="cmn--label" for="message">Message</label>
                        <textarea class="form-control form--control" name="message" wrap="off" required></textarea>
                    </div>
                 
                   
                    <div class="col-sm-12 mb-0">
                        <button class="cmn--btn form--control w-100 justify-content-center" name="send" type="submit">SEND MESSAGE</button>
                    </div>

        












                </form>

            </div>
        </div>







    </section>

   
     

    <section class="about-section pt-120 pb-120" id="about-us">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="about__thumb">
                        <div class="thumb">
                            <img src="assets/images/frontend/about/62f0df5e855541659952990.jpg" alt="about">
                        </div>
                        <blockquote class="chairman--quote">
                            Successfully Providing the Best Mining Service from 24 years
                        </blockquote>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <div class="section__header">
                            <span class="section__cate">About Us</span>
                            <h3 class="section__title">Know What We Are</h3>
                            <p>Glacier Coin </p>
                        </div>
                        <p class="about__para">Coin mining is the process of validating cryptocurrency transactions and
                            adding them to a blockchain ledger in exchange for a reward of newly minted coins. This
                            process requires powerful computers and specialized software to solve complex mathematical
                            problems that confirm the legitimacy of each transaction.</p>
                        <ul class="about--list">
                            <li>Simple</li>
                            <li>Secure</li>
                            <li>24/7 Available</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
      
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{ asset('assets/global/js/bootstrap.bundle.js') }}"></script>





<script src="{{ asset('assets/templates/basic//js/owl.js') }}"></script>
<script src="{{ asset('assets/templates/basic//js/main.js') }}"></script>
  </html>