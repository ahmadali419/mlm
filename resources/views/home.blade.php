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
                    <a class="nav-link same-page " href="#how_work">Home</a>
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


<section class="banner-section bg--theme--overlay">
  <div class="shapes-banner bg_img" data-background="assets/images/frontend/banner/62e63eef3a7bc1659256559.jpg">
  </div>
  <div class="particles-js" id="particles-js"></div>

  <div class="banner-shape">
      <img src="assets/templates/basic/images/wave.png" alt="banner">
  </div>


  <div class="container">
      <div class="banner__content text--white">
          <h4 class="banner__category text--white">Welcome To</h4>
          <h1 class="banner__title text--white">Glacier Coin Mining Platform</h1>
          <p class="banner__text"> Start mining the quick way with our world renowned software</p>
      </div>
      <div class="banner__bottom__content text--white">

          

          <div class="buttons" style="text-align: center;">
              <button type="button" class="btn btn-outline-warning"><a href="{{ route('register') }}" style="color: white;">
                      Register </a></button>
              <button type="button" class="btn btn-warning"><a href="{{ route('login') }}"
                      style="color: white;">Login</a></button>

          </div>
      </div>
  </div>
</section>



<section class="how-section pt-120 pb-120" id="how_work">
  <div class="container">
      <div class="section__header section__header__center">
          <span class="section__cate">Working Process</span>
          <h3 class="section__title">How To Start</h3>
          <p>Some steps for Earn Money</p>
      </div>
      <div class="row g-4">
          <div class="col-sm-6 col-lg-3 mb-30">
              <div class="how__item">
                  <div class="how__thumb">
                      <div class="thumb">1</div>
                  </div>
                  <h5 class="title">Enter Wallet Address</h5>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-30">
              <div class="how__item">
                  <div class="how__thumb">
                      <div class="thumb">2</div>
                  </div>
                  <h5 class="title">Deposit Money</h5>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-30">
              <div class="how__item">
                  <div class="how__thumb">
                      <div class="thumb">3</div>
                  </div>
                  <h5 class="title">Start Mining</h5>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-30">
              <div class="how__item">
                  <div class="how__thumb">
                      <div class="thumb">4</div>
                  </div>
                  <h5 class="title">Withdraw</h5>
              </div>
          </div>
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
<section
  class="feature-section pt-120 pb-120 bg--theme--overlay top--wave-wrapper bottom--wave-wrapper bg_img bg_fixed"
  data-background="assets/images/frontend/feature/62e651aa303d61659261354.jpg">
  <div class="banner-shape">
      <img src="assets/templates/basic/images/wave.png" alt="banner">
  </div>
  <div class="banner-shape-top">
      <img src="assets/templates/basic/images/wave-rev.png" alt="banner">
  </div>
  <div class="container">
      <div class="section__header section__header__center text--white">
          <span class="section__cate">
              Feature
          </span>
          <h3 class="text--white pb-3">Our Special Feature</h3>
          <p>Simple and Secure</p>
      </div>
      <div class="row g-4 justify-content-center">
          <div class="col-md-6 col-lg-4">
              <div class="feature__item">
                  <div class="feature__icon">
                      <i class="las la-headset"></i>
                  </div>
                  <div class="feature__content">
                      <h5 class="feature__title">24/7 Support</h5>
                      <p class="text-white">
                          Every Time Available
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="feature__item">
                  <div class="feature__icon">
                      <i class="las la-globe-africa"></i>
                  </div>
                  <div class="feature__content">
                      <h5 class="feature__title">Global</h5>
                      <p class="text-white">
                          All World
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-4">
              <div class="feature__item">
                  <div class="feature__icon">
                      <i class="las la-lock"></i>
                  </div>
                  <div class="feature__content">
                      <h5 class="feature__title">Secure</h5>
                      <p class="text-white">
                          Protected
                      </p>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>
