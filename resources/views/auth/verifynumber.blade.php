<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/../homepage-assets/img/favicon.png" rel="icon">
    <link href="/../homepage-assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="/../homepage-assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/../homepage-assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="/../homepage-assets/css/style.css" rel="stylesheet">
    <style>
        .error {
            color: red !important;
        }
    </style>
</head>
<body>
    @include('components.header')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Verify OTP</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Verification</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Verify to {{env('APP_NAME')}} Check Message Inbox</h3>
                                <form>
                                    <input type="text" id="verification" class="form-control" placeholder="Verification code">
                                    <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
    {{-- <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}
            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Vendor JS Files -->
    <script src="/../homepage-assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/../homepage-assets/vendor/aos/aos.js"></script>
    <script src="/../homepage-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/../homepage-assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/../homepage-assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/../homepage-assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/../homepage-assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <!-- Template Main JS File -->
    <script src="/../homepage-assets/js/main.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyBgJAChSsIle2CscdgZALwKiPA1ZAKKOjE",
            authDomain: "tudorglobal-3d335.firebaseapp.com",
            projectId: "tudorglobal-3d335",
            storageBucket: "tudorglobal-3d335.appspot.com",
            messagingSenderId: "57719632744",
            appId: "1:57719632744:web:6fa03065d5e5b29db81cdd",
            measurementId: "G-T8JG9H2M4E"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script>
        function verify() {
            var code = $("#verification").val();
            window.confirmationResult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                alert("Auth is successful");
            }).catch(function (error) {
                alert(error.message);
            });
        }
    </script>
</body>
</html>