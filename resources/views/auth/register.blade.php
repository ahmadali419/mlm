@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="{{asset('assets/css/countrySelect.css')}}">
<style>
    .error{
        color: red!important;
    }
    #kt_sign_up_submit:active{
        background-color: #ffc451 !important;
    }
    * {
  box-sizing: border-box;
  -moz-box-sizing: border-box; }



.iti__hide {
  display: none; }

pre {
  margin: 0 !important;
  display: inline-block; }

.token.operator,
.token.entity,
.token.url,
.language-css .token.string,
.style .token.string,
.token.variable {
  background: none; }

input, button {
  height: 35px;
  margin: 0;
  padding: 6px 12px;
  border-radius: 2px;
  font-family: inherit;
  font-size: 100%;
  color: inherit; }
  input[disabled], button[disabled] {
    background-color: #eee; }

input, select {
  border: 1px solid #CCC;
  width: 250px; }

::-webkit-input-placeholder {
  color: #BBB; }

::-moz-placeholder {
  /* Firefox 19+ */
  color: #BBB;
  opacity: 1; }

:-ms-input-placeholder {
  color: #BBB; }

button {
  color: #FFF;
  background-color: #428BCA;
  border: 1px solid #357EBD; }
  button:hover {
    background-color: #3276B1;
    border-color: #285E8E;
    cursor: pointer; }

#result {
  margin-bottom: 100px; }
  .iti {
   
    width: 100%;
}

</style>
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Register</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Register</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs --> --}}
  @if($errors->any())
        <div class="row collapse">
            <ul class="alert-box warning radius">
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
    <section class="inner-page" style="margin-top:64px">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center">Create an account</h4>
                            <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                            <form id="addForm" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                id="kt_sign_up_form">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <!--begin::Heading-->

                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="form-label fw-bolder text-dark fs-6">Full Name <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="full_name" autocomplete="off" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <!--end::Col-->


                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="form-label fw-bolder text-dark fs-6">Email <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg form-control-solid" type="email"
                                        name="email" autocomplete="off" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Phone Number <span class="text-danger">*</span></label>
                                <input id="phone"class="form-control" name="phone" type="tel">

                                    <!--<input id="number" class="form-control form-control-lg form-control-solid" type="text"-->
                                    <!--    name="phone" pattern="[\+]\d{2}\d{10}" placeholder="+923xxxxxxxxx" autocomplete="off" value="" required="">-->
                                </div>

                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Sponsor Code <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="sponsor_code" autocomplete="off" value="TGT0001">
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                    <!--begin::Wrapper-->
                                    <div class="mb-1">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bolder text-dark fs-6">
                                            Password <span class="text-danger">*</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input wrapper-->
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid" type="password"
                                                name="password" id="password" autocomplete="new-password" onkeyup="checkPasswordStrength()">

                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility" id="togglePassword">
                                                <i class="far fa-eye" id=""></i>

                                            </span>
                                        </div>
                                        <span id="password-strength"></span>
                                        <!--end::Input wrapper-->

                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center "
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Hint-->
                                    {{-- <div class="text-muted">
                                        Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                                    </div> --}}
                                    <!--end::Hint-->
                                    {{-- <div class="fv-plugins-message-container invalid-feedback"></div> --}}
                                <!--end::Input group--->

                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        name="password_confirmation" id="passwordConfirm" autocomplete="off">
                                        
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility" id="togglePasswordConfirm" style="margin-top: 170px;margin-right: 15px;">
                                        <i class="far fa-eye" id=""></i>
                                    </span>
                                </div>
                                <!--end::Input group-->
                                {{--  --}}
                                <div id="recaptcha-container"></div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="toc" value="1">
                                        <span class="form-check-label fw-bold text-gray-700 fs-6">
                                            I Agree &amp; <a href="#" class="ms-1 link-primary">Terms and
                                                conditions</a>.
                                        </span>
                                    </label>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" id="kt_sign_up_submit" style="float-right;margin-top:10px;color:#fff;background-color:#343434;"
                                        disabled class="customize-btn">
                                        <!--begin::Indicator-->
                                        <span class="indicator-label">
                                            Submit
                                        </span>

                                        <!--end::Indicator-->
                                    </button>
                                    </div>
                                </div>
                               
                                <!--end::Actions-->
                                <div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
        <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
          <script src="{{asset('assets/js/util.js')}}"></script>
    <script>
        $(document).on('change', '.form-check-input', function() {
            $('#kt_sign_up_submit').prop('disabled', true);
            if ($(this).is(":checked")) {
                $('#kt_sign_up_submit').prop('disabled', false);
            }
        });

        const togglePassword = document.querySelector('#togglePassword');
        const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
        const password = document.querySelector('#password');
        const passwordConfirm = document.querySelector('#passwordConfirm');
        
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        
        togglePasswordConfirm.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        
        $.validator.addMethod('mypassword', function(value, element) {
        return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
            },
            'Password must contain at least one numeric and one alphabetic character.');
        $(document).ready(function() {
      var input = document.querySelector("#phone");
        window.intlTelInput(input, {
             autoHideDialCode: false,
   autoPlaceholder: false,
   nationalMode: false,
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "{{asset('assets/js/Util.js')}}",
    });

            var validator = $("#addForm").validate({
                rules: {
                    full_name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true
                    },

                    sponsor_code: {
                        required: true
                    },
                    password: {
                        required: true,
                        mypassword: true,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                errorPlacement: function(error, element) {
                    var elem = $(element);
                    if (elem.hasClass("tags") || elem.hasClass("categories") || elem
                        .hasClass("colors") || elem
                        .hasClass("taxes") || elem.hasClass("cover-images") || elem.hasClass("band_id")
                        ) {
                        element = elem.parent();
                        error.insertAfter(element);
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        })
    </script>
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
    <script type="text/javascript">
        var user_id = "";
        //Form Handler
        $("#addForm").submit(function(e) {
            e.preventDefault();
            $("#kt_sign_up_submit").prop("disabled", true);
            $.ajax({    
               type: "POST",
               url: '/client/register',
               data: $("#addForm").serialize(),
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data)
               {
                   user_id = data.id;
                   sendOTP(data.phone);
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
                   if (error.responseJSON.sponsor_code) {
                        toastr.error(error.responseJSON.sponsor_code[0], {
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
                   if (error.responseJSON.full_name) {
                        toastr.error(error.responseJSON.full_name[0], {
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
                   if (error.responseJSON.phone) {
                        toastr.error(error.responseJSON.phone[0], {
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
                   if (error.responseJSON.gRecaptchaResponse) {
                        toastr.error(error.responseJSON.g-recaptcha-response[0], {
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
                        window.location.href = '/login';
                    }
               }
           });
        }
        function checkPasswordStrength() {
          var password = document.getElementById("password").value;
          var strength = 0;
          if (password.match(/[a-z]+/)) {
            strength += 1;
          }
          if (password.match(/[A-Z]+/)) {
            strength += 1;
          }
          if (password.match(/[0-9]+/)) {
            strength += 1;
          }
          if (password.match(/[!@#\$%\^&\*]+/)) {
            strength += 1;
          }
        
          var passwordStrength = document.getElementById("password-strength");
          var passwordField = document.getElementById("password");
          if (strength < 2) {
            passwordStrength.innerHTML = "Weak";
            passwordStrength.style.color = "red";
            passwordField.style.borderColor = "red";
          } else if (strength == 2) {
            passwordStrength.innerHTML = "Medium";
            passwordStrength.style.color = "orange";
            passwordField.style.borderColor = "orange";
          } else {
            passwordStrength.innerHTML = "Strong";
            passwordStrength.style.color = "green";
            passwordField.style.borderColor = "green";
          }
        }
    </script>
@endsection