<section class="faqs-section pt-120 pb-120" id="faq">
  <div class="container">
      <div class="section__header section__header__center">
          <span class="section__cate">FAQ&#039;S</span>
          <h3 class="section__title">Frequently Asked Questions</h3>
          <p>24/7 Asked Questions!</p>
      </div>
      <div class="row justify-content-center gy-3">
          <div class="col-lg-6">
              <div class="faq__wrapper">
                  <div class="faq__item">
                      <div class="faq__title">
                          <h5 class="title">What is Cryptocurrency?</h5>
                          <span class="right-icon"></span>
                      </div>
                      <div class="faq__content">
                          <p>Cryptocurrency is decentralized digital money, based on blockchain technology. You
                              may be familiar with the most popular versions, Bitcoin and Ethereum, but there are
                              more than 5,000 different cryptocurrencies in circulation,
                              according to CoinLore.</p>
                      </div>
                  </div>
                  <div class="faq__item">
                      <div class="faq__title">
                          <h5 class="title">What is Coin Mining?</h5>
                          <span class="right-icon"></span>
                      </div>
                      <div class="faq__content">
                          <p>Mining is the process of validating transactions on a blockchain network and creating
                              new blocks on the blockchain. In the case of cryptocurrencies, miners compete to
                              solve complex mathematical equations using their computer hardware, and the first
                              one to solve the equation is rewarded with a certain amount of the cryptocurrency
                              being mined.

                          </p>
                      </div>
                  </div>
                  <div class="faq__item">
                      <div class="faq__title">
                          <h5 class="title">what is Mining Process?</h5>
                          <span class="right-icon"></span>
                      </div>
                      <div class="faq__content">
                          <p>The mining process can be profitable for those who have the necessary hardware and
                              electricity resources. However, as the difficulty of mining increases and the reward
                              for mining decreases, it can become less profitable over time. Additionally, mining
                              can be energy-intensive and have a negative environmental impact if the electricity
                              used to power the mining rigs comes from non-renewable sources.</p>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>
<section
  class="counter-section bg--theme--overlay-2 bg_fixed top--wave-wrapper bottom--wave-wrapper pt-120 pb-120 bg_img"
  data-background="images/frontend/counter/62e64031c25bd1659256881.jpg">
  <div class="banner-shape">
      <img src="assets/templates/basic/images/wave.png" alt="banner">
  </div>
  <div class="banner-shape-top">
      <img src="assets/templates/basic/images/wave-rev.png" alt="banner">
  </div>
  <div class="container">
      <div class="row g-4">
          <div class="col-sm-6 col-lg-3">
              <div class="counter__item">
                  <div class="counter__header">
                      <i class="las la-user-alt"></i>
                      <h3 class="title">
                          <span class="rafcounter" data-counter-end="35">00</span>
                          <span>K</span>
                      </h3>
                  </div>
                  <p>Happy Miners</p>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3">
              <div class="counter__item">
                  <div class="counter__header">
                      <i class="fas fa-money-check-alt"></i>
                      <h3 class="title">
                          <span class="rafcounter" data-counter-end="230">00</span>
                          <span>K</span>
                      </h3>
                  </div>
                  <p>Deposit</p>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3">
              <div class="counter__item">
                  <div class="counter__header">
                      <i class="las la-wallet"></i>
                      <h3 class="title">
                          <span class="rafcounter" data-counter-end="1000">00</span>
                          <span>+</span>
                      </h3>
                  </div>
                  <p>Withdraw</p>
              </div>
          </div>
          <div class="col-sm-6 col-lg-3">
              <div class="counter__item">
                  <div class="counter__header">
                      <i class="las la-language"></i>
                      <h3 class="title">
                          <span class="rafcounter" data-counter-end="15">00</span>
                          <span>+</span>
                      </h3>
                  </div>
                  <p>Supported Language</p>
              </div>
          </div>
      </div>
  </div>
</section>



<div class="partners-section pt-120 pb-120">
  <div class="container">
      <div class="section__header section__header__center">
          <span class="section__cate">Partners</span>
          <h3 class="section__title">Our Partners</h3>
          <p>we have currently 300+ partners from different marketplace, and it&#039;s growing day by day. we are
              moving slowly because our main focus remains to provide the best solution and quality.</p>
      </div>
      <div class="partner-slider owl-theme owl-carousel">
          <a class="partner-thumb" ">
              <img src="assets/images/frontend/partners/62ef9170668bc1659867504.png" alt="partner">
             
          </a>
          <a class="partner-thumb" ">
              <img src="assets/images/frontend/partners/62ef91759b3e61659867509.png" alt="partner">
              
          </a>
       
      </div>
  </div>
</div>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{ asset('assets/global/js/bootstrap.bundle.js') }}"></script>





<script src="{{ asset('assets/templates/basic//js/owl.js') }}"></script>
<script src="{{ asset('assets/templates/basic//js/main.js') }}"></script>

</body>

</html>
