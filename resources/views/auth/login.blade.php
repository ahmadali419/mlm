@extends('layouts.master')
@section('title', 'Login')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@section('css')
    <style>
        .error {
            color: red !important;
        }
        #kt_sign_up_submit:active{
            background-color: #ffc451 !important;
        }
    </style>
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Login</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Login</li>
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
                            <h5 class="text-center">Sign In to {{env('APP_NAME')}}</h3>
                                <p class="text-center">New Member? <a href="{{ route('register') }}">Click Here</a></p>
                                <form 
                                    class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                    id="addForm">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <!--begin::Heading-->

                                    <!--end::Heading-->



                                    <!--end::Col-->


                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                        <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email"
                                            name="email" autocomplete="off" value="">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>



                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                        <!--begin::Wrapper-->
                                        <div class="mb-1">
                                            <!--begin::Label-->
                                            <label class="form-label fw-bolder text-dark fs-6">
                                                Password
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input wrapper-->
                                            <div class="position-relative mb-3">
                                                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                                id="password"
                                                    type="password" name="password">

                                                <span
                                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                    data-kt-password-meter-control="visibility" id="">
                                                    <i class="far fa-eye" id="togglePassword"></i>

                                                </span>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <!--end::Input wrapper-->

                                            <!--end::Meter-->
                                        </div>
                                        <!--end::Wrapper-->


                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Input group--->


                                    <!--end::Input group-->
                                    {{--  --}}

                                    <!--begin::Input group-->

                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div id="recaptcha-container"></div>
                                    <div class="text-left">
                                        <button type="submit" id="kt_sign_up_submit" style="float-right;margin-top:10px;color:#fff;background-color:#343434;"
                                             class="customize-btn">
                                            <!--begin::Indicator-->
                                            <span class="indicator-label">
                                                Submit
                                            </span> 

                                            <!--end::Indicator-->
                                        </button>

                                    </div>
                                    <!--end::Actions-->
                                    <div style="text-align: right; margin-top: 6px;">
                                        <a href="{{ route('password.request') }}">
                                            Forgot Your Password
                                        </a>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Verify OTP Code</h5>
      </div>
      <div class="modal-body">
        <form>
            <input type="text" id="verification" class="form-control" placeholder="Verification code">
            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
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
        var user_id = "";
        //Form Handler
        $("#addForm").submit(function(e) {
            e.preventDefault();
            $("#kt_sign_up_submit").prop("disabled", true);
            $.ajax({    
               type: "POST",
               url: '/client/login',
               data: $("#addForm").serialize(),
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data)
               {
                    if (data == "success") {
                        window.location = "/dashboard";
                    }
                    if (data[0] == "not-verified") {
                        user_id = data[1].id;
                        sendOTP(data[1].phone);
                    }
                    if (data == "not-found") {
                        toastr.error("User not found", {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-bottom-full-width",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                    }
               },
               error : function (error) {
                   $("#kt_sign_up_submit").removeAttr('disabled');
                   if (error.responseJSON.email) {
                        toastr.error(error.responseJSON.email[0], {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-bottom-full-width",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                   }
                   if (error.responseJSON.password) {
                        toastr.error(error.responseJSON.password[0], {
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-bottom-full-width",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                   }
                }
            }); 
        });
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        function sendOTP(phone) {
            var number = phone;
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                $("#exampleModalCenter").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $("#exampleModalCenter").modal('show');
                $('#addForm').trigger("reset");
                toastr.success("Please verify otp sends on number",{
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-bottom-full-width",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }).catch(function (error) {
                toastr.error(error.message,{
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-bottom-full-width",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            });
        }
        function verify() {
            var code = $("#verification").val();
            if(code && code.length >= 6){
                coderesult.confirm(code).then(function (result) {
                    var user = result.user;
                    toastr.success("OTP verified successfully",{
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                    verifyUser();
                }).catch(function (error) {
                    toastr.error(error.message,{
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                });   
            }else{
                toastr.error("Please enter valid OTP",{
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-bottom-full-width",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }
        }
        function verifyUser(){
            $.ajax({    
               type: "GET",
               url: '/verify-login-account/'+user_id,
               success: function(data)
               {
                    if (data == "success") {
                        $("#exampleModalCenter").modal('hide');
                        $('#addForm').trigger("reset");
                        toastr.success("Your Account Verified Successfully!",{
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-bottom-full-width",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        window.location.href = '/dashboard';
                    }else{
                        toastr.error("Something went wrong, Please login again.",{
                            timeOut: 500000000,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-bottom-full-width",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1
                        });
                        location.reload();
                    }
               }
           });
        }
    </script>
    <script>
        $(document).on('change', '.form-check-input', function() {
            $('#kt_sign_up_submit').prop('disabled', true);
            if ($(this).is(":checked")) {
                $('#kt_sign_up_submit').prop('disabled', false);
            }
        });


        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
