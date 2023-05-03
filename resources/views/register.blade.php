@extends('layouts.master')
@section('title','Register')
@section('css')
<style>
    .error{
        color: red!important;
    }
</style>
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Register</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Register</li>
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
                            <h3 class="text-center">Create an account</h3>
                            <p class="text-center">Already have an account? Sign in here</p>
                            <form method="POST" action="https://dashboard.securereannex.com/register"
                                class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                id="kt_sign_up_form">
                                <input type="hidden" name="_token" value="fKmBXnWwRuEHrs8vt427dEXgkg5y8dYfuI7Hw9tW">
                                <input type="hidden" name="_method" value="POST">
                                <!--begin::Heading-->

                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="form-label fw-bolder text-dark fs-6">Full Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="full_name" autocomplete="off" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <!--end::Col-->


                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                    <input class="form-control form-control-lg form-control-solid" type="email"
                                        name="email" autocomplete="off" value="">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Phone Number</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="phone_no" autocomplete="off" value="" required="">
                                </div>

                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Sponsor Code</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        name="sponsor_code" autocomplete="off" value="TGT0001 " readonly="">
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
                                            <input class="form-control form-control-lg form-control-solid" type="password"
                                                name="password" autocomplete="new-password">

                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <!--end::Input wrapper-->

                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center mb-3"
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
                                    <div class="text-muted">
                                        Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                                    </div>
                                    <!--end::Hint-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group--->

                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        name="password_confirmation" autocomplete="off">
                                </div>
                                <!--end::Input group-->
                                {{--  --}}

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
                                <div class="text-left">
                                    <button type="submit" id="kt_sign_up_submit" style="float: right;margin-top:10px"  disabled class="customize-btn">
                                        <!--begin::Indicator-->
                                        <span class="indicator-label">
                                            Submit
                                        </span>

                                        <!--end::Indicator-->
                                    </button>
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
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
    $(document).on('change','.form-check-input',function(){
        $('#kt_sign_up_submit').prop('disabled',true);
            if($(this).is(":checked")){
              $('#kt_sign_up_submit').prop('disabled',false);
            }
    });
 </script>
@endsection
